<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index()
    {
        $businessSetting = \App\Models\BusinessSetting::first();
        return view('admin.business-settings.index', compact('businessSetting'));
    }

    public function updateBusinessSettings(Request $request)
    {
        try {
            // Validate business settings data
            $request->validate([
                'email' => 'nullable|email|max:255',
                'address' => 'nullable|string',
                'phone' => 'nullable|string|max:255',
                'facebook_link' => 'nullable|string|max:255',
                'youtube_link' => 'nullable|string|max:255',
                'tiktok_link' => 'nullable|string|max:255',
                'instagram_link' => 'nullable|string|max:255',
                'footer_copyright_text' => 'nullable|string',
                'light_logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
                'dark_logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            ]);

            // Business Settings
            $businessSetting = \App\Models\BusinessSetting::first();
            
            $businessSettingData = [
                'email' => $request->input('email') ?: '',
                'address' => $request->input('address') ?: '',
                'phone' => $request->input('phone') ?: '',
                'facebook_link' => $request->input('facebook_link') ?: '',
                'youtube_link' => $request->input('youtube_link') ?: '',
                'tiktok_link' => $request->input('tiktok_link') ?: '',
                'instagram_link' => $request->input('instagram_link') ?: '',
                'footer_copyright_text' => $request->input('footer_copyright_text') ?: '',
            ];

            // Handle light logo image upload
            if ($request->hasFile('light_logo_image')) {
                // Delete old light logo if exists
                if ($businessSetting && $businessSetting->light_logo_image && file_exists(public_path($businessSetting->light_logo_image))) {
                    unlink(public_path($businessSetting->light_logo_image));
                }

                $lightLogo = $request->file('light_logo_image');
                $lightLogoName = time() . '_light_logo_' . $lightLogo->getClientOriginalName();
                
                // Ensure business-settings directory exists
                $businessSettingsDir = public_path('uploads/business-settings');
                if (!file_exists($businessSettingsDir)) {
                    mkdir($businessSettingsDir, 0755, true);
                }
                
                $lightLogo->move($businessSettingsDir, $lightLogoName);
                $businessSettingData['light_logo_image'] = 'uploads/business-settings/' . $lightLogoName;
            }

            // Handle dark logo image upload
            if ($request->hasFile('dark_logo_image')) {
                // Delete old dark logo if exists
                if ($businessSetting && $businessSetting->dark_logo_image && file_exists(public_path($businessSetting->dark_logo_image))) {
                    unlink(public_path($businessSetting->dark_logo_image));
                }

                $darkLogo = $request->file('dark_logo_image');
                $darkLogoName = time() . '_dark_logo_' . $darkLogo->getClientOriginalName();
                
                // Ensure business-settings directory exists
                $businessSettingsDir = public_path('uploads/business-settings');
                if (!file_exists($businessSettingsDir)) {
                    mkdir($businessSettingsDir, 0755, true);
                }
                
                $darkLogo->move($businessSettingsDir, $darkLogoName);
                $businessSettingData['dark_logo_image'] = 'uploads/business-settings/' . $darkLogoName;
            }

            if (!$businessSetting) {
                // Create new record if none exists
                $businessSetting = \App\Models\BusinessSetting::create($businessSettingData);
            } else {
                // Update existing record
                $businessSetting->update($businessSettingData);
            }

            \Log::info('Business settings updated successfully', ['businessSetting_id' => $businessSetting->id, 'data' => $businessSettingData]);

            return redirect()->route('admin.company.settings')->with('success', 'Business settings updated successfully!');

        } catch (\Exception $e) {
            \Log::error('Error updating business settings', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating business settings. Please try again.'])->withInput();
        }
    }
}
