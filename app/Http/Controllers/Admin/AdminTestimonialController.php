<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.crud.testimonials.index', compact('testimonials'));
    }

    public function add()
    {
        return view('admin.crud.testimonials.add');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'fullname' => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'review' => 'required|string',
                'visibility' => 'nullable|integer',
            ]);

            $validatedData = $request->only(['fullname', 'designation', 'image', 'review', 'visibility']);

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                
                // Ensure testimonials directory exists
                $testimonialsDir = public_path('uploads/testimonials');
                if (!file_exists($testimonialsDir)) {
                    mkdir($testimonialsDir, 0755, true);
                }
                
                $image->move($testimonialsDir, $imageName);
                $validatedData['image'] = 'uploads/testimonials/' . $imageName;
            }

            Log::info('Validated Testimonial data:', $validatedData);

            $testimonial = Testimonial::create([
                'fullname' => $validatedData['fullname'],
                'designation' => $validatedData['designation'],
                'image' => $validatedData['image'] ?? null,
                'review' => $validatedData['review'],
                'visibility' => $validatedData['visibility'] ?? 1,
            ]);

            Log::info('Testimonial created successfully:', ['id' => $testimonial->id]);

            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial added successfully.');
        } catch (\Exception $e) {
            Log::error('Error while creating testimonial:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.crud.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'fullname' => 'required|string|max:255',
                'designation' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'review' => 'required|string',
                'visibility' => 'nullable|integer',
            ]);

            $testimonial = Testimonial::findOrFail($id);
            $updateData = [
                'fullname' => $request->fullname,
                'designation' => $request->designation,
                'review' => $request->review,
                'visibility' => $request->visibility ?? 1,
            ];

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($testimonial->image && file_exists(public_path($testimonial->image))) {
                    unlink(public_path($testimonial->image));
                }

                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                
                // Ensure testimonials directory exists
                $testimonialsDir = public_path('uploads/testimonials');
                if (!file_exists($testimonialsDir)) {
                    mkdir($testimonialsDir, 0755, true);
                }
                
                $image->move($testimonialsDir, $imageName);
                $updateData['image'] = 'uploads/testimonials/' . $imageName;
            }

            $testimonial->update($updateData);

            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
        } catch (\Exception $e) {
            Log::error('Testimonial update error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $testimonial = Testimonial::findOrFail($id);

            // Delete image if exists
            if ($testimonial->image && file_exists(public_path($testimonial->image))) {
                unlink(public_path($testimonial->image));
            }

            $testimonial->delete();
            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Testimonial delete error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors('Could not delete testimonial.');
        }
    }

    public function toggleVisibility(Request $request, $id)
    {
        try {
            $testimonial = Testimonial::findOrFail($id);
            // Toggle the visibility: if it's 1, make it 0; if it's 0, make it 1
            $testimonial->visibility = $testimonial->visibility ? 0 : 1;
            $testimonial->save();
            
            return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial visibility updated successfully.');
        } catch (\Exception $e) {
            Log::error('Testimonial visibility toggle error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors('Could not update testimonial visibility.');
        }
    }
}
