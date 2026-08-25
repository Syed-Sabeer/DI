<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CmsHomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminHomePageController extends Controller
{
    public function index()
    {
        $homePage = CmsHomePage::first();
        return view('admin.cms.home.index', compact('homePage'));
    }

    /**
     * Update home page CMS data.
     */
    public function updateHomePage(Request $request)
    {
        try {
            // Validate home page CMS data
            $request->validate([
                'feature_heading' => 'nullable|string|max:300',
                'feature_icon_1' => 'nullable|string|max:300',
                'feature_title_1' => 'nullable|string|max:300',
                'feature_detail_1' => 'nullable|string|max:300',
                'feature_icon_2' => 'nullable|string|max:300',
                'feature_title_2' => 'nullable|string|max:300',
                'feature_detail_2' => 'nullable|string|max:300',
                'feature_icon_3' => 'nullable|string|max:300',
                'feature_title_3' => 'nullable|string|max:300',
                'feature_detail_3' => 'nullable|string|max:300',
                'feature_icon_4' => 'nullable|string|max:300',
                'feature_title_4' => 'nullable|string|max:300',
                'feature_detail_4' => 'nullable|string|max:300',
                'feature_icon_5' => 'nullable|string|max:300',
                'feature_title_5' => 'nullable|string|max:300',
                'feature_detail_5' => 'nullable|string|max:300',
                'feature_icon_6' => 'nullable|string|max:300',
                'feature_title_6' => 'nullable|string|max:300',
                'feature_detail_6' => 'nullable|string|max:300',
                'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'play_store_app_link' => 'nullable|string',
                'app_store_app_link' => 'nullable|string',
                'service_heading' => 'nullable|string|max:300',
                'service_description' => 'nullable|string',
                'service_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Get or create home page record
            $homePage = CmsHomePage::first();
            
            $homePageData = [
                'feature_heading' => $request->input('feature_heading') ?: '',
                'feature_icon_1' => $request->input('feature_icon_1') ?: '',
                'feature_title_1' => $request->input('feature_title_1') ?: '',
                'feature_detail_1' => $request->input('feature_detail_1') ?: '',
                'feature_icon_2' => $request->input('feature_icon_2') ?: '',
                'feature_title_2' => $request->input('feature_title_2') ?: '',
                'feature_detail_2' => $request->input('feature_detail_2') ?: '',
                'feature_icon_3' => $request->input('feature_icon_3') ?: '',
                'feature_title_3' => $request->input('feature_title_3') ?: '',
                'feature_detail_3' => $request->input('feature_detail_3') ?: '',
                'feature_icon_4' => $request->input('feature_icon_4') ?: '',
                'feature_title_4' => $request->input('feature_title_4') ?: '',
                'feature_detail_4' => $request->input('feature_detail_4') ?: '',
                'feature_icon_5' => $request->input('feature_icon_5') ?: '',
                'feature_title_5' => $request->input('feature_title_5') ?: '',
                'feature_detail_5' => $request->input('feature_detail_5') ?: '',
                'feature_icon_6' => $request->input('feature_icon_6') ?: '',
                'feature_title_6' => $request->input('feature_title_6') ?: '',
                'feature_detail_6' => $request->input('feature_detail_6') ?: '',
                'play_store_app_link' => $request->input('play_store_app_link') ?: '',
                'app_store_app_link' => $request->input('app_store_app_link') ?: '',
                'service_heading' => $request->input('service_heading') ?: '',
                'service_description' => $request->input('service_description') ?: '',
            ];

            // Handle feature image upload
            if ($request->hasFile('feature_image')) {
                // Delete old image if exists
                if ($homePage && $homePage->feature_image && file_exists(public_path($homePage->feature_image))) {
                    unlink(public_path($homePage->feature_image));
                }
                
                $image = $request->file('feature_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/home'), $imageName);
                $homePageData['feature_image'] = 'uploads/home/' . $imageName;
            }

            // Handle service image upload
            if ($request->hasFile('service_image')) {
                // Delete old image if exists
                if ($homePage && $homePage->service_image && file_exists(public_path($homePage->service_image))) {
                    unlink(public_path($homePage->service_image));
                }
                
                $image = $request->file('service_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/home'), $imageName);
                $homePageData['service_image'] = 'uploads/home/' . $imageName;
            }

            if (!$homePage) {
                // Create new record if none exists
                $homePage = CmsHomePage::create($homePageData);
            } else {
                // Update existing record
                $homePage->update($homePageData);
            }

            Log::info('Home page CMS section updated successfully', ['home_page_id' => $homePage->id, 'data' => $homePageData]);

            return redirect()->route('admin.home.index')->with('success', 'Home page sections updated successfully!');

        } catch (\Exception $e) {
            Log::error('Error updating home page CMS section', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the home page sections. Please try again.'])->withInput();
        }
    }
}
