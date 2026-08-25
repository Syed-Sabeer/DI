<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminWebsiteController extends Controller
{

  
    public function index()
    {
        $hero = \App\Models\HomeHeroSection::first();
 

        return view('admin.cms.home.index', compact(
            'hero'
        ));
    }

    public function royaltycms()
    {
        $aboutSection = \App\Models\CmsRoyaltyCollection::first();
        return view('admin.cms.royaltycollection.index', compact('aboutSection'));
    }

    
    public function updateAllSections(\Illuminate\Http\Request $request)
    {
        try {
            // Validate hero section data
            $request->validate([
                'heading' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'button_link' => 'nullable|string',
                'song_name' => 'nullable|string',
                'song_album' => 'nullable|string|max:255',
                'bg_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'song_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'song' => 'nullable|file|mimes:mp3,wav,ogg|max:10240',
                'pc_image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'pc_image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'pc_image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'pc_image_4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Hero Section
            $hero = \App\Models\HomeHeroSection::first();
            
            $heroData = [
                'heading' => $request->input('heading') ?: '',
                'description' => $request->input('description') ?: '',
                'button_link' => $request->input('button_link') ?: '',
                'song_name' => $request->input('song_name') ?: '',
                'song_album' => $request->input('song_album') ?: '',
            ];

            // Handle background image
            if ($request->hasFile('bg_image')) {
                $image = $request->file('bg_image');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $heroData['bg_image'] = 'uploads/' . $imageName;
            }

            // Handle song image
            if ($request->hasFile('song_image')) {
                $image = $request->file('song_image');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $heroData['song_image'] = 'uploads/' . $imageName;
            }

            // Handle song file
            if ($request->hasFile('song')) {
                $songFile = $request->file('song');
                $songName = time().'_'.$songFile->getClientOriginalName();
                $songFile->move(public_path('uploads/audio'), $songName);
                $heroData['song'] = 'uploads/audio/' . $songName;
            }

            // Handle popular corner images
            if ($request->hasFile('pc_image_1')) {
                $image = $request->file('pc_image_1');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $heroData['pc_image_1'] = 'uploads/' . $imageName;
            }
            if ($request->hasFile('pc_image_2')) {
                $image = $request->file('pc_image_2');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $heroData['pc_image_2'] = 'uploads/' . $imageName;
            }
            if ($request->hasFile('pc_image_3')) {
                $image = $request->file('pc_image_3');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $heroData['pc_image_3'] = 'uploads/' . $imageName;
            }
            if ($request->hasFile('pc_image_4')) {
                $image = $request->file('pc_image_4');
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $heroData['pc_image_4'] = 'uploads/' . $imageName;
            }

            if (!$hero) {
                // Only create if there's actual data
                $hero = \App\Models\HomeHeroSection::create($heroData);
            } else {
                $hero->update($heroData);
            }
            \Log::info('Hero section updated successfully', ['hero_id' => $hero->id, 'data' => $heroData]);
        } catch (\Exception $e) {
            \Log::error('Error updating hero section', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            throw $e;
        }

       
    }

    public function companyWelcome()
    {
        $ourCompany = \App\Models\CompanyWelcome::first();
        return view('admin.cms.companywelcome.index', compact('ourCompany'));
    }


    public function companyWelcomeUpdate(\Illuminate\Http\Request $request)
    {
        try {
            // Validate company welcome data
            $request->validate([
                'tab_heading' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'button_text' => 'nullable|string|max:255',
                'button_link' => 'nullable|string',
                'tab_heading_1' => 'nullable|string|max:255',
                'tab_value_1' => 'nullable|string|max:255',
                'tab_heading_2' => 'nullable|string|max:255',
                'tab_value_2' => 'nullable|string|max:255',
                'tab_heading_3' => 'nullable|string|max:255',
                'tab_value_3' => 'nullable|string|max:255',
                'tab_heading_4' => 'nullable|string|max:255',
                'tab_value_4' => 'nullable|string|max:255',
               
            ]);

            // Company Welcome Section
            $ourCompany = \App\Models\CompanyWelcome::first();
            
            $ourCompanyData = [
                'tab_heading' => $request->input('tab_heading') ?: '',
                'heading' => $request->input('heading') ?: '',
                'description' => $request->input('description') ?: '',
                'button_text' => $request->input('button_text') ?: '',
                'button_link' => $request->input('button_link') ?: '',
                'tab_heading_1' => $request->input('tab_heading_1') ?: '',
                'tab_value_1' => $request->input('tab_value_1') ?: '',
                'tab_heading_2' => $request->input('tab_heading_2') ?: '',
                'tab_value_2' => $request->input('tab_value_2') ?: '',
                'tab_heading_3' => $request->input('tab_heading_3') ?: '',
                'tab_value_3' => $request->input('tab_value_3') ?: '',
                'tab_heading_4' => $request->input('tab_heading_4') ?: '',
                'tab_value_4' => $request->input('tab_value_4') ?: '',
            ];

        
            if (!$ourCompany) {
                // Create new record if none exists
                $ourCompany = \App\Models\CompanyWelcome::create($ourCompanyData);
            } else {
                // Update existing record
                $ourCompany->update($ourCompanyData);
            }

            \Log::info('Company welcome section updated successfully', ['ourCompany_id' => $ourCompany->id, 'data' => $ourCompanyData]);

            return redirect()->route('admin.company.welcome')->with('success', 'Company Welcome section updated successfully!');

        } catch (\Exception $e) {
            \Log::error('Error updating company welcome section', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the company welcome section. Please try again.'])->withInput();
        }
    }

        
    public function OurCompanyCms()
    {
        $ourCompany = \App\Models\OurCompanyCmsPage::first();
        return view('admin.cms.ourcompany.index', compact('ourCompany'));
    }

    public function updateOurCompanyCms(\Illuminate\Http\Request $request)
    {
        try {
            // Validate royalty collection data
            $request->validate([
                    'tab_title' => 'nullable|string|max:255',
                    'heading' => 'nullable|string|max:255',
                    'description' => 'nullable|string',
                    'button_text' => 'nullable|string|max:255',
                    'button_link' => 'nullable|string',
                    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
                    'card_title_1' => 'nullable|string|max:255',
                    'card_value_1' => 'nullable|string|max:255',
                    'card_title_2' => 'nullable|string|max:255',
                    'card_value_2' => 'nullable|string|max:255',
                    'card_title_3' => 'nullable|string|max:255',
                    'card_value_3' => 'nullable|string|max:255',
                   
                   
            ]);

            // Royalty Collection Section
            $ourCompany = \App\Models\OurCompanyCmsPage::first();
            
            $ourCompanyData = [
                'tab_title' => $request->input('tab_title') ?: '',
                'heading' => $request->input('heading') ?: '',
                'description' => $request->input('description') ?: '',
                'button_text' => $request->input('button_text') ?: '',
                'button_link' => $request->input('button_link') ?: '',
                'card_title_1' => $request->input('card_title_1') ?: '',
                'card_value_1' => $request->input('card_value_1') ?: '',
                'card_title_2' => $request->input('card_title_2') ?: '',
                'card_value_2' => $request->input('card_value_2') ?: '',
                'card_title_3' => $request->input('card_title_3') ?: '',
                'card_value_3' => $request->input('card_value_3') ?: '',
            ];

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($ourCompany && $ourCompany->image && file_exists(public_path($ourCompany->image))) {
                    unlink(public_path($ourCompany->image));
                }

                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                
                // Ensure ourcompany directory exists
                $ourCompanyDir = public_path('uploads/ourcompany');
                if (!file_exists($ourCompanyDir)) {
                    mkdir($ourCompanyDir, 0755, true);
                }
                
                $image->move($ourCompanyDir, $imageName);
                $ourCompanyData['image'] = 'uploads/ourcompany/' . $imageName;
            }

            if (!$ourCompany) {
                // Create new record if none exists
                $ourCompany = \App\Models\OurCompanyCmsPage::create($ourCompanyData);
            } else {
                // Update existing record
                $ourCompany->update($ourCompanyData);
            }

            \Log::info('Royalty collection section updated successfully', ['ourCompany_id' => $ourCompany->id, 'data' => $ourCompanyData]);

            return redirect()->route('admin.ourcompany.cms')->with('success', 'Our Company Collection section updated successfully!');

        } catch (\Exception $e) {
            \Log::error('Error updating our company collection section', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the royalty collection section. Please try again.'])->withInput();
        }
    }
}
