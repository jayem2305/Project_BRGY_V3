<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use Illuminate\Validation\ValidationException;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Info;
use App\Models\Member;
use App\Models\GoodMoral;
use App\Models\Lawincome;
use App\Models\Resident;
use App\Models\Events;
use App\Models\IndigencyRequest;
use App\Rules\AgeMatchesBirthday;
use App\Rules\UniqueNameCombinationaddmember;
use App\Rules\UniqueNameCombinationupdate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\BusinessPermit;
use App\Models\BusinessCessation;
use App\Models\CertificateRequest;
use App\Models\SoloparentRequest;
use App\Models\FTJRequest;
use App\Models\Official;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index(Request $request)
{
    // Retrieve user ID from request input or session
    $userId = $request->input('userId') ?: $request->session()->get('userId');

    Log::info('User ID retrieved:', ['userId' => $userId]);
    
    if (!$userId) {
        // Redirect the user to the specified URL
        return redirect('http://127.0.0.1:8000');
    }

    // Store user ID in session for future requests
    $request->session()->put('userId', $userId);

    // Retrieve user data using the provided user ID
    $user = Resident::where('reg_number', $userId)->first();

    if (!$user) {
        return redirect('http://127.0.0.1:8000');
    }else{
        return view('user.index');
    }

    // Return JSON or view based on request
    if ($request->expectsJson()) {
        return response()->json(['user' => $user]);
    } else {
        return view('user.index', ['user' => $user]);
    }
}


    public function event(Request $request)
    {
        $userId = $request->session()->get('userId');
        if (!$userId) {
            // Redirect the user to the specified URL
            return redirect('http://127.0.0.1:8000');
        }else{
            return view('user.events');
        }
    //return view('user.events');
    }
    public function forum(Request $request)
    {
        $userId = $request->session()->get('userId');
        if (!$userId) {
            // Redirect the user to the specified URL
            return redirect('http://127.0.0.1:8000');
        }else{
            return view('user.forum');
        }
        
    }
    public function aboutus(Request $request)
    {
        $userId = $request->session()->get('userId');
        if (!$userId) {
            // Redirect the user to the specified URL
            return redirect('http://127.0.0.1:8000');
        }else{
            return view('user.aboutus');
        }
    //return view('user.events');
    }
    public function profile(Request $request)
    {
        $userId = $request->session()->get('userId');
        if (!$userId) {
            // Redirect the user to the specified URL
            return redirect('http://127.0.0.1:8000');
        }else{
            return view('user.profile');
        }
        //return view('user.profile');
    }
    public function profile_user(Request $request)
    {
        // Retrieve user ID from the session
        $userId = $request->session()->get('userId');
    
        if (!$userId) {
            return response()->json(['error' => 'User ID not found in session'], 400);
        }
        Log::info('User ID retrieved:', ['userId' => $userId]);
        // Retrieve user data using the user ID
        $user = Resident::where('reg_number', $userId)->first();
    
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
    
        // Return user profile data
        return response()->json(['user' => $user]);
    }
    

    
    public function getImage()
    {
        $info = Info::first(); // Assuming you want to retrieve the first image
        if ($info && $info->logo) {
            // If the $info object exists and the logo property is not empty
            return response()->json(['logo' => $info->logo]);
        } else {
            // If no image is found
            return response()->json(['error' => 'No image found'], 404);
        }
    }
    public function getProjects()
{
    $projects = Events::where('Type_of_event', 'Project')
    ->where('status', 'Active')
    ->get();

    return response()->json(['projects' => $projects]);
}
public function getNewsAndEvents()
{
    // Assuming 'News' and 'Event' are differentiated by 'Type_of_event'
    $newsEvents = Events::whereIn('Type_of_event', ['Announcement', 'Event'])
                        ->where('status', 'Active')
                        ->get();

    return response()->json(['events' => $newsEvents]);
}

