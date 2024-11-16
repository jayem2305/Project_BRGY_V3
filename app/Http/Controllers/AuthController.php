<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use App\Rules\AgeMatchesBirthday;
use App\Rules\agematchesbirthdaymember;
use App\Rules\CheckAtLeastOneCheckbox;
use App\Rules\UniqueNameCombination;
use Illuminate\Support\Facades\Log;
use App\Models\Resident;
use App\Models\Member;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountApprovalNotification;
use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;
use App\Rules\UniqueEmailWithStatus;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    public function index()
    {
        return view('welcome');
        //return "Hello, this is the welcome page!";
    }

public function login(){
    return view("auth.login");
}
public function onlineservices(){
    return view("auth.onlineservices");
}
public function aboutus(){
    return view("auth.aboutus");
}
public function loginPost(Request $request)
{
    $request->validate([
       'email' => 'required|email',
    'password' => 'required',
], [
    'email.required' => 'Email address is required.',
    'email.email' => 'Please enter a valid email address.',
    'password.required' => 'Password is required.',
]);

    // Retrieve the resident by email
    $resident = Resident::where('email', $request->email)->first();

    // Check if resident exists
    if (!$resident) {
        return response()->json(['error' => 'User not found'], 422);
    }

    // Check if the provided password matches the stored password
    if ($request->password === $resident->password) {
        $status = $resident->status;
        $residentId = $resident->reg_number;

        if ($status == "pending") {
            return response()->json(['error' => 'Your Account is still in process'], 422);
        } elseif ($status == "Resident") {
            // Log the resident in
            Auth::login($resident);
            
            // Set the userId in the session
            $request->session()->put('userId', $residentId);

            // Redirect to the user index page
            return response()->json(['redirect' => route('user.index', ['userId' => $residentId])]);
        } elseif ($status == "Admin") {
            // Log the user in as admin
            Auth::login($resident);

            // Redirect to the admin dashboard
            return response()->json(['success' => 'Login successful', 'redirect' => route('admin.statisticalreport')]);
        } else {
            return response()->json(['error' => 'User not found'], 422);
        }
    } else {
        // If passwords do not match, return error
        return response()->json(['error' => 'Password incorrect'], 422);
    }
}



function register(){
    return view("auth.register");
}

function registerPost(Request $request){
    return view('auth.register');
    }
    // Method to send OTP
    public function sendOTP(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Check if email exists and is active
        $validatedEmail = Resident::where('email', $request->email)
        ->whereIn('status', ['Resident', 'Pending'])->exists();

        // If email exists and is active, return an error message
        if ($validatedEmail) {
            return response()->json(['error' => 'Email is already taken'], 400); // 400 for bad request
        }

        // Generate a random 6-digit OTP
        $otp = rand(100000, 999999);

        // Store OTP in session with a 5-minute expiration time
        Session::put('otp', $otp);
        Session::put('otp_expires', now()->addMinutes(5));

        // Send OTP to email
        Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
            $message->to($request->input('email'))
                    ->subject('Your OTP Code');
        });

        return response()->json(['status' => 'OTP sent successfully']);
    }


    // Method to verify OTP
 // Method to verify OTP
