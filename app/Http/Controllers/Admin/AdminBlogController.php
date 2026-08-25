<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    private function categoryOptions()
    {
        return BlogCategory::orderBy('name')->pluck('name')
            ->merge(Blog::whereNotNull('category')->where('category', '<>', '')->distinct()->pluck('category'))
            ->unique()->values();
    }

    public function index()
    {
        $blogs = Blog::all();
        $categories = $this->categoryOptions();
        $managedCategories = BlogCategory::orderBy('name')->get();
        return view('admin.crud.blogs.index', compact('blogs', 'categories', 'managedCategories'));
    }

    public function categoryStore(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|max:255|unique:blog_categories,name']);
        $category = BlogCategory::create(['name' => trim($data['name'])]);
        if ($request->expectsJson()) {
            return response()->json(['id' => $category->id, 'name' => $category->name]);
        }
        return back()->with('success', 'Blog category added successfully.');
    }

    public function categoryDestroy($id)
    {
        BlogCategory::findOrFail($id)->delete();
        return back()->with('success', 'Blog category deleted successfully.');
    }

    public function add()
    {
        $categories = $this->categoryOptions();
        return view('admin.crud.blogs.add', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:blogs,slug',
                'content' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'tags' => 'nullable|string|max:255',
                'category' => 'nullable|string|max:255',
                'min_read' => 'nullable|string|max:255',
                'visibility' => 'nullable|integer',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:320',
                'meta_keywords' => 'nullable|string|max:255',
            ]);

            $validatedData = $request->only(['title', 'slug', 'content',  'tags', 'min_read', 'visibility', 'category', 'meta_title', 'meta_description', 'meta_keywords']);

            // Handle image upload
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $image = $request->file('image');
                if (!$image->getPathname() || !is_readable($image->getPathname())) {
                    throw new \RuntimeException('The uploaded image could not be read. Please restart Laragon and try again.');
                }
                $validatedData['image'] = $image->store('uploads', 'public');
            }

            Log::info('Validated Blog data:', $validatedData);

            $blog = Blog::create([
                'title' => $validatedData['title'],
                'slug' => $validatedData['slug'] ?? null,
                'content' => $validatedData['content'],
                'image' => $validatedData['image'] ?? null,
                'tags' => $validatedData['tags'] ?? null,
                'category' => $validatedData['category'] ?? null,
                'min_read' => $validatedData['min_read'] ?? null,
                'visibility' => $validatedData['visibility'] ?? 1,
                'meta_title' => $validatedData['meta_title'] ?? null,
                'meta_description' => $validatedData['meta_description'] ?? null,
                'meta_keywords' => $validatedData['meta_keywords'] ?? null,
            ]);

            Log::info('Blog created successfully:', ['id' => $blog->id]);

            return redirect()->route('admin.blog.index')->with('success', 'Blog added successfully.');
        } catch (\Throwable $e) {
            Log::error('Error while creating blog:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = $this->categoryOptions();
        return view('admin.crud.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255|unique:blogs,slug,' . $id,
                'content' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'tags' => 'nullable|string|max:255',
                'category' => 'nullable|string|max:255',
                'min_read' => 'nullable|string|max:255',
                'visibility' => 'nullable|integer',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:320',
                'meta_keywords' => 'nullable|string|max:255',
            ]);

            $blog = Blog::findOrFail($id);
            $updateData = [
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->content,
                'tags' => $request->tags,
                'category' => $request->category,
                'min_read' => $request->min_read,
                'visibility' => $request->visibility ?? 1,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
            ];

            // Handle image upload
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // Delete old image if exists
                if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                    Storage::disk('public')->delete($blog->image);
                }

                $image = $request->file('image');
                if (!$image->getPathname() || !is_readable($image->getPathname())) {
                    throw new \RuntimeException('The uploaded image could not be read. Please restart Laragon and try again.');
                }
                $updateData['image'] = $image->store('uploads', 'public');
            }

            $blog->update($updateData);

            return redirect()->route('admin.blog.index')->with('success', 'Blog updated successfully.');
        } catch (\Throwable $e) {
            Log::error('Blog update error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $blog = Blog::findOrFail($id);

            // Delete image if exists
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }

            $blog->delete();
            return redirect()->route('admin.blog.index')->with('success', 'Blog deleted successfully.');
        } catch (\Throwable $e) {
            Log::error('Blog delete error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors('Could not delete blog.');
        }
    }

    public function toggleVisibility(Request $request, $id)
    {
        try {
            $blog = Blog::findOrFail($id);
            // Toggle the visibility: if it's 1, make it 0; if it's 0, make it 1
            $blog->visibility = $blog->visibility ? 0 : 1;
            $blog->save();
            
            return redirect()->route('admin.blog.index')->with('success', 'Blog visibility updated successfully.');
        } catch (\Exception $e) {
            Log::error('Blog visibility toggle error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors('Could not update blog visibility.');
        }
    }
}