public function updateProfile(Request $request) {
    // Validation rules for the input data
    $rules = [
        'lname' => ['required','regex:/^[a-zA-Z\s ]+$/', new UniqueNameCombinationupdate],
        'fname' => ['required','regex:/^[a-zA-Z\s ]+$/', new UniqueNameCombinationupdate],
        'mname' => ['nullable','regex:/^[a-zA-Z\s ]+$/', new UniqueNameCombinationupdate],
        'ext' => ['nullable','regex:/^[a-zA-Z\s ]+$/', new UniqueNameCombinationupdate],
'address' => 'required|regex:/^[a-zA-Z0-9 .,()-]*$/',
'household' => 'required',
'Birth' => 'required',
'birthday' => 'required|date',
'age' => ['required', 'numeric', 'min:15', new AgeMatchesBirthday],
'cnum' => 'required|regex:/[0-9]{2}-[0-9]{3}-[0-9]{4}/',
'gender' => 'required|in:Male,Female',
'civil' => 'required|in:Single,Widowed,Married',
'citizenship' => 'required|regex:/^[a-zA-Z\s]+$/',
'occupation' => 'required|regex:/^[a-zA-Z\s]+$/',
'owner' => 'required|in:May-Ari,Nangungupahan,Nakatira sa may Ari,Nakikitira sa Nangungupahan,Informal Settler',
'ownername' => 'required|regex:/^[a-zA-Z\s .,]+$/',
'numberoffam' => 'required|integer|min:0',
'proofofowner' => $request->hasFile('proofofowner') ? 'required|image|mimes:png,jpg,jpeg|max:2048' : '',
    'image_filenme' => $request->hasFile('image_filenme') ? 'required|mimes:png,jpg,jpeg|max:50000' : '',

        // Add validation rules for other fields here
    ];

    // Validate the input data
    $validator = Validator::make($request->all(), $rules);

    // If validation fails, return error response
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 400);
    }

    // Get the registration number from the request
    $reg_number = $request->input('reg_number');

    // Find the user by registration number
    $user = Resident::where('reg_number', $reg_number)->first();

    if ($user) {
        // Update user data
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->mname = $request->input('mname');
        $user->ext = $request->input('ext');
        $user->address = $request->input('address');
        $user->household = $request->input('household');
        $user->Birth = $request->input('Birth');
        $user->birthday = $request->input('birthday');
        $user->age = $request->input('age');
        $user->cnum = $request->input('cnum');
        $user->gender = $request->input('gender');
        $user->civil = $request->input('civil');
        $user->citizenship = $request->input('citizenship');
        $user->occupation = $request->input('occupation');
        $user->owner_type = $request->input('owner');
        $user->owner_name = $request->input('ownername');
        $user->number_of_family = $request->input('numberoffam');
        // Update other fields similarly
        if ($request->hasFile('proofofowner')) {
            $proofofowner = $request->file('proofofowner');
            $proofofownerName = $proofofowner->getClientOriginalName();
            $proofofowner->move(public_path('residentprofile'), $proofofownerName);
            $user->proof_of_owner = $proofofownerName;
        }
    
        if ($request->hasFile('image_filenme')) {
            $image2x2 = $request->file('image_filenme');
            $image2x2Name = $image2x2->getClientOriginalName();
            $image2x2->move(public_path('residentprofile'), $image2x2Name);
            $user->image_filename = $image2x2Name;
        }
        $indicateIf = [];

        if ($request->has('employed') && $request->input('employed') !== null) {
            $indicateIf[] = $request->input('employed');
        }
        
        if ($request->has('unemployed') && $request->input('unemployed') !== null) {
            $indicateIf[] = $request->input('unemployed');
        }
        
        if ($request->has('PWD') && $request->input('PWD') !== null) {
            $indicateIf[] = $request->input('PWD');
        }
        
        if ($request->has('OFW') && $request->input('OFW') !== null) {
            $indicateIf[] = $request->input('OFW');
        }
        
        if ($request->has('soloparent') && $request->input('soloparent') !== null) {
            $indicateIf[] = $request->input('soloparent');
        }
        
        if ($request->has('OSY') && $request->input('OSY') !== null) {
            $indicateIf[] = $request->input('OSY');
        }
        
        if ($request->has('student') && $request->input('student') !== null) {
            $indicateIf[] = $request->input('student');
        }
        
        if ($request->has('OSC') && $request->input('OSC') !== null) {
            $indicateIf[] = $request->input('OSC');
        }
        
        if (empty($indicateIf)) {
            return response()->json(['error' => 'At least one checkbox must be checked'], 400);
        }
        
        // Convert the array of checkbox values into a string
        $indicateIfString = implode(',', $indicateIf);
        
        // Update the user model with the checkbox values
        $user->indicate_if = $indicateIfString;
        $user->save();
        
        return response()->json(['success' => 'User profile updated successfully']);
        
    } else {
        // Return error response if user not found
        return response()->json(['error' => 'User not found'], 404);
    }
}
public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'lname' => ['required', 'regex:/^[a-zA-Z\s]+$/', new UniqueNameCombinationupdate],
            'fname' => ['required', 'regex:/^[a-zA-Z\s]+$/', new UniqueNameCombinationupdate],
            'mname' => ['nullable', 'regex:/^[a-zA-Z\s]+$/', new UniqueNameCombinationupdate],
            'ext' => ['nullable', 'regex:/^[a-zA-Z\s]+$/', new UniqueNameCombinationupdate],
            'household' => 'required',
            'birthplace' => 'required',
            'birthday' => 'required|date',
            'age' => ['required', 'numeric', new AgeMatchesBirthday],
            'gender' => 'required|in:Male,Female',
            'civil_status' => 'required|in:Single,Married,Widowed',
            'citizenship' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'profile2x2' => 'required|mimes:png,jpg,jpeg|max:50000',
            'voters' => 'nullable|max:50000',
        ], [
            'lname.required' => 'The last name field is required.',
            'lname.regex' => 'The last name field must contain only letters and spaces.',
            'fname.required' => 'The first name field is required.',
            'fname.regex' => 'The first name field must contain only letters and spaces.',
            'mname.regex' => 'The middle name field must contain only letters and spaces.',
            'ext.regex' => 'The extension field must contain only letters and spaces.',
            'lname.unique_name_combinationupdate' => 'The combination of name fields already exists.',
            'fname.unique_name_combinationupdate' => 'The combination of name fields already exists.',
            'mname.unique_name_combinationupdate' => 'The combination of name fields already exists.',
            'ext.unique_name_combinationupdate' => 'The combination of name fields already exists.',
            'household.required' => 'The household field is required.',
            'Birth.required' => 'The place of birth field is required.',
            'birthday.required' => 'The birthday field is required.',
            'birthday.date' => 'The birthday must be a valid date.',
            'age.required' => 'The age field is required.',
            'age.numeric' => 'The age must be a number.',
            'gender.required' => 'The gender field is required.',
            'gender.in' => 'The gender field must be either Male or Female.',
            'civil_status.required' => 'The civil status field is required.',
            'civil_status.in' => 'The civil status field must be one of: Single, Married, Widowed.',
            'citizenship.required' => 'The citizenship field is required.',
            'citizenship.max' => 'The citizenship field must not exceed :max characters.',
            'occupation.required' => 'The occupation field is required.',
            'occupation.max' => 'The occupation field must not exceed :max characters.',
            'profile2x2.required' => 'The profile picture field is required.',
            'profile2x2.image' => 'The profile picture must be an image.',
            'profile2x2.mimes' => 'The profile picture must be a file of type: jpeg, png, jpg.',
            'profile2x2.max' => 'The profile picture may not be greater than :max kilobytes.',
        ]);
        
        $userId = $request->session()->get('userId');
        // Store the data in the database
        try {
        $member = new Member();
        $member->reg_num = $userId;
        $member->lname = $request->lname;
        $member->fname = $request->fname;
        $member->mname = $request->mname;
        $member->ext = $request->ext;
        $member->household = $request->household;
        $member->birthplace = $request->birthplace;
        $member->birthday = $request->birthday;
        $member->age = $request->age;
        $member->gender = $request->gender;
        $member->civil_status = $request->civil_status;
        $member->citizenship = $request->citizenship;
        $member->occupation = $request->occupation;
        $member->fill($request->except(['voters']));

        // Handle file upload
        if ($request->hasFile('profile2x2')) {
            $file = $request->file('profile2x2');
            $filename = time() . '_profile2x2.' . $file->getClientOriginalExtension();
            $file->move(public_path('residentprofile'), $filename);
            $member->profile2x2 = $filename;
        }

        // Handle voters file upload (optional)
        if ($request->hasFile('voters')) {
            $filevoters = $request->file('voters');
            $filename_voters = time() . '_voters.' . $filevoters->getClientOriginalExtension();
            $filevoters->move(public_path('uploads'), $filename_voters);
            $member->voters = $filename_voters;
        } else {
            $member->voters = null;  // or retain existing value if editing
        }
        $indicateIf = [];

        if ($request->has('employed') && $request->input('employed') !== null) {
            $indicateIf[] = $request->input('employed');
        }
        
        if ($request->has('unemployed') && $request->input('unemployed') !== null) {
            $indicateIf[] = $request->input('unemployed');
        }
        
        if ($request->has('PWD') && $request->input('PWD') !== null) {
            $indicateIf[] = $request->input('PWD');
        }
        
        if ($request->has('OFW') && $request->input('OFW') !== null) {
            $indicateIf[] = $request->input('OFW');
        }
        
        if ($request->has('soloparent') && $request->input('soloparent') !== null) {
            $indicateIf[] = $request->input('soloparent');
        }
        
        if ($request->has('OSY') && $request->input('OSY') !== null) {
            $indicateIf[] = $request->input('OSY');
        }
        
        if ($request->has('student') && $request->input('student') !== null) {
            $indicateIf[] = $request->input('student');
        }
        
        if ($request->has('OSC') && $request->input('OSC') !== null) {
            $indicateIf[] = $request->input('OSC');
        }
        
        if (empty($indicateIf)) {
            return response()->json(['error' => 'At least one checkbox must be checked'], 400);
        }
        
        // Convert the array of checkbox values into a string
        $indicateIfString = implode(',', $indicateIf);
        
        // Update the user model with the checkbox values
        $member->indicate_if = $indicateIfString;
        $member->save();

        return response()->json(['message' => 'Member added successfully'], 200);
     }catch (\Exception $e) {
        // Log the error for debugging
        Log::error($e);

        // Return error response
        return response()->json(['error' => 'Failed to add member. Please try again later.'], 500);
    }
    }
    public function displayMembers(Request $request)
    {
        $userId = $request->session()->get('userId');
        $members = Member::where('reg_num',$userId)->get(); // Assuming Member is your model for members

        return response()->json($members);
    }
    public function destroy($id)
{
    try {
        $member = Member::findOrFail($id);
        $member->delete();
        
        return response()->json(['success' => 'Member deleted successfully'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to delete member'], 500);
    }
}
public function edit($id)
{
    $member = Member::findOrFail($id);
    return $member;
}
public function update(Request $request) {
    // Validation rules for the input data
    $rules = [
        'lname' => ['required','regex:/^[a-zA-Z\s ]+$/', new UniqueNameCombinationaddmember],
        'fname' => ['required','regex:/^[a-zA-Z\s ]+$/', new UniqueNameCombinationaddmember],
        'mname' => ['nullable','regex:/^[a-zA-Z\s ]+$/', new UniqueNameCombinationaddmember],
        'ext' => ['nullable','regex:/^[a-zA-Z\s ]+$/', new UniqueNameCombinationaddmember],
        'household' => 'required',
        'Birth' => 'required',
        'birthday' => 'required|date',
        'age' => ['required', 'numeric', 'min:15', new AgeMatchesBirthday],
        'gender' => 'required|in:Male,Female',
        'civil_status' => 'required|in:Single,Widowed,Married',
        'citizenship' => 'required|regex:/^[a-zA-Z\s]+$/',
        'occupation' => 'required|regex:/^[a-zA-Z\s]+$/',
        'profile2x2' => $request->hasFile('profile2x2') ? 'required|mimes:png,jpg,jpeg|max:50000' : '',
        'voters' => $request->hasFile('voters') ? 'nullable|mimes:png,jpg,jpeg|max:50000' : '',
    ];

    // Validate the input data
    $validator = Validator::make($request->all(), $rules);

    // If validation fails, return error response
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 400);
    }

    // Get the registration number from the request
    $id = $request->input('id');

    // Find the user by registration number
    $user = Member::where('id', $id)->first();
    $userId = $request->session()->get('userId');
    if ($user) {
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->mname = $request->input('mname');
        $user->ext = $request->input('ext');
        $user->reg_num = $userId;
        $user->household = $request->input('household');
        $user->birthplace = $request->input('Birth');
        $user->birthday = $request->input('birthday');
        $user->age = $request->input('age');
        $user->gender = $request->input('gender');
        $user->civil_status = $request->input('civil_status');
        $user->citizenship = $request->input('citizenship');
        $user->occupation = $request->input('occupation');
        // Update user data
        $user->fill($request->except(['profile2x2', 'voters']));


        if ($request->hasFile('profile2x2')) {
            $image2x2 = $request->file('profile2x2');
            $image2x2Name = $image2x2->getClientOriginalName();
            $image2x2->move(public_path('residentprofile'), $image2x2Name);
            $user->profile2x2 = $image2x2Name;
        }
        if ($request->hasFile('voters')) {
            $voters = $request->file('voters');
            $votersName = $voters->getClientOriginalName();
            $voters->move(public_path('uploads'), $votersName);
            $user->voters = $votersName;
        }

        $indicateIf = [];

        if ($request->has('employed') && $request->input('employed') !== null) {
            $indicateIf[] = $request->input('employed');
        }
        
        if ($request->has('unemployed') && $request->input('unemployed') !== null) {
            $indicateIf[] = $request->input('unemployed');
        }
        
        if ($request->has('PWD') && $request->input('PWD') !== null) {
            $indicateIf[] = $request->input('PWD');
        }
        
        if ($request->has('OFW') && $request->input('OFW') !== null) {
            $indicateIf[] = $request->input('OFW');
        }
        
        if ($request->has('soloparent') && $request->input('soloparent') !== null) {
            $indicateIf[] = $request->input('soloparent');
        }
        
        if ($request->has('OSY') && $request->input('OSY') !== null) {
            $indicateIf[] = $request->input('OSY');
        }
        
        if ($request->has('student') && $request->input('student') !== null) {
            $indicateIf[] = $request->input('student');
        }
        
        if ($request->has('OSC') && $request->input('OSC') !== null) {
            $indicateIf[] = $request->input('OSC');
        }
        
        if (empty($indicateIf)) {
            return response()->json(['error' => 'At least one checkbox must be checked'], 400);
        }
        
        // Convert the array of checkbox values into a string
        $indicateIfString = implode(',', $indicateIf);
        
        // Update the user model with the checkbox values
        $user->indicate_if = $indicateIfString;
        $user->save();

        return response()->json(['success' => 'Member profile updated successfully']);
    } else {
        // Return error response if user not found
        return response()->json(['error' => 'User not found'], 404);
    }
}
public function certificate(Request $request)
{
    $userId = $request->session()->get('userId');
        if (!$userId) {
            // Redirect the user to the specified URL
            return redirect('http://127.0.0.1:8000');
        }else{
            return view('user.certificate');

        }
}

