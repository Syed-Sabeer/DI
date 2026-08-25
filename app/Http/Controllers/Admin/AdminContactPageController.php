<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminContactPageController extends Controller
{
    public function index()
    {
        $contact = \App\Models\ContactCmsPage::first();

        return view('admin.cms.contact.index', compact('contact'));
    }

    /**
     * Update contact section.
     */
    public function updateContact(\Illuminate\Http\Request $request)
    {
        try {
            // Validate contact CMS data
            $request->validate([
                'tab_heading' => 'nullable|string|max:255',
                'heading' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'number' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'address' => 'nullable|string',
                'location_link' => 'nullable|string',
            ]);

            // Contact CMS Section
            $contact = \App\Models\ContactCmsPage::first();
            
            $contactData = [
                'tab_heading' => $request->input('tab_heading') ?: '',
                'heading' => $request->input('heading') ?: '',
                'description' => $request->input('description') ?: '',
                'number' => $request->input('number') ?: '',
                'email' => $request->input('email') ?: '',
                'address' => $request->input('address') ?: '',
                'location_link' => $request->input('location_link') ?: '',
            ];

            if (!$contact) {
                // Create new record if none exists
                $contact = \App\Models\ContactCmsPage::create($contactData);
            } else {
                // Update existing record
                $contact->update($contactData);
            }

            \Log::info('Contact CMS section updated successfully', ['contact_id' => $contact->id, 'data' => $contactData]);

            return redirect()->route('admin.contact.index')->with('success', 'Contact section updated successfully!');

        } catch (\Exception $e) {
            \Log::error('Error updating contact CMS section', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->back()->withErrors(['error' => 'An error occurred while updating the contact section. Please try again.'])->withInput();
        }
    }
}