public function verifyOTP(Request $request)
{
    $request->validate(['otp' => 'required|numeric']);

    $storedOtp = Session::get('otp');
    $otpExpires = Session::get('otp_expires');

    // Check if OTP matches and is still valid
    if ($storedOtp && now()->lessThanOrEqualTo($otpExpires) && $request->input('otp') == $storedOtp) {
        // Clear OTP after verification
        Session::forget(['otp', 'otp_expires']);
        
        // Set email verification status in session
        Session::put('email_verified', true);

        return response()->json(['status' => 'OTP verified successfully']);
    }

    return response()->json(['error' => 'Invalid or expired OTP'], 400);
}

   
    function step1(Request $request){
  // Define validation rules
  //dump($request->input('options'));
 


  $rules = [
    'lname' => ['required','regex:/^[a-zA-Z\s ]+$/', new UniqueNameCombination],
    'fname' => ['required','regex:/^[a-zA-Z\s ]+$/', new UniqueNameCombination],
    'mname' => ['required','regex:/^[a-zA-Z\s ]+$/', new UniqueNameCombination],
    'ext' => ['required','regex:/^[a-zA-Z\s ]+$/', new UniqueNameCombination],
    'house' => 'required|regex:/^[a-zA-Z0-9 .,()-]*$/',
    'street' => 'required|regex:/^[a-zA-Z0-9 .,()-]*$/',
    'brgy' => 'required|regex:/^[a-zA-Z0-9 .,()-]*$/',
    'city' => 'required|regex:/^[a-zA-Z0-9 .,()-]*$/',
    'household' => 'required',
    'Birth' => 'required',
    'birthday' => 'required|date',
    'age' => ['required', 'numeric', 'min:18', new AgeMatchesBirthday],
    'cnum' => 'required|regex:/[0-9]{2}-[0-9]{3}-[0-9]{4}/',
    'gender' => 'required|in:Male,Female',
    'civil' => 'required|in:Single,Widowed,Married',
    'citizenship' => 'required|regex:/^[a-zA-Z\s ]+$/',
    'occupation' => 'required|regex:/^[a-zA-Z\s ]+$/',
    'email' => ['required', 'email', new UniqueEmailWithStatus],
    'password' => 'required|min:8|regex:/^(?=.*[a-zA-Z0-9 ])(?=.*\d)(?=.*[$@$!%*?&_])[A-Za-z\d$@$!%*?&_]+$/',


];

$messages = [
    'email.unique' => 'The email has already been taken.',
    'lname.required' => 'The last name field is required.',
    'lname.regex' => 'The last name field should contain only letters and spaces.',

    'fname.required' => 'The first name field is required.',
    'mname.required' => 'Type "NA" if not applicable',
    'ext.required' => 'Type "NA" if not applicable',
    'fname.regex' => 'The first name field should contain only letters and spaces.',

    'mname.regex' => 'The middle name field should contain only letters and spaces.',

    'ext.regex' => 'The extension field should contain only letters, spaces, dots, and commas.',

    'house.required' => 'The House Number field is required.',
    'house.regex' => 'The House Number field should contain only alphanumeric characters, spaces, dots, commas, hyphens, and parentheses.',
    'street.required' => 'The Streets field is required.',
    'street.regex' => 'The Street field should contain only alphanumeric characters, spaces, dots, commas, hyphens, and parentheses.',
    'brgy.required' => 'The Barangay field is required.',
    'brgy.regex' => 'The Barangay field should contain only alphanumeric characters, spaces, dots, commas, hyphens, and parentheses.',
    'city.required' => 'The City field is required.',
    'city.regex' => 'The City field should contain only alphanumeric characters, spaces, dots, commas, hyphens, and parentheses.',
    'otp.required' => 'Verification of Email is required.',
    'otp.in' => 'Email is not Verified.',
    'household.required' => 'The household field is required.',

    'Birth.required' => 'The birth date field is required.',

    'birthday.required' => 'The birthday field is required.',
    'birthday.date' => 'The birthday must be a valid date.',

    'age.required' => 'The age field is required.',
    'age.numeric' => 'The age must be a number.',
    'age.min' => 'The age must be above :min.',

    'cnum.required' => 'The contact number field is required.',
    'cnum.regex' => 'The contact number must be in the format XX-XXX-XXXX.',

    'gender.required' => 'The gender field is required.',
    'gender.in' => 'The gender must be either Male or Female.',

    'civil.required' => 'The civil status field is required.',
    'civil.in' => 'The civil status must be Single, Widowed, or Married.',

    'citizenship.required' => 'The citizenship field is required.',
    'citizenship.regex' => 'The citizenship field should contain only letters and spaces.',

    'occupation.required' => 'The occupation field is required.',
    'occupation.regex' => 'The occupation field should contain only letters and spaces.',

    'email.required' => 'The email field is required.',
    'email.email' => 'The email must be a valid email address.',

    'password.required' => 'The password field is required.',
    'password.min' => 'The password must be at least :min characters long.',
    'password.regex' => 'The password must contain at least one letter, one number, and one special character.',
];
$validator = Validator::make($request->all(), $rules,$messages);
if ($validator->fails()) {
    return response()->json(['errors' => $validator->errors()], 422);
}
// Validation passed, proceed with your logic
$data = $request->all();

$data_step1 = $validator->validated();
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

$checkedCheckboxes = array_filter($data_step1);
    $request->session()->put('step1', $checkedCheckboxes);

    
// Remove 'proofofowner' from the data since we've stored the file name separately
$request->session()->put('step1', $data_step1);

if (Session::get('email_verified') == false) {
    return response()->json([
        'error' => 'Email not verified. Please verify your email first.',
        'session_email_verified' => Session::get('email_verified')
    ], 403);
}
// Further processing, if needed
return response()->json(['status' => 'success']);
    }
 
 