public function submitRequestindignecy(Request $request)
{
    $userId = $request->session()->get('userId');
    
    if (!$userId) {
        return response()->json(['error' => 'User ID not found in session'], 400);
    }
    Log::info('User ID retrieved:', ['userId' => $userId]);
    // Retrieve user data using the user ID
    $user = Resident::where('reg_number', $userId)->first();
    $email = $user->email;
    // Validate the incoming request data
    $validatedData = $request->validate([
        'voters' => 'required|in:Voters,Non-Voters',
        'name' => ['required', function ($attribute, $value, $fail) {
            if ($value === 'undefined' || $value === 'null') {
                $fail('Name for requester is Required');
            }
        }],
    
        'copy' => ['required', function ($attribute, $value, $fail) {
            if ($value > 5) {
                $fail('Requuesting a copy Mustbe limit to 5.');
            }
        }],
        'purpose' => ['required', function ($attribute, $value, $fail) {
        if ($value === 'null') {
            $fail('Invalid Purpose.');
        }
    }],
        'otherpurpose' => 'nullable|regex:/^[a-zA-Z\s\p{P}0-9]+$/u',
        'requirements' => 'required|mimes:pdf|max:50000'
    ], [
        'voters.required' => 'Voters field is required.',
        'voters.in' => 'Voters field must be Valid".',
        'name.required' => 'Name field is required.',
        'copy.required' => 'Copy field is required.',
        'copy.min' => 'Copy field must be at least 0.',
        'copy.max' => 'Copy field must not exceed 5.',
        'purpose.required' => 'Purpose field is required.',
        'otherpurpose' => ' Purpose field is required.',
        'otherpurpose.regex' => 'Other purpose field must contain only letters, spaces, special characters, and numbers.',
        'requirements.required' => 'Requirements field is required.',
        'requirements.mimes' => 'Requirements must be a PDF file.',
        'requirements.max' => 'Requirements file size must not exceed 50MB.'
    ]);
    // Save the data to the database
    $requestModel = new IndigencyRequest();
    $requestModel->email = $email;
    $requestModel->reg_num = $user->reg_number; // Assuming 'reg_number' is the correct field
    $requestModel->voters = $validatedData['voters'];
    $requestModel->name = $validatedData['name'];
    $requestModel->copy = $validatedData['copy'];
    $requestModel->purpose = $validatedData['purpose'];
    $requestModel->otherpurpose = $validatedData['otherpurpose'];
    if ($request->hasFile('requirements')) {
        $file = $request->file('requirements');
        $originalFilename = $file->getClientOriginalName(); // Get the original filename
        $filename = 'File_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('Files_Requirements'), $filename);
        $requestModel->requirements = $filename; // Store the generated filename
    } else {
        $requestModel->requirements = null; // Set to null if no file is uploaded
    }
    $requestModel->save();

    // Return a response
    return response()->json(['success' => 'Indigency request submitted successfully']);
}

