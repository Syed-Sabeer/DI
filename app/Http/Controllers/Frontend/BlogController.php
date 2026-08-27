<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{
public function index(Request $request)
{
    $query = Blog::where('visibility', 1);



    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('title', 'like', "%{$search}%")
            //   ->orWhere('description', 'like', "%{$search}%")
              ;
    }
    if ($request->filled('category')) {
        $query->where('category', $request->input('category'));
    }
$latestBlogs = \App\Models\Blog::where('visibility', 1)
    ->latest()
    ->take(5)
    ->get();

    $blogs = $query->latest()->paginate(6)->withQueryString();
    $categories = Blog::where('visibility', 1)->whereNotNull('category')->where('category', '<>', '')
        ->select('category')->selectRaw('COUNT(*) as total')->groupBy('category')->orderByDesc('total')->get();
    $tags = Blog::where('visibility', 1)->pluck('tags')->filter()->flatMap(function ($value) {
        return collect(preg_split('/[,#]+/', $value))->map(fn ($tag) => trim($tag))->filter();
    })->countBy()->sortDesc()->keys()->take(12);

    return view("frontend.blog", compact('blogs','latestBlogs','categories','tags'));
}


    public function detail($slug){
        $blog = Blog::where('visibility', 1)->where('slug',$slug)->first();
        if (!$blog) {
            Log::error("Blog not found for slug: $slug");
            abort(404, 'Blog not found');
        }

        // Debug logging
        Log::info("Blog detail loaded", [
            'blog_id' => $blog->id,
            'blog_title' => $blog->title,
            'comments_count' => 0
        ]);

        $latestBlogs = Blog::where('visibility', 1)
            ->where('id', '<>', $blog->id)
            ->latest()
            ->take(5)
            ->get();
        $categories = Blog::where('visibility', 1)->whereNotNull('category')->where('category', '<>', '')
            ->select('category')->selectRaw('COUNT(*) as total')->groupBy('category')->orderByDesc('total')->get();
        $tags = Blog::where('visibility', 1)->pluck('tags')->filter()->flatMap(function ($value) {
            return collect(preg_split('/[,#]+/', $value))->map(fn ($tag) => trim($tag))->filter();
        })->countBy()->sortDesc()->keys()->take(12);
        return view('frontend.blog-detail', compact('blog', 'latestBlogs', 'categories', 'tags'));
    }

    public function commentStore(Request $request){
        Log::info('Comment submission attempt', $request->all());

        $data = request()->validate([
            'blog_id' => 'required|exists:blogs,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|max:1000',
        ]);

        try {
            $comment = Comment::create($data);
            Log::info('Comment created successfully', ['comment_id' => $comment->id]);
            return redirect()->back()->with('success', 'Comment added successfully.');
        } catch (\Exception $e) {
            Log::error('Error storing comment: '.$e->getMessage(), [
                'data' => $data,
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'Failed to add comment. Please try again.')->withInput();
        }
    }

}
