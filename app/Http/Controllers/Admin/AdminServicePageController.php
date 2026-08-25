<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CmsServicePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminServicePageController extends Controller
{
    public function index()
    {
        $servicePage = CmsServicePage::first();
        return view('admin.cms.service.index', compact('servicePage'));
    }


    public function updateServicePage(Request $request)
    {
        try {
            // Validate service page CMS data
            $request->validate([
                'banner_heading' => 'nullable|string|max:500',
                'banner_description' => 'nullable|string|max:500',
                'banner_button_link' => 'nullable|string',
                'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'company_heading' => 'nullable|string|max:255',
                'company_description' => 'nullable|string',
                'company_video' => 'nullable|file|max:102400',
                'company_subheading' => 'nullable|string|max:500',
                'company_button_title' => 'nullable|string|max:500',
                'company_button_link' => 'nullable|string',
                'blog_tab_title' => 'nullable|string|max:500',
                'blog_heading' => 'nullable|string|max:500',
                'blog_description' => 'nullable|string',
                'service_main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'choose_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'choose_heading' => 'nullable|string|max:500',
                'choose_tab_title_1' => 'nullable|string|max:500',
                'choose_tab_value_1' => 'nullable|string|max:500',
                'choose_tab_title_2' => 'nullable|string|max:500',
                'choose_tab_value_2' => 'nullable|string|max:500',
                'choose_button_title' => 'nullable|string|max:500',
                'choose_button_link' => 'nullable|string',
            ]);

            // Get or create service page record
            $servicePage = CmsServicePage::first();
            
            $servicePageData = [
                'banner_heading' => $request->input('banner_heading') ?: '',
                'banner_description' => $request->input('banner_description') ?: '',
                'banner_button_link' => $request->input('banner_button_link') ?: '',
                'company_heading' => $request->input('company_heading') ?: '',
                'company_description' => $request->input('company_description') ?: '',
                'company_subheading' => $request->input('company_subheading') ?: '',
                'company_button_title' => $request->input('company_button_title') ?: '',
                'company_button_link' => $request->input('company_button_link') ?: '',
                'blog_tab_title' => $request->input('blog_tab_title') ?: '',
                'blog_heading' => $request->input('blog_heading') ?: '',
                'blog_description' => $request->input('blog_description') ?: '',
                'choose_heading' => $request->input('choose_heading') ?: '',
                'choose_tab_title_1' => $request->input('choose_tab_title_1') ?: '',
                'choose_tab_value_1' => $request->input('choose_tab_value_1') ?: '',
                'choose_tab_title_2' => $request->input('choose_tab_title_2') ?: '',
                'choose_tab_value_2' => $request->input('choose_tab_value_2') ?: '',
                'choose_button_title' => $request->input('choose_button_title') ?: '',
                'choose_button_link' => $request->input('choose_button_link') ?: '',
            ];

            // Handle banner image upload
            if ($request->hasFile('banner_image')) {
                // Delete old image if exists
                if ($servicePage && $servicePage->banner_image && file_exists(public_path($servicePage->banner_image))) {
                    unlink(public_path($servicePage->banner_image));
                }
                
                $image = $request->file('banner_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/service'), $imageName);
                $servicePageData['banner_image'] = 'uploads/service/' . $imageName;
            }

            // Handle service main image upload
            if ($request->hasFile('service_main_image')) {
                // Delete old image if exists
                if ($servicePage && $servicePage->service_main_image && file_exists(public_path($servicePage->service_main_image))) {
                    unlink(public_path($servicePage->service_main_image));
                }
                
                $image = $request->file('service_main_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/service'), $imageName);
                $servicePageData['service_main_image'] = 'uploads/service/' . $imageName;
            }

            // Handle choose image upload
            if ($request->hasFile('choose_image')) {
                // Delete old image if exists
                if ($servicePage && $servicePage->choose_image && file_exists(public_path($servicePage->choose_image))) {
                    unlink(public_path($servicePage->choose_image));
                }
                
                $image = $request->file('choose_image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/service'), $imageName);
                $servicePageData['choose_image'] = 'uploads/service/' . $imageName;
            }

            // Handle company video upload
            if ($request->hasFile('company_video')) {
                $video = $request->file('company_video');
                $allowedExtensions = ['mp4', 'avi', 'mov', 'wmv', 'flv', 'webm'];
                $extension = strtolower($video->getClientOriginalExtension());
                
                // Debug logging
                Log::info('Video upload debug', [
                    'original_name' => $video->getClientOriginalName(),
                    'extension' => $extension,
                    'mime_type' => $video->getMimeType(),
                    'size' => $video->getSize()
                ]);
                
                if (!in_array($extension, $allowedExtensions)) {
                    return redirect()->back()->withErrors(['company_video' => 'The company video must be a file of type: mp4, avi, mov, wmv, flv, webm. Received: ' . $extension])->withInput();
                }
                
                // Delete old video if exists
                if ($servicePage && $servicePage->company_video && file_exists(public_path($servicePage->company_video))) {
                    unlink(public_path($servicePage->company_video));
                }
                
                $videoName = time() . '_' . $video->getClientOriginalName();
                $video->move(public_path('uploads/service'), $videoName);
                $servicePageData['company_video'] = 'uploads/service/' . $videoName;
            }

            if (!$servicePage) {
                // Create new record if none exists
                $servicePage = CmsServicePage::create($servicePageData);
            } else {
                // Update existing record
                $servicePage->update($servicePageData);
            }

            Log::info('Service page CMS section updated successfully', ['service_page_id' => $servicePage->id, 'data' => $servicePageData]);

            return redirect()->route('admin.service-page.index')->with('success', 'Service page sections updated successfully!');

        } catch (\Exception $e) {
            Log::error('Error updating service page CMS section', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the service page sections. Please try again.'])->withInput();
        }
    }
}