public function getRelatedData(Request $request)
{
    $regNumber = $request->session()->get('userId');
    $resident = Resident::where('reg_number', $regNumber)->first();
    Log::info('Resident ID retrieved:', ['userId' => $resident]);

    // Assuming you have a relationship between Resident and Members
    // Assuming 'members' is the name of the relationship method
    $members = Member::where('reg_num', $regNumber)
                            ->where('Status', 'Resident')
                            ->get();
    Log::info('Members ID retrieved:', ['userId' => $members]);


    // Define an empty array to store full names
    $fullNames = [];

    // Add full name of resident
    $fullNames[] = [
    'name' =>  $resident->lname . ', ' . $resident->fname . ' ' . $resident->mname . ' ' . $resident->ext,
    'age' => $resident->age,
    'household' => $resident->household,
    'profile2x2' => $resident->image_filename
    ];

    // Add full names of members
    foreach ($members as $member) {
        $fullNames[] = [
            'name' => $member->lname . ', ' . $member->fname . ' ' . $member->mname . ' ' . $member->ext,
            'age' => $member->age,
            'profile2x2' => $member->profile2x2

    ];
    }

    Log::info('Retrieved Names:', ['names' => $fullNames]);

    return response()->json($fullNames);
}
public function submitBusinessPermit(Request $request)
{
    $userId = $request->session()->get('userId');
    
    if (!$userId) {
        return response()->json(['error' => 'User ID not found in session'], 400);
    }
    Log::info('User ID retrieved:', ['userId' => $userId]);
    // Retrieve user data using the user ID
    $user = Resident::where('reg_number', $userId)->first();
    $email = $user->email;
    // Validate the incoming request data
    $validator = $request->validate ([
        'voters' => 'required|in:Voters,Non-Voters',
        'name' => ['required', function ($attribute, $value, $fail) {
            if ($value === 'undefined' || $value === 'null') {
                $fail('Name for requester is Required');
            }
        }],
        'copy'=> ['required', function ($attribute, $value, $fail) {
            if ($value > 5) {
                $fail('Requuesting a copy Mustbe limit to 5.');
            }
        }],
        'bname' => 'required|regex:/^[a-zA-Z\s\p{P}0-9]+$/u',
        'baddress' => 'required|regex:/^[a-zA-Z\s\p{P}0-9]+$/u',
        'requirements_bpermit' => 'required|mimes:pdf|max:50000'
    ], [
        'voters.required' => 'Voters field is required.',
        'voters.in' => 'Voters field must be Valid".',
        'name.required' => 'Name field is required.',
        'copy.required' => 'Number of copies field is required.',
        'copy.min' => 'Number of copies field must be at least 0.',
        'copy.max' => 'Number of copies field must not exceed 5.',
        'bname.required' => 'Business Name field is required.',
        'bname.regex' => 'Business Name field is invalid.',
        'baddress.required' => 'Business Address field is required.',
        'baddress.regex' => 'Business Address field is invalid.',
        'requirements_bpermit.required' => 'Requirements field is required.',
        'requirements_bpermit.mimes' => 'Requirements must be a PDF file.',
        'requirements_bpermit.max' => 'Requirements file size must not exceed 50MB.'
    ]);

   

    $businessPermit = new BusinessPermit();
    $businessPermit->email = $user->email;
    $businessPermit->reg_num = $user->reg_number;
    $businessPermit->voters = $request->voters;
    $businessPermit->name = $request->name;
    $businessPermit->copy = $request->copy;
    $businessPermit->bname = $request->bname;
    $businessPermit->baddress = $request->baddress;
    if ($request->hasFile('requirements_bpermit')) {
        $file = $request->file('requirements_bpermit');
        $originalFilename = $file->getClientOriginalName(); // Get the original filename
        $filename = 'File_'. $file->getClientOriginalExtension();
        $file->move(public_path('Files_Requirements'), $originalFilename);
        $businessPermit->requirements = $originalFilename; // Store the original filename
    }
    $businessPermit->save();

    // Return a success response
    return response()->json(['success' => 'Business permit request submitted successfully']);
}
public function submitCessation(Request $request)
{
    $userId = $request->session()->get('userId');
    
    if (!$userId) {
        return response()->json(['error' => 'User ID not found in session'], 400);
    }
    Log::info('User ID retrieved:', ['userId' => $userId]);
    // Retrieve user data using the user ID
    $user = Resident::where('reg_number', $userId)->first();
    $email = $user->email; // Retrieve email directly from the user object

    $validator = $request->validate ([
        'voters' => 'required|in:Voters,Non-Voters',
        'name' => ['required', function ($attribute, $value, $fail) {
            if ($value === 'undefined' || $value === 'null') {
                $fail('Name for requester is Required');
            }
        }],
        'copy_cessation' => ['required', function ($attribute, $value, $fail) {
            if ($value > 5) {
                $fail('Requuesting a copy Mustbe limit to 5.');
            }
        }],
        'bname' => 'required|regex:/^[a-zA-Z\s\p{P}0-9]+$/u',
        'CEOname' => 'required|regex:/^[a-zA-Z\s\p{P}0-9]+$/u',
        'cbaddress' => 'required|regex:/^[a-zA-Z\s\p{P}0-9]+$/u',
        'requirements' => 'required|mimes:pdf|max:50000'
    ],[
        'voters.required' => 'Voters field is required.',
        'voters.in' => 'Voters field must be Valid".',
        'name.required' => 'Name field is required.',
        'copy_cessation.required' => 'Number of copies field is required.',
        'copy_cessation.min' => 'Number of copies field must be at least 0.',
        'copy_cessation.max' => 'Number of copies field must not exceed 5.',
        'bname.required' => 'Business Name field is required.',
        'CEOname.required' => 'CEO name field is required.',
        'CEOname.regex' => 'CEO name field is Invalid.',
        'bname.regex' => 'Business Name field is invalid.',
        'baddress.required' => 'Business Address field is required.',
        'baddress.regex' => 'Business Address field is invalid.',
        'requirements_bpermit.required' => 'Requirements field is required.',
        'requirements_bpermit.mimes' => 'Requirements must be a PDF file.',
        'requirements_bpermit.max' => 'Requirements file size must not exceed 50MB.'
    ]);
    
    $businessCessation = new BusinessCessation();
    $businessCessation->email = $email;
    $businessCessation->reg_num = $userId; // Using the retrieved user ID
    $businessCessation->voters = $request->voters;
    $businessCessation->name = $request->name;
    $businessCessation->copy = $request->copy_cessation;
    $businessCessation->bname = $request->bname;
    $businessCessation->CEO = $request->CEOname;
    $businessCessation->baddress = $request->cbaddress;

    if ($request->hasFile('requirements')) {
        $file = $request->file('requirements');
        $originalFilename = $file->getClientOriginalName();
        $filename = 'File_'.$originalFilename. $file->getClientOriginalExtension();
        $file->move(public_path('Files_Requirements'), $originalFilename);
        $businessCessation->requirements = $originalFilename;
    }

    $businessCessation->save();

    return response()->json(['success' => 'Business cessation request submitted successfully']);
}

