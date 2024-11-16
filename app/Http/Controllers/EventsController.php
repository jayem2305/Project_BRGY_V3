<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Info;
use Illuminate\Support\Facades\Log;
class EventsController extends Controller
{
    public function index()
    {
        $events = Events::all();
        return response()->json($events);
    }
    public function store(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $type = $request->input('type');
        $status = $request->input('status');
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            // Add any other validation rules as needed
        ]);

        // Create a new announcement instance
        $announcement = new Events();
        $announcement->title = $title;
        $announcement->content =  $content;
        $announcement->Type_of_event =  $type;
        $announcement->status = $status;
        // Set other fields as needed

        // Save the announcement to the database
        $announcement->save();

        // Return a JSON response indicating success
        return response()->json(['success' => true]);
    }
    public function store_event(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $type = $request->input('type');
        $status = $request->input('status');
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date',            
            // Add any other validation rules as needed
        ]);

        if($end_time < $start_time){
            return response()->json(['error' => 'End date must be greater than or equal to the start date.'], 422);
        }
        // Create a new announcement instance
        $announcement = new Events();
        $announcement->title = $title;
        $announcement->content = $content;
        $announcement->start_time = $start_time;
        $announcement->end_time = $end_time;
        $announcement->Type_of_event =  $type;
        $announcement->status = $status;
        // Set other fields as needed

        // Save the announcement to the database
        $announcement->save();

        // Return a JSON response indicating success
        return response()->json(['success' => true]);
    }
    public function store_project(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $start_time = $request->input('start_time');
        $end_time = $request->input('end_time');
        $type = $request->input('type');
        $status = $request->input('status');
        
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'start_time' => 'required|date',
            'end_time' => 'required|date', 
            'image' => 'required|mimes:pdf,png,jpg,jpeg|max:50000',            
            // Add any other validation rules as needed
        ]);
        if($end_time < $start_time){
            return response()->json(['error' => 'End date must be greater than or equal to the start date.'], 422);
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->isValid()) {
                $image_name = time() . '_' . $image->getClientOriginalName();
                // Move the uploaded file to the desired directory
                $image->move(public_path('barangayprorfile'), $image_name);
                // Store the filename in the session or database if needed
                $request->session()->put('image_filename', $image_name);
            } else {
                return response()->json(['error' => 'Invalid image file.'], 422);
            }
        } else {
            return response()->json(['error' => 'image file is required.'], 422);
        }

        // Create a new announcement instance
        $announcement = new Events();
        $announcement->title = $title;
        $announcement->content = $content;
        $announcement->image = $image_name;
        $announcement->start_time = $start_time;
        $announcement->end_time = $end_time;
        $announcement->Type_of_event =  $type;
        $announcement->status = $status;
        // Set other fields as needed
        Log::info('Retrieved Resident:', ['image' => $image]);

        // Save the announcement to the database
        $announcement->save();

        // Return a JSON response indicating success
        return response()->json(['success' => true]);
    }
    public function archive($id)
{
    
    $event = Events::findOrFail($id);
    $event->status = 'Archive';
    $event->save();

    return response()->json(['message' => 'Event archived successfully.']);
}
public function restore($id)
{
    
    $event = Events::findOrFail($id);
    $event->status = 'Active';
    $event->save();

    return response()->json(['message' => 'Event Restore successfully.']);
}
public function showlist($eventId)
{
    // Retrieve the event from the database
    $event = Events::findOrFail($eventId);

    // Return the event data in JSON format
    return response()->json($event);
}
public function update(Request $request)
    {
        // Validate the request data
    $request->validate([
        'id' => 'required|exists:events,id',
        'content' => 'required',
        'title' => 'required|unique:events,title,' . $request->input('id'),
    ], [
        'content.required' => 'The content field is required.',
        'title.required' => 'The title field is required.',
        'title.unique' => 'The title must be unique.',
    ]);

    // Retrieve the updated content from the request
    $updatedContent = $request->input('content');
    $updatedTitle = $request->input('title');

    // Update the announcement content in the database
    $announcement = Events::findOrFail($request->input('id'));
    $announcement->content = $updatedContent;
    $announcement->title = $updatedTitle;
    $announcement->save();

    // Return a response indicating success
    return response()->json(['message' => 'Announcement updated successfully.']);

    }
    public function update_event(Request $request)
    {
        // Validate the request data
    $request->validate([
        'id' => 'required|exists:events,id',
        'content' => 'required',
        'end_time' => 'required|date|after:start_time',
        'start_time' => 'required|date|before:end_time',
        'title' => 'required|unique:events,title,' . $request->input('id'),
    ], [
        'content.required' => 'The content field is required.',
        'title.required' => 'The title field is required.',
        'title.unique' => 'The title must be unique.',
        'end_time.required' => 'The end date field is required.',
        'start_time.required' => 'The start date field is required.',
        'end_time.date' => 'The end date must be a valid date.',
        'start_time.date' => 'The start date must be a valid date.',
        'end_time.before' => 'End date and Start date Is invalid.',
        'start_time.after' => 'End date and Start date Is invalid.',
    ]);

    // Retrieve the updated content from the request
    $updatedContent = $request->input('content');
    $updatedTitle = $request->input('title');
    $updatedStart_date = $request->input('start_time');
    $updatedEnd_date = $request->input('end_time');
    if($updatedEnd_date < $updatedStart_date){
        return response()->json(['error' => 'End date and Start date Is invalid.'], 422);
    }
    // Update the announcement content in the database
    $announcement = Events::findOrFail($request->input('id'));
    $announcement->content = $updatedContent;
    $announcement->title = $updatedTitle;
    $announcement->start_time = $updatedStart_date;
    $announcement->end_time = $updatedEnd_date;
    $announcement->save();

    // Return a response indicating success
    return response()->json(['message' => 'Event updated successfully.']);

    }
    public function update_project(Request $request)
{
    // Validate the request data
    $request->validate([
        'id' => 'required|exists:events,id',
        'content' => 'required',
        'end_time' => 'required|date|after:start_time',
        'start_time' => 'required|date|before:end_time',
        'title' => 'required',
    ], [
        'content.required' => 'The content field is required.',
        'title.required' => 'The title field is required.',
        'end_time.required' => 'The end date field is required.',
        'start_time.required' => 'The start date field is required.',
        'end_time.date' => 'The end date must be a valid date.',
        'start_time.date' => 'The start date must be a valid date.',
        'end_time.before' => 'End date and Start date Is invalid.',
        'start_time.after' => 'End date and Start date Is invalid.',
    ]);

    // Check if the image file exists in the request
   

    // Retrieve the updated content from the request
    $updatedContent = $request->input('content');
    $updatedTitle = $request->input('title');
    $updatedStart_date = $request->input('start_time');
    $updatedEnd_date = $request->input('end_time');
    if($updatedEnd_date < $updatedStart_date){
        return response()->json(['error' => 'End date and Start date Is invalid.'], 422);
    }
    // Update the announcement content in the database
    $announcement = Events::findOrFail($request->input('id'));
    $announcement->content = $updatedContent;
    $announcement->title = $updatedTitle;
    $announcement->start_time = $updatedStart_date;
    $announcement->end_time = $updatedEnd_date;

    // Check if image file exists and update the image field
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $request->validate([
                'image' => 'required|file|max:50000|mimes:png,jpg,jpeg', // Add your desired image validation rules
            ]);
            // Validate the image file
            if ($image->isValid()) {
                $image_name = time() . '_' . $image->getClientOriginalName();
                // Move the uploaded file to the desired directory
                $image->move(public_path('barangayprorfile'), $image_name);
                // Store the filename in the session or database if needed
                $request->session()->put('image_filename', $image_name);
        
                // Assign the image name to the announcement
                $announcement->image = $image_name;
            } else {
                return response()->json(['error' => 'Invalid image file.'], 422);
            }
        }


    $announcement->save();

    // Return a response indicating success
    return response()->json(['message' => 'Project updated successfully.']);
}
public function update_info(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'mission' => 'required|string',
        'vission' => 'required|string',
        'history' => 'required|string', // Make logo validation optional
    ]);

    // Check if there's an existing record with ID 1
    $info = Info::find(1);

    if ($info) {
        // If a record with ID 1 exists, update it
        $info->mission = $validatedData['mission'];
        $info->vission = $validatedData['vission'];
        $info->history = $validatedData['history'];

        // Handle logo upload if a new logo file has been provided
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = 'logo.'.$logo->extension();
            $logo->move(public_path('uploads'), $logoName);
            $info->logo = $logoName;
        }

        $info->save();

        // Return a success response
        return response()->json(['message' => 'Info updated successfully'], 200);
    } else {
        // If a record with ID 1 does not exist, create a new one
        $info = new Info();
        $info->mission = $validatedData['mission'];
        $info->vission = $validatedData['vission'];
        $info->history = $validatedData['history'];

        // Handle logo upload if a new logo file has been provided
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = 'logo.'.$logo->extension();
            $logo->move(public_path('uploads'), $logoName);
            $info->logo = $logoName;
        }

        $info->save();

        // Return a success response
        return response()->json(['message' => 'Info added successfully'], 200);
    }
}

public function fetchInfo()
{
    $info = Info::find(1); // Assuming you want to fetch the info with ID 1

    return response()->json(['info' => $info]);
} 
}

    

