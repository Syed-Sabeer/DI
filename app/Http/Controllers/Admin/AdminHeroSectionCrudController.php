<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSectionCrud;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminHeroSectionCrudController extends Controller
{
    public function index()
    {
        $heroSections = HeroSectionCrud::all();
        return view('admin.crud.hero-section.index', compact('heroSections'));
    }

    public function add()
    {
        return view('admin.crud.hero-section.add');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'tab_heading' => 'required|string|max:255',
                'main_heading' => 'required|string|max:255',
                'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'car_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'car_name' => 'required|string|max:255',
                'car_quantity' => 'required|integer|min:0',
                'visibility' => 'nullable|integer',
            ]);

            $validatedData = $request->only(['tab_heading', 'main_heading', 'banner_image', 'car_image', 'car_name', 'car_quantity', 'visibility']);

            // Handle banner image upload
            if ($request->hasFile('banner_image')) {
                $bannerImage = $request->file('banner_image');
                $bannerImageName = time() . '_banner_' . $bannerImage->getClientOriginalName();
                
                // Ensure hero-section directory exists
                $heroSectionDir = public_path('uploads/hero-section');
                if (!file_exists($heroSectionDir)) {
                    mkdir($heroSectionDir, 0755, true);
                }
                
                $bannerImage->move($heroSectionDir, $bannerImageName);
                $validatedData['banner_image'] = 'uploads/hero-section/' . $bannerImageName;
            }

            // Handle car image upload
            if ($request->hasFile('car_image')) {
                $carImage = $request->file('car_image');
                $carImageName = time() . '_car_' . $carImage->getClientOriginalName();
                
                // Ensure hero-section directory exists
                $heroSectionDir = public_path('uploads/hero-section');
                if (!file_exists($heroSectionDir)) {
                    mkdir($heroSectionDir, 0755, true);
                }
                
                $carImage->move($heroSectionDir, $carImageName);
                $validatedData['car_image'] = 'uploads/hero-section/' . $carImageName;
            }

            Log::info('Validated HeroSectionCrud data:', $validatedData);

            $heroSection = HeroSectionCrud::create([
                'tab_heading' => $validatedData['tab_heading'],
                'main_heading' => $validatedData['main_heading'],
                'banner_image' => $validatedData['banner_image'] ?? null,
                'car_image' => $validatedData['car_image'] ?? null,
                'car_name' => $validatedData['car_name'],
                'car_quantity' => $validatedData['car_quantity'],
                'visibility' => $validatedData['visibility'] ?? 1,
            ]);

            Log::info('HeroSectionCrud created successfully:', ['id' => $heroSection->id]);

            return redirect()->route('admin.hero-section.index')->with('success', 'Hero Section added successfully.');
        } catch (\Exception $e) {
            Log::error('Error while creating hero section:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $heroSection = HeroSectionCrud::findOrFail($id);
        return view('admin.crud.hero-section.edit', compact('heroSection'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'tab_heading' => 'required|string|max:255',
                'main_heading' => 'required|string|max:255',
                'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'car_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'car_name' => 'required|string|max:255',
                'car_quantity' => 'required|integer|min:0',
                'visibility' => 'nullable|integer',
            ]);

            $heroSection = HeroSectionCrud::findOrFail($id);
            $updateData = [
                'tab_heading' => $request->tab_heading,
                'main_heading' => $request->main_heading,
                'car_name' => $request->car_name,
                'car_quantity' => $request->car_quantity,
                'visibility' => $request->visibility ?? 1,
            ];

            // Handle banner image upload
            if ($request->hasFile('banner_image')) {
                // Delete old banner image if exists
                if ($heroSection->banner_image && file_exists(public_path($heroSection->banner_image))) {
                    unlink(public_path($heroSection->banner_image));
                }

                $bannerImage = $request->file('banner_image');
                $bannerImageName = time() . '_banner_' . $bannerImage->getClientOriginalName();
                
                // Ensure hero-section directory exists
                $heroSectionDir = public_path('uploads/hero-section');
                if (!file_exists($heroSectionDir)) {
                    mkdir($heroSectionDir, 0755, true);
                }
                
                $bannerImage->move($heroSectionDir, $bannerImageName);
                $updateData['banner_image'] = 'uploads/hero-section/' . $bannerImageName;
            }

            // Handle car image upload
            if ($request->hasFile('car_image')) {
                // Delete old car image if exists
                if ($heroSection->car_image && file_exists(public_path($heroSection->car_image))) {
                    unlink(public_path($heroSection->car_image));
                }

                $carImage = $request->file('car_image');
                $carImageName = time() . '_car_' . $carImage->getClientOriginalName();
                
                // Ensure hero-section directory exists
                $heroSectionDir = public_path('uploads/hero-section');
                if (!file_exists($heroSectionDir)) {
                    mkdir($heroSectionDir, 0755, true);
                }
                
                $carImage->move($heroSectionDir, $carImageName);
                $updateData['car_image'] = 'uploads/hero-section/' . $carImageName;
            }

            $heroSection->update($updateData);

            return redirect()->route('admin.hero-section.index')->with('success', 'Hero Section updated successfully.');
        } catch (\Exception $e) {
            Log::error('HeroSectionCrud update error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $heroSection = HeroSectionCrud::findOrFail($id);

            // Delete banner image if exists
            if ($heroSection->banner_image && file_exists(public_path($heroSection->banner_image))) {
                unlink(public_path($heroSection->banner_image));
            }

            // Delete car image if exists
            if ($heroSection->car_image && file_exists(public_path($heroSection->car_image))) {
                unlink(public_path($heroSection->car_image));
            }

            $heroSection->delete();
            return redirect()->route('admin.hero-section.index')->with('success', 'Hero Section deleted successfully.');
        } catch (\Exception $e) {
            Log::error('HeroSectionCrud delete error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors('Could not delete hero section.');
        }
    }

    public function toggleVisibility(Request $request, $id)
    {
        try {
            $heroSection = HeroSectionCrud::findOrFail($id);
            // Toggle the visibility: if it's 1, make it 0; if it's 0, make it 1
            $heroSection->visibility = $heroSection->visibility ? 0 : 1;
            $heroSection->save();
            
            return redirect()->route('admin.hero-section.index')->with('success', 'Hero Section visibility updated successfully.');
        } catch (\Exception $e) {
            Log::error('HeroSectionCrud visibility toggle error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors('Could not update hero section visibility.');
        }
    }
}