public function submitRequestcertificate(Request $request)
{
    $userId = $request->session()->get('userId');
    
    if (!$userId) {
        return response()->json(['error' => 'User ID not found in session'], 400);
    }
    Log::info('User ID retrieved:', ['userId' => $userId]);
    // Retrieve user data using the user ID
    $user = Resident::where('reg_number', $userId)->first();
    $email = $user->email;
    // Validate the incoming request data
    $validatedData = $request->validate([
        'voters' => 'required|in:Voters,Non-Voters',
        'name' => ['required', function ($attribute, $value, $fail) {
            if ($value === 'undefined' || $value === 'null') {
                $fail('Name for requester is Required');
            }
        }],
    
        'copy' => ['required', function ($attribute, $value, $fail) {
            if ($value > 5) {
                $fail('Requuesting a copy Mustbe limit to 5.');
            }
        }],
        'purpose' => ['required', function ($attribute, $value, $fail) {
            if ($value === 'null') {
                $fail('Invalid Purpose.');
            }
    }],
        'otherpurpose' => 'nullable|regex:/^[a-zA-Z\s\p{P}0-9]+$/u',
        'requirements' => 'required|mimes:pdf|max:50000'
    ], [
        'voters.required' => 'Voters field is required.',
        'voters.in' => 'Voters field must be Valid".',
        'name.required' => 'Name field is required.',
        'name.invalid' => 'Name field is invalid.',
        'copy.required' => 'Copy field is required.',
        'copy.min' => 'Copy field must be at least 0.',
        'copy.max' => 'Copy field must not exceed 5.',
        'purpose.required' => 'Purpose field is required.',
        'otherpurpose' => ' Purpose field is required.',
        'otherpurpose.regex' => 'Other purpose field must contain only letters, spaces, special characters, and numbers.',
        'requirements.required' => 'Requirements field is required.',
        'requirements.mimes' => 'Requirements must be a PDF file.',
        'requirements.max' => 'Requirements file size must not exceed 50MB.'
    ]);

    // Save the data to the database
    $requestModel = new CertificateRequest();
    $requestModel->email = $email;
    $requestModel->reg_num = $user->reg_number; // Assuming 'reg_number' is the correct field
    $requestModel->voters = $validatedData['voters'];
    $requestModel->name = $validatedData['name'];
    $requestModel->copy = $validatedData['copy'];
    $requestModel->purpose = $validatedData['purpose'];
    $requestModel->otherpurpose = $validatedData['otherpurpose'];
    if ($request->hasFile('requirements')) {
        $file = $request->file('requirements');
        $originalFilename = $file->getClientOriginalName(); // Get the original filename
        $filename = 'File_'. $file->getClientOriginalExtension();
        $file->move(public_path('Files_Requirements'), $originalFilename);
        $requestModel->requirements = $originalFilename; // Store the original filename
    }
    $requestModel->save();

    // Return a response
    return response()->json(['success' => 'Certificate request submitted successfully']);
}

public function submitRequestsoloparent(Request $request)
{
    $userId = $request->session()->get('userId');
    
    if (!$userId) {
        return response()->json(['error' => 'User ID not found in session'], 400);
    }
    Log::info('User ID retrieved:', ['userId' => $userId]);
    // Retrieve user data using the user ID
    $user = Resident::where('reg_number', $userId)->first();
    $email = $user->email;
    // Validate the incoming request data
    $validatedData = $request->validate([
        'voters' => 'required|in:Voters,Non-Voters',
        'name' => ['required', function ($attribute, $value, $fail) {
            if ($value === 'undefined' || $value === 'null') {
                $fail('Name for requester is Required');
            }
        }],
        'copy' => ['required', function ($attribute, $value, $fail) {
            if ($value > 5) {
                $fail('Requuesting a copy Mustbe limit to 5.');
            }
        }],
        'requirements' => 'required|mimes:pdf|max:50000',
        'selectedChildren' => ['required', function ($attribute, $value, $fail) {
            $children = json_decode($value, true);
            if (json_last_error() !== JSON_ERROR_NONE || !is_array($children) || empty($children)) {
                $fail('Select the name of your Child/Children');
            }
        }]
    ], [
        'voters.required' => 'Voters field is required.',
        'voters.in' => 'Voters field must be Valid".',
        'name.required' => 'Name field is required.',
        'name.invalid' => 'Name field is invalid.',
        'copy.required' => 'Copy field is required.',
        'copy.min' => 'Copy field must be at least 0.',
        'copy.max' => 'Copy field must not exceed 5.',
        'requirements.required' => 'Requirements field is required.',
        'requirements.mimes' => 'Requirements must be a PDF file.',
        'requirements.max' => 'Requirements file size must not exceed 50MB.'
    ]);
    // Save the data to the database
    $requestModel = new SoloparentRequest();
    $requestModel->email = $email;
    $requestModel->reg_num = $user->reg_number; // Assuming 'reg_number' is the correct field
    $requestModel->voters = $validatedData['voters'];
    $requestModel->name = $validatedData['name'];
    $requestModel->copy = $validatedData['copy'];
    if ($request->hasFile('requirements')) {
        $file = $request->file('requirements');
        $originalFilename = $file->getClientOriginalName(); // Get the original filename
        $filename = 'File_'. $file->getClientOriginalExtension();
        $file->move(public_path('Files_Requirements'), $originalFilename);
        $requestModel->requirements = $originalFilename; // Store the original filename
    }
    $selectedChildren = json_decode($request->input('selectedChildren'), true);
    Log::info('Selected Children Data:', $selectedChildren);
    $requestModel->children = json_encode($selectedChildren);
    $requestModel->save();


    // Return a response
    return response()->json(['success' => 'Certificate request submitted successfully']);
}