public function step2(Request $request)
{
    // Define base validation rules with custom error messages
    $baseRules = [
        'owner' => 'required|in:May-Ari,Nangungupahan,Nakatira sa may Ari,Nakikitira sa Nangungupahan,Informal Settler',
        'ownername' => 'required|regex:/^[a-zA-Z\s .,]+$/',
        'numberoffam' => 'required|integer|min:0',
        'living' => 'required|integer|min:1',
        'Num_days' => 'required|in:Days,Months,Years',
        's_1' => 'nullable|in:2',
        's_2' => 'nullable|in:9',
        's_3' => 'nullable|in:8,9',
        's_4' => 'nullable|in:0,1,8,9',
        's_5' => 'nullable|in:A,B,C',
        'voterscert' => 'nullable|mimes:png,jpg,jpeg,pdf|max:5120',
    ];

    // Custom error messages
    $customMessages = [
        'owner.required' => 'Please select an owner type.',
        'Num_days.required' => 'Please select a Day type.',
        'owner.in' => 'Invalid owner type selected.',
        's_1.in' => 'Invalid Prescint Number',
        's_2.in' => 'Invalid Prescint Number',
        's_3.in' => 'Invalid Prescint Number',
        's_4.in' => 'Invalid Prescint Number',
        's_5.in' => 'Invalid Prescint Number',
        'Num_days.in' => 'Invalid Days type selected.',
        'ownername.required' => 'Please enter the owner name.',
        'ownername.regex' => 'Owner name should contain only letters and spaces.',
        'numberoffam.required' => 'Please enter the number of family members.',
        'living.required' => 'Please enter the number of Living in barangay.',
        'numberoffam.integer' => 'Number of family members should be a valid Number.',
        'living.integer' => 'Living in barangay should be a Number.',
        'numberoffam.min' => 'Number of family members should be 0 or more.',
        'living.min' => 'Number of Living in barangay should be at 1 or more.',
        'voterscert.mimes' => 'Unsupported file type. Please upload an image or PDF.',
        'voterscert.max' => 'The file may not be greater than 5MB.',
    ];


    // Get the request data
    $requestData = $request->all();

    // Define validation rules
    $rules = $baseRules;
    if(isset($requestData['s_4']) == "8"){
        $rules['s_5'] = 'required|in:A,B,C,D,E';
        $messages = array_merge($customMessages, [
            's_5.in' => 'Invalid Prescint Number',
        ]);
    }
    if(!empty($requestData['s_1'])|| !empty($requestData['s_2'])|| !empty($requestData['s_3'])|| !empty($requestData['s_4'])|| !empty($requestData['s_5'])){
        $rules['voterscert'] = 'required|mimes:png,jpg,jpeg,pdf|max:5120';
        $messages = array_merge($customMessages, [
            's_5.required' => 'Voters Certificate is requried',
        ]);
    }
    
    if (isset($requestData['owner']) && $requestData['owner'] !== 'May-Ari') {

        $rules['proofofowner'] = 'required|mimes:png,jpg,jpeg,pdf|max:5120';
        $messages = array_merge($customMessages, [
            'proofofowner.required' => 'The letter of ownership is required.',
        ]);
    } else {
        $messages = $customMessages;
    }

    // Validate the incoming data
    $validatedData = Validator::make($requestData, $rules, $messages);
    if ($validatedData->fails()) {
        return response()->json(['errors' => $validatedData->errors()], 422);
    }
     if ($request->hasFile('proofofowner')) {
        $proofofowner = $request->file('proofofowner');
        if ($proofofowner->isValid()) {
            $proofofownerFilename = time() . '_' . $proofofowner->getClientOriginalName();
            $proofofowner->move(public_path('residentprofile'), $proofofownerFilename);
            $request->session()->put('proofofowner', $proofofownerFilename);
            session(['proofofowner' => $proofofownerFilename]);
        } else {
            return response()->json(['error' => 'Invalid Proof of Ownership file.'], 422);
        }
     }

    if ($request->hasFile('voterscert')) {
        $votersCertificate = $request->file('voterscert');
        if ($votersCertificate->isValid()) {
            $votersFilename = time() . '_' . $votersCertificate->getClientOriginalName();
            $votersCertificate->move(public_path('residentprofile'), $votersFilename);
            $request->session()->put('voters_filename', $votersFilename);
            session(['voters_filename' => $votersFilename]);
    
           
        } else {
            return response()->json(['error' => 'Invalid votersCertificate file.'], 422);
        }
    }


    // Store validated data in the session
    $data_step2 = $validatedData->validated();
    unset($data_step2['proofofowner'], $data_step2['voterscert']);
   $request->session()->put('step2', $data_step2); // must not session here the votercert and proofofowner

    // Return success response
    return response()->json(['status' => 'NEXTSTEP']);
}

    
public function thirdStep(Request $request)
{
    $validator = Validator::make($request->all(), [
        'id-file' => 'required|mimes:jpeg,png,jpg|max:5120',
        'id-select' => 'required|in:Drivers License,National ID,Philhealth,SSS,Barangay ID,Student ID',
    ], [
        'id-file.required' => 'Please upload a valid ID image.',
        'id-file.mimes' => 'The ID image must be a file of type: jpeg, png, jpg.',
        'id-file.max' => 'The ID image may not be greater than 5MB.',
        'id-select.required' => 'Please select an ID type.',
        'id-select.in' => 'Invalid ID type.',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $file = $request->file('id-file');
    $filename = time() . '.' . $file->getClientOriginalExtension();
    $filePath = storage_path('app/public/images/' . $filename);
    $file->move(storage_path('app/public/images/'), $filename);

    $pythonPath = 'C:\Users\jayen\AppData\Local\Programs\Python\Python312\python.exe';
    $scriptPath = base_path('python/check_id_face.py');
    $process = new Process([$pythonPath, $scriptPath, $filePath]);
    $request->session()->put('valid_id_path', $filename);
    $request->session()->put('idtype', $request->input('id-select'));
    session(['valid_id_path' => $filename]);
    session(['idtype' => $request->input('id-select')]);
    Log::info('Running Python script...');
    Log::info('Python path: ' . $pythonPath);
    Log::info('Script path: ' . $scriptPath);
    Log::info('Image path: ' . $filePath);

    $process->run();

    $processOutput = $process->getOutput();
    $processError = $process->getErrorOutput();

    Log::info('Process Output: ' . $processOutput);
    Log::error('Process Error Output: ' . $processError);

    // Check if the process ran successfully
    if (!$process->isSuccessful()) {
        return response()->json(['message' => 'An error occurred during the face detection process.', 'error' => $processError], 500);
    }

    // Filter out only the JSON part of the output
    preg_match('/\{.*\}/', $processOutput, $jsonMatches);
    $jsonOutput = $jsonMatches[0] ?? null;

    if ($jsonOutput === null) {
        Log::error('JSON decode error: Could not extract JSON from process output');
        return response()->json(['message' => 'Invalid response from the Python script. Could not decode JSON.'], 500);
    }

    // Decode the JSON output
    $output = json_decode($jsonOutput, true);
    
    if ($output === null) {
        Log::error('JSON decode error: Could not decode process output');
        return response()->json(['message' => 'Invalid response from the Python script. Could not decode JSON.'], 500);
    }

    if (isset($output['error'])) {
        return response()->json(['message' => $output['error']]);
    } else {
        return response()->json(['message' => 'Face detected in the ID.', 'status' => 'success', 'face_data' => $output]);
    }
}

    
public function saveFaceScan(Request $request)
{
    $imageData = $request->input('image');
    $viewType = $request->input('view');
    $validate = new Resident();
    $validate->filePath = $request->session()->get('thirdStep.id-file'); // the valid ID image

    // Generate reg_number in the format REG_DATE_AutoIncrement
    $dateToday = now()->format('Ymd');
    $latestResident = Resident::latest('id')->first();
    $lastId = $latestResident ? $latestResident->id : 0;
    $newId = $lastId + 1;
    $regNumber = "REG_{$dateToday}_0{$newId}";

    if ($imageData && $viewType) {
        try {
            // Decode the base64 image data
            $image = str_replace('data:image/png;base64,', '', $imageData);
            $image = str_replace(' ', '+', $image);
            $imageName =  $regNumber . '.png';
            session(['reg_num' => $regNumber]);
            session(['imageName' => $imageName]);

            // Determine the storage path based on the view type
            $directory = "public/dataset/{$viewType}";

            // Ensure the directory exists
            Storage::makeDirectory($directory);

            // Save the image to the correct directory
            $imagePath = "{$directory}/{$imageName}";
            Storage::put($imagePath, base64_decode($image));
            
            $validIdPath = $request->session()->get('valid_id_path');
            
            if (!$validIdPath) {
                return response()->json(['success' => false, 'message' => 'Valid ID not uploaded. Please upload a valid ID and try again.']);
            }

            // Execute the Python script for face detection and comparison
            $process = new Process([
                'C:\Users\jayen\AppData\Local\Programs\Python\Python312\python.exe',
                base_path('python/face_detection.py'),
                storage_path('app/' . $imagePath),
                storage_path('app/public/images/' . $validIdPath)
            ]);
            $process->run();

            // Check if the process executed successfully
            if (!$process->isSuccessful()) { 
                Log::error('Python script failed: ' . $process->getErrorOutput());
                return response()->json(['success' => false, 'message' => 'Face scan failed. Please make sure your face is fully visible in the frame and try again.']);
            }

            // Get the output from the Python script
            $output = $process->getOutput();

            // Log the raw output for debugging
            Log::info('Python script raw output: ' . $output);

            // Decode the output
            $outputDecoded = json_decode($output, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                Log::error('JSON decode error: ' . json_last_error_msg());
                return response()->json(['success' => false, 'message' => 'System error: Unable to process the response from face scan. Please try again later.']);
            }

            if ($outputDecoded['result'] == 'success') {
                // Faces match
                return response()->json([
                    'success' => true,
                    'message' => $outputDecoded['message'],
                    'embedding_similarity' => $outputDecoded['embedding_similarity'],
                    'embedding_distance' => $outputDecoded['embedding_distance'],
                    'combined_similarity' => $outputDecoded['combined_similarity'],
                    'execution_time' => $outputDecoded['execution_time'],
                ]);
            }elseif ($outputDecoded['result'] == 'skipped') {
                // Face scan skipped due to lighting condition
                return response()->json([
                    'success' => false,
                    'message' => $outputDecoded['message'],
                    'execution_time' => $outputDecoded['execution_time'],
                ]);
            } else {
                // Faces do not match
                return response()->json(['success' => false, 'message' => 'Face scan did not match with the ID. Please ensure you are facing the camera properly and try again.']);
            }
        } catch (\Exception $e) {
            Log::error('Error in saveFaceScan: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'An unexpected error occurred. Please try again.']);
        }
    }

    return response()->json(['success' => false, 'message' => 'Invalid data. Please provide the required image and view type.']);
}


    
    
    public function laststep(Request $request)
    {
     

    $get_daysliving = $request->session()->get('step2.living').' '. $request->session()->get('step2.Num_days');
    $regNumber = session('reg_num');
    $imageName = session('imageName');
    $proofofowner = session('proofofowner');
    $voters_filename = session('voters_filename');
    $valid_id_filename = session('valid_id_path');
    $idtype = session('idtype');
    // Create a new Resident instance and store in the database

    if(strtolower($request->session()->get('step1.mname')) == "na"){
        $mname = null;
    }else{
        $mname = $request->session()->get('step1.mname');
    }

    if(strtolower($request->session()->get('step1.ext')) == "na"){
        $ext = null;
    }else{
        $ext = $request->session()->get('step1.ext');
    }

    $address = $request->session()->get('step1.house'). " " . $request->session()->get('step1.street') ." ". $request->session()->get('step1.brgy') ." ". $request->session()->get('step1.city');
    $resident = new Resident();
    $resident->reg_number = $regNumber;
    $resident->lname = $request->session()->get('step1.lname');
    $resident->fname = $request->session()->get('step1.fname');
    $resident->mname = $mname;
    $resident->ext = $ext;
    $resident->address = $address;
    $resident->household = $request->session()->get('step1.household');
    $resident->Birth = $request->session()->get('step1.Birth');
    $resident->birthday = $request->session()->get('step1.birthday');
    $resident->age = $request->session()->get('step1.age');
    $resident->cnum = $request->session()->get('step1.cnum');
    $resident->gender = $request->session()->get('step1.gender');
    $resident->civil = $request->session()->get('step1.civil');
    $resident->citizenship = $request->session()->get('step1.citizenship');
    $resident->occupation = $request->session()->get('step1.occupation');
    $resident->email = $request->session()->get('step1.email');
    $resident->password = $request->session()->get('step1.password');
    // Retrieve values from the session
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
    $resident->indicate_if = $indicateIfString;

    //step2
    $num1 = $request->session()->get('step2.s_1');
    $num2 = $request->session()->get('step2.s_2');
    $num3 = $request->session()->get('step2.s_3');
    $num4 = $request->session()->get('step2.s_4');
    $num5 = $request->session()->get('step2.s_5');

    $prescint = $num1.$num2.$num3.$num4.$num5;
    $resident->owner_type = $request->session()->get('step2.owner');
    $resident->owner_name = $request->session()->get('step2.ownername');
    $resident->number_of_family = $request->session()->get('step2.numberoffam');
    $resident->prescintnum = $prescint;
    $resident->daysofliving = $get_daysliving;
    $resident->image_filename = $imageName;
    $resident->voters_filename = $voters_filename;
    $resident->valid_id_filename = $valid_id_filename;
    $resident->proof_of_owner = $proofofowner;
    $resident->IDtype = $idtype;
    $resident->save();

    // Clear the session data if needed
    $request->session()->forget('step1');
    $request->session()->forget('step2');
    $request->session()->forget('thirdStep');


    return response()->json(['status' => 'Complete','reg_number' => $regNumber], 200);
    }
    
    /*$request->validate([
        "sname" => "required",
        "fname" => "required",
        "mname" => "required",
        "email" => "required",
        "password" => "required",
    ]);*/

    /*$user = new User();
    $user->name = $request->sname;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);

    if($user->save()){
        return redirect(route("login"))
        ->with("success","User created Successfully");
    }
    return redirect(route("register"))
    ->with("Error","Failed to created account");*/
    public function checkEmail(Request $request)
{
    $email = $request->input('email');
    $exists = Resident::where('email', $email)->exists();
    $checkreg = Resident::where('email', $email)->first();

    $regnum = $checkreg->reg_number;
    try {
        if ($exists) {
            $token = Str::random(60);
            $subject = "Forget Password Reset";
            $body = new HtmlString("Click the button to change your Password <a href='" . route('password.reset', ['regnum' => $regnum]) . "'>Click Here!</a>");


            // Send email notification using Mailable class
            try {
                Mail::to($email)->send(new AccountApprovalNotification($subject, $body));
                //$request->session()->put('userId', $checkreg);

                return response()->json(['exists' => true]);
            } catch (\Exception $e) {
                Log::error('Exception while sending email: ' . $e->getMessage());
                return response()->json(['error' => 'Failed to send email'], 500);
            }
        } else {
            return response()->json(['exists' => false]);
        }
    } catch (\Exception $e) {
        Log::error('Error checking email: ' . $e->getMessage());
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}
public function resetPassword(Request $request)
{
    // Validate the request data
    $request->validate([
        'idnumber' => 'required', // You might need to adjust validation rules according to your requirements
        'password' => [
            'required',
            'string',
            'min:8',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]+$/',
        ],
        'confirmpassword' => [
            'required',
            'string',
            'min:8',
            'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]+$/',
        ], // Ensure confirmpassword matches password
    ], [
        'password.regex' => 'Password must have at least 8 characters, at least 1 uppercase letter, 1 number, and 1 special character.',
        'confirmpassword.regex' => 'Password must have at least 8 characters, at least 1 uppercase letter, 1 number, and 1 special character.',
    ]);

    if($request->password != $request->confirmpassword){
        return response()->json(['error' => 'Passwords does not Match'], 404);
    }
    // Get the user ID or any identifier from the request
    $idnumber = $request->input('idnumber');

    // Retrieve the user based on the identifier
    $user = Resident::where('reg_number', $idnumber)->first();

    if (!$user) {
        // If user not found, return error response
        return response()->json(['error' => 'User not found'], 404);
    }

    // Update the user's password
    $user->password = $request->input('password');
    $user->save();

    // Optionally, you can log in the user after password update
    Auth::login($user);

    // Return a success response
    return response()->json(['message' => 'Password updated successfully']);
    
}


}