<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class AdminPrivacyPolicyController extends Controller
{
    public function toggleVisibility(Request $request, $id)
    {
        try {
            $privacypolicy = PrivacyPolicy::findOrFail($id);
            // Toggle the visibility: if it's 1, make it 0; if it's 0, make it 1
            $privacypolicy->visibility = $privacypolicy->visibility ? 0 : 1;
            $privacypolicy->save();
            
            return redirect()->route('admin.privacy-policy.index')->with('success', 'Privacy Policy visibility updated successfully.');
        } catch (\Exception $e) {
            Log::error('Privacy Policy visibility toggle error:', ['message' => $e->getMessage()]);
                return redirect()->back()->withErrors('Could not update Privacy Policy visibility.');
        }
    }
  public function index()
  {
    $privacypolicys = PrivacyPolicy::all();
  return view('admin.crud.privacy-policy.index', compact('privacypolicys'));
  }

  public function add()
  {
        return view('admin.crud.privacy-policy.add');
  }

public function store(Request $request)
{
    try {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'visibility' => 'nullable|integer',
        ]);

        $validatedData = $request->only(['title', 'description', 'visibility']);

        Log::info('Validated Privacy Policy data:', $validatedData);

        $privacypolicy = PrivacyPolicy::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'visibility' => $validatedData['visibility'] ?? 1,
        ]);

        Log::info('Privacy Policy created successfully:', ['id' => $privacypolicy->id]);

        return redirect()->route('admin.privacy-policy.index')->with('success', 'Privacy Policy added successfully.');
    } catch (\Exception $e) {
        Log::error('Error while creating Privacy Policy:', ['message' => $e->getMessage()]);
        return redirect()->back()->withErrors($e->getMessage())->withInput();
    }
}

public function edit($id)
{
    $privacypolicy = PrivacyPolicy::findOrFail($id);
    return view('admin.crud.privacy-policy.edit', compact('privacypolicy'));
}


public function update(Request $request, $id)
{
    try {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'visibility' => 'nullable|integer',
        ]);

        $privacypolicy = PrivacyPolicy::findOrFail($id);
        $privacypolicy->update([
            'title' => $request->title,
            'description' => $request->description,
            'visibility' => $request->visibility ?? 1,
        ]);

        return redirect()->route('admin.privacy-policy.index')->with('success', 'Privacy Policy updated successfully.');
    } catch (\Exception $e) {
        Log::error('Privacy Policy update error:', ['message' => $e->getMessage()]);
        return redirect()->back()->withErrors($e->getMessage())->withInput();
    }
}

public function destroy($id)
{
    try {
        $privacypolicy = PrivacyPolicy::findOrFail($id);
        $privacypolicy->delete();
        return redirect()->route('admin.privacy-policy.index')->with('success', 'Privacy Policy deleted successfully.');
    } catch (\Exception $e) {
        Log::error('Privacy Policy delete error:', ['message' => $e->getMessage()]);
        return redirect()->back()->withErrors('Could not delete Privacy Policy.');
    }
}



}