public function submitRequestftj(Request $request)
{
    $userId = $request->session()->get('userId');
    
    if (!$userId) {
        return response()->json(['error' => 'User ID not found in session'], 400);
    }
    Log::info('User ID retrieved:', ['userId' => $userId]);
    // Retrieve user data using the user ID
    $user = Resident::where('reg_number', $userId)->first();
    $email = $user->email;
    // Validate the incoming request data
    $validatedData = $request->validate([
        'voters' => 'required|in:Voters,Non-Voters',
        'name' => ['required', function ($attribute, $value, $fail) {
            if ($value === 'undefined' || $value === 'null') {
                $fail('Name for requester is Required');
            }
        }],
        'copy' => ['required', function ($attribute, $value, $fail) {
            if ($value > 5) {
                $fail('Requuesting a copy Mustbe limit to 5.');
            }
        }],
        'requirements' => 'required|mimes:pdf|max:50000',
        'type' => 'required|in:First Time Job seeker (Minor),First Time Job Seeker Oath Taking,First Time Job Seeker',
        'pname' => 'nullable|regex:/^[a-zA-Z\s\p{P}0-9]+$/u',
        'paddress' => 'nullable|regex:/^[a-zA-Z\s\p{P}0-9]+$/u',
        'page' => 'nullable',
        'fileInputparent' => 'nullable|max:50000',
        'number_day' => ['required', function ($attribute, $value, $fail) {
            if ($value === '0 null' ||stripos($value, 'null') !== false ||stripos($value, '0') !== false) {
                $fail('Number of years Resided in the Barangay is Required');
            }
        }],
        

    ], [
        'voters.required' => 'Voters field is required.',
        'voters.in' => 'Voters field must be Valid".',
        'name.required' => 'Name field is required.',
        'type.in' => 'Type of First Time job Seeker is Required".',
        'number_day.required' => 'Number of Days field is required.',
        'name.invalid' => 'Name field is invalid.',
        'copy.required' => 'Copy field is required.',
        'copy.min' => 'Copy field must be at least 0.',
        'copy.max' => 'Copy field must not exceed 5.',
        'requirements.required' => 'Requirements field is required.',
        'requirements.mimes' => 'Requirements must be a PDF file.',
        'requirements.max' => 'Requirements file size must not exceed 50MB.',
        'pname.regex' => 'Parent Name field is invalid.',
        'paddress.regex' => 'Parent Address is Invalid.',
        'fileInputparent.max' => 'Parents Requirements file size must not exceed 50MB.',
        'fileInputparent.mimes' => 'Parent Requirements must be a PDF file.',
    ]);
    // Save the data to the database
    $requestModel = new FTJRequest();
    $requestModel->email = $email;
    $requestModel->reg_num = $user->reg_number; // Assuming 'reg_number' is the correct field
    $requestModel->voters = $validatedData['voters'];
    $requestModel->name = $validatedData['name'];
    $requestModel->copy = $validatedData['copy'];
    if ($request->hasFile('requirements')) {
        $file = $request->file('requirements');
        $originalFilename = $file->getClientOriginalName(); // Get the original filename
        $filename = 'File_'. $file->getClientOriginalExtension();
        $file->move(public_path('Files_Requirements'), $originalFilename);
        $requestModel->requirements = $originalFilename; // Store the original filename
    }
    if ($request->hasFile('fileInputparent')) {
        $file = $request->file('fileInputparent');
        $originalFilename = $file->getClientOriginalName(); // Get the original filename
        $filename = 'Parent_File_'. $file->getClientOriginalExtension();
        $file->move(public_path('Files_Requirements'), $originalFilename);
        $requestModel->parentrequirements = $originalFilename; // Store the original filename
    }
    $requestModel->type = $validatedData['type'];
    $requestModel->pname = $validatedData['pname'];
    $requestModel->paddress = $validatedData['paddress'];
    $requestModel->page = $validatedData['page'];
    $requestModel->number_day = $validatedData['number_day'];
    $requestModel->save();


    // Return a response
    return response()->json(['success' => 'First-Time Job Seeker request submitted successfully']);
}
public function submitRequestgoodmoral(Request $request)
{
    // Retrieve the user ID from the session
    $userId = $request->session()->get('userId');

    // Check if the user ID is found in the session
    if (!$userId) {
        return response()->json(['error' => 'User ID not found in session'], 400);
    }
    
    Log::info('User ID retrieved:', ['userId' => $userId]);

    // Retrieve user data using the user ID
    $user = Resident::where('reg_number', $userId)->first();

    // Ensure user exists
    if (!$user) {
        return response()->json(['error' => 'User not found.'], 404);
    }

    // Check if the user is at least 18 years old
    Log::info('User age:', ['age' => $user->age]);
    if ($user->age <= 18) {
        return response()->json(['message' => 'The Selected Person is Under 18 Below'], 400);
    }
    
    // Validate the incoming request data
    $validatedData = $request->validate([
        'voters' => 'required|in:Voters,Non-Voters',
        'name' => ['required', function ($attribute, $value, $fail) {
            if ($value === 'undefined' || $value === 'null') {
                $fail('Name for requester is required.');
            }
        }],
        'copy' => 'required|integer|min:1|max:5', // Validate that copy is an integer between 1 and 5
        'purpose' => ['required', function ($attribute, $value, $fail) {
            if ($value === 'null') {
                $fail('Invalid purpose.');
            }
        }],
        'requirements' => 'required|mimes:pdf|max:5000' // Ensure file is a PDF and does not exceed 5MB
    ], [
        'voters.required' => 'Voters field is required.',
        'voters.in' => 'Voters field must be valid.',
        'name.required' => 'Name field is required.',
        'copy.required' => 'Copy field is required.',
        'copy.integer' => 'Copy field must be an integer.',
        'copy.min' => 'Copy field must be at least 1.',
        'copy.max' => 'Copy field must not exceed 5.',
        'purpose.required' => 'Purpose field is required.',
        'requirements.required' => 'Requirements field is required.',
        'requirements.mimes' => 'Requirements must be a PDF file.',
        'requirements.max' => 'Requirements file size must not exceed 5MB.'
    ]);

    // Save the data to the database
    $requestModel = new GoodMoral();
    $requestModel->email = $user->email;
    $requestModel->reg_num = $user->reg_number; // Assuming 'reg_number' is the correct field
    $requestModel->voters = $validatedData['voters'];
    $requestModel->name = $validatedData['name'];
    $requestModel->copy = $validatedData['copy'];
    $requestModel->purpose = $validatedData['purpose'];

    // Handle file upload
    if ($request->hasFile('requirements')) {
        $file = $request->file('requirements');
        $originalFilename = $file->getClientOriginalName(); // Get the original filename
        $file->move(public_path('Files_Requirements'), $originalFilename);
        $requestModel->requirements = $originalFilename; // Store the original filename
    }

    // Save the request model
    $requestModel->save();

    // Return a success response
    return response()->json(['success' => 'Good Moral request submitted successfully']);
}

