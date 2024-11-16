<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Official;
use Illuminate\Support\Facades\Validator;
class OfficialController extends Controller
{
    public function addOfficial(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|regex:/^[a-zA-Z0-9\s\-&.,_$#@!]+$/',
            'position' => 'required|string|regex:/^[a-zA-Z0-9\s\-&.,_$#@!]+$/',
            'profile' => 'required|file|max:50000|mimes:png,jpg,jpeg',
        ],[
            'name.required' => 'The Name of Officer field is required.',
            'name.string' => 'The Name of Officer field must be a string.',
            'name.regex' => 'The Name of Officer field must only contain letters, numbers, spaces, hyphens, and ampersands.',
            'name.unique' => 'The Name of Officer already exists.',
            'position.required' => 'The position of Officer field is required.',
            'position.string' => 'The position of Officer field must be a string.',
            'position.regex' => 'The position of Officer field must only contain letters, numbers, spaces, hyphens, and ampersands.',
            'position.unique' => 'The position of Officer already exists.',
            'profile.required' => 'The profile of Officer field is required.',
            'profile.file' => 'The profile of Officer field must be a file.',
            'profile.max' => 'The profile of Officer file size must not exceed 50 MB.',
            'profile.mimes' => 'The profile of Officer file must be a PNG, JPG, or JPEG image.',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 422);
        }
        $existingOfficial = Official::where(function ($query) use ($request) {
            $query->where('name', $request->name)
                ->orWhere('position', $request->position)
                ->where('status', 'active');
        })
        ->where(function ($query) {
            $query->whereIn('status', ['active']);
        })
        ->first();
    
    if ($existingOfficial) {
        return response()->json(['error' => 'An official with the same name or position already exists.'], 422);
    }
    
        // Process the file upload
        //$profilePath = $request->file('profile')->store('residentprofile');
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $fileName = time() . '_' . $file->getClientOriginalName();
            // Move the uploaded file to public/profiles folder
            $file->move(public_path('residentprofile'), $fileName);
            // Save $fileName in your database or use it as needed
            // For example, if you have an 'officials' table with a 'profile_image' column:
       
        
        // Create a new Official model instance
        $official = new Official();
        $official->name = $request->name;
        $official->position = $request->position;
        $official->profile_path = $fileName;
        $official->status = 'active';
        $official->save();

        return response()->json(['success' => true]); 
    }
    }
    public function index()
    {
        $officials = Official::all();
        return response()->json($officials);
    }
    public function updateStatus(Request $request)
{
    $officialId = $request->input('id');
    $status = $request->input('status');
    // Update the status of the official
    $official = Official::find($officialId);
    
    $official->status = $status;
    $official->save();

    // You can return a success response if needed
    return response()->json(['message' => 'Official status updated successfully']);
}
public function archiveAll()
{
    try {
        // Archive all officials
        Official::where('status', 'active')->update(['status' => 'Archive']);
        
        // Return success response
        return response()->json(['message' => 'All official members archived successfully'], 200);
    } catch (\Exception $e) {
        // Return error response if an exception occurs
        return response()->json(['error' => 'Failed to archive all official members'], 500);
    }
}
public function edit($id)
{
    $official = Official::find($id);
    return response()->json($official);
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|regex:/^[a-zA-Z0-9\s\-&.,_$#@!]+$/',
        'position' => 'required|string|regex:/^[a-zA-Z0-9\s\-&.,_$#@!]+$/',
        'profile' => 'nullable|image|mimes:png,jpg,jpeg|max:51200',
    ]);

    $official = Official::find($id);
    if (!$official) {
        return response()->json(['message' => 'Official not found'], 404);
    }

    $official->name = $request->name;
    $official->position = $request->position;

    if ($request->hasFile('profile')) {
        $file = $request->file('profile');
        $fileName = time() . '_' . $file->getClientOriginalName();
        // Move the uploaded file to public/profiles folder
        $file->move(public_path('residentprofile'), $fileName);
        $official->profile_path = $fileName;
    }

    $official->save();

    return response()->json(['message' => 'Official updated successfully']);
}
}