public function submitRequestlawincome(Request $request)
{
    // Retrieve the user ID from the session
    $userId = $request->session()->get('userId');

    // Check if the user ID is found in the session
    if (!$userId) {
        return response()->json(['error' => 'User ID not found in session'], 400);
    }
    
    Log::info('User ID retrieved:', ['userId' => $userId]);

    // Retrieve user data using the user ID
    $user = Resident::where('reg_number', $userId)->first();

    // Ensure user exists
    if (!$user) {
        return response()->json(['error' => 'User not found.'], 404);
    }

    // Check if the user is at least 18 years old
    Log::info('User age:', ['age' => $user->age]);
    if ($user->age <= 18) {
        return response()->json(['message' => 'The Selected Person is Under 18 Below'], 400);
    }
    
    // Validate the incoming request data
    $validatedData = $request->validate([
        'voters' => 'required|in:Voters,Non-Voters',
        'name' => ['required', function ($attribute, $value, $fail) {
            if ($value === 'undefined' || $value === 'null') {
                $fail('Name for requester is required.');
            }
        }],
        'copy' => 'required|integer|min:1|max:5', // Validate that copy is an integer between 1 and 5
        'purpose' => ['required', function ($attribute, $value, $fail) {
            if ($value === 'null') {
                $fail('Invalid purpose.');
            }
        }],
        'requirements' => 'required|mimes:pdf|max:5000' // Ensure file is a PDF and does not exceed 5MB
    ], [
        'voters.required' => 'Voters field is required.',
        'voters.in' => 'Voters field must be valid.',
        'name.required' => 'Name field is required.',
        'copy.required' => 'Copy field is required.',
        'copy.integer' => 'Copy field must be an integer.',
        'copy.min' => 'Copy field must be at least 1.',
        'copy.max' => 'Copy field must not exceed 5.',
        'purpose.required' => 'Purpose field is required.',
        'requirements.required' => 'Requirements field is required.',
        'requirements.mimes' => 'Requirements must be a PDF file.',
        'requirements.max' => 'Requirements file size must not exceed 5MB.'
    ]);

    // Save the data to the database
    $requestModel = new Lawincome();
    $requestModel->email = $user->email;
    $requestModel->reg_num = $user->reg_number; // Assuming 'reg_number' is the correct field
    $requestModel->voters = $validatedData['voters'];
    $requestModel->name = $validatedData['name'];
    $requestModel->copy = $validatedData['copy'];
    $requestModel->purpose = $validatedData['purpose'];

    // Handle file upload
    if ($request->hasFile('requirements')) {
        $file = $request->file('requirements');
        $originalFilename = $file->getClientOriginalName(); // Get the original filename
        $file->move(public_path('Files_Requirements'), $originalFilename);
        $requestModel->requirements = $originalFilename; // Store the original filename
    }

    // Save the request model
    $requestModel->save();

    // Return a success response
    return response()->json(['success' => 'Good Moral request submitted successfully']);
}
public function getData(Request $request)
{
    $userId = $request->session()->get('userId');
        
    if (!$userId) {
        return response()->json(['error' => 'User ID not found in session'], 400);
    }
    Log::info('User ID retrieved:', ['userId' => $userId]);
    
    // Retrieve user data using the user ID
    $user = Resident::where('reg_number', $userId)->first();
    Log::info('User data retrieved:', ['user' => $user]);


    $data['indigency_requests'] = IndigencyRequest::where('reg_num', $user->reg_number)->get();
    $data['certificate'] = CertificateRequest::where('reg_num', $user->reg_number)->get();
    $data['business_permit'] = BusinessPermit::where('reg_num', $user->reg_number)->get();
    $data['business_cessation'] = BusinessCessation::where('reg_num', $user->reg_number)->get();
    $data['first_time_job_seeker'] = FTJRequest::where('reg_num', $user->reg_number)->get();
    $data['solo_parent'] = SoloparentRequest::where('reg_num', $user->reg_number)->get();
    $data['goodmoral'] = GoodMoral::where('reg_num', $user->reg_number)->get();
    Log::info('User ID retrieved data:', ['user' => $data]);
    
    return response()->json($data);
}
public function cancelRequest(Request $request)
    {
        $id = $request->input('id');
        $type = $request->input('type');
        Log::info('Certificate ID retrieved data:', ['ID' => $id]);
        // Find the request by 
        if($type == "Barangay Indigency"){
            $request = IndigencyRequest::find($id);
        }else if($type == "Business Permit"){
            $request = BusinessPermit::find($id);
        }else if($type == "Business Cessation"){
            $request = BusinessCessation::find($id);
        }else if($type == "First Time Job Seeker Oath Taking" || $type == "First Time Job seeker (Minor)" || $type == "First Time Job Seeker"){
            $request = FTJRequest::find($id);
        }else if($type == "Solo Parents"){
            $request = SoloparentRequest::find($id);
        }else if($type == "Barangay Certificate"){
            $request = CertificateRequest::find($id);
        }else if($type == "CERTIFICATE OF GOOD MORAL CHARACTER"){
            $request = Goodmoral::find($id);
        }
       

        if (!$request) {
            return response()->json(['error' => 'Request not found'], 404);
        }

        // Update the status to "Cancelled"
        $request->status = 'Cancelled';
        $request->save();

        return response()->json(['message' => 'Request cancelled successfully']);
    }
    public function forumpost(Request $request)
    {
        $userId = $request->session()->get('userId');
        try {
            $request->validate([
                'topic' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s\W]+$/',
                'description' => 'nullable|string|regex:/^[a-zA-Z0-9\s\W]+$/',
                'name' => ['required', function ($attribute, $value, $fail) {
                    if ($value === 'undefined' || $value === 'null') {
                        $fail('Name for requester is Required');
                    }
                }],
            ], [
                'topic.required' => 'The topic field is required.',
                'topic.string' => 'The topic must be a string.',
                'topic.max' => 'The topic must not exceed 255 characters.',
                'topic.regex' => 'The topic may only contain letters, numbers, spaces, and special characters.',
                'topic.unique' => 'The topic has already been taken.',
                'description.string' => 'The description must be a string.',
                'description.regex' => 'The description may only contain letters, numbers, spaces, and special characters.',
                'name.required' => 'The name field is required.',
                'name.string' => 'The name must be a string.',
                'name.regex' => 'The name may only contain letters, numbers, spaces, and special characters.',
            ]);
            
            $forum = new Forum();
            $forum->name = $request->name;
            $forum->topic = $request->topic;
            $forum->description = $request->description;
            $forum->reg_num = $userId;
            $forum->save();
            
            return response()->json(['message' => 'Forum created successfully']);
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            $topicError = $errors->first('topic');
            
            if ($topicError === 'The topic has already been taken.') {
                // Topic is already taken
                return response()->json(['message' => $topicError], 422); // 422 Unprocessable Entity status code
            } else {
                // Other validation errors
                return response()->json(['message' => 'Validation failed', 'errors' => $errors], 422);
            }
        }
    }
    public function getForumData(Request $request)
    {
        $adminID = "REG_000000_00";
        $userId = $request->session()->get('userId');
        
        if ($request->has('userId') && $adminID === "REG_000000_00") {
            // Fetch forum details based on ID
            $forum = Forum::where('reg_num', $userId)->find($request->id);
            return response()->json($forum);
        } else {
            // Fetch all forum data for the specified user and admin
            $forums = Forum::where(function ($query) use ($userId, $adminID) {
                $query->where('reg_num', $userId)
                      ->orWhere('reg_num', $adminID);
            })->get();
            return response()->json(['forums' => $forums]);
        }
    }
    public function storecomment(Request $request)
{
    $userId = $request->session()->get('userId');
    // Validate the request data
    $validatedData = $request->validate([
        'comment' => 'required|string',
        'adminname' => ['required', function ($attribute, $value, $fail) {
            if ($value === 'undefined' || $value === 'null') {
                $fail('Name for requester is Required');
            }
        }],
        'profile' => 'required|string',
        'id_form' => 'required|exists:forums,id', // Assuming the foreign key is 'id_form' referencing the 'id' column of the 'forms' table
    ]);

    // Create a new comment
    $comment = new Comment();
    $comment->comment = $validatedData['comment'];
    $comment->name = $validatedData['adminname'];
    $comment->id_form = $validatedData['id_form']; 
    $comment->profile = $validatedData['profile']; 
    // Add any other necessary fields

    // Save the comment
    $comment->save();
    
    // Optionally, return a success response
    return response()->json(['message' => 'Comment posted successfully'], 200);
}
public function getInfos()
{
    $infos = Info::first(); // Assuming you want to fetch the first record
    return response()->json($infos);
}
public function getActiveOfficials()
    {
        $activeOfficials = Official::where('status', 'active')->get();
        return response()->json($activeOfficials);
    } 
    public function logout(Request $request)
{
    $userId = $request->session()->get('userId');

    Auth::logout(); // This will log the user out

    $request->session()->flush(); // Destroy the session

    $request->session()->regenerateToken(); // Regenerate the CSRF token

    return response()->json(['message' => 'Logged out successfully', 'userId' => $userId]);
}
 
}

?>