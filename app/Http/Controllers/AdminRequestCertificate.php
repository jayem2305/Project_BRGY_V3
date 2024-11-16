<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use Illuminate\Validation\ValidationException;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Info;
use App\Models\Member;
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
class AdminRequestCertificate extends Controller
{
    public function submitRequestindignecy(Request $request)
    {
          // Define custom error messages
        $messages = [
            'voters.required' => 'The voters field is required.',
            'voters.in' => 'Voters field must be Valid".',
            'name.required' => 'Fullname is Requiered.',
            'address.required' => 'Address is Requiered.',
            'copy.required' => 'Copy field is required.',
            'copy.min' => 'Copy field must be at least 0.',
            'copy.max' => 'Copy field must not exceed 5.',
            'purpose.required' => 'Purpose field is required.',
            'otherpurpose' => ' Purpose field is required.',
            'otherpurpose.regex' => 'Other purpose field must contain only letters, spaces, special characters, and numbers.',
        ];

        // Validate the input data
        $request->validate([
            'voters' => 'required|in:Voters,Non-Voters',
            'name' => 'required|string',
            'address' => 'required|string',
            'age' => 'required|string',
            'cnum' => 'required|string',
            'email' => 'required|string',
            'copy' => ['required', function ($attribute, $value, $fail) {
                if ($value > 5) {
                    $fail('Requuesting a copy Mustbe limit to 5.');
                }
            }],
            'otherpurpose' => 'nullable|regex:/^[a-zA-Z\s\p{P}0-9]+$/u',
            
        ], $messages);
           
        try { 
             // Create a new indigency request in the database
            $indigencyRequest = new IndigencyRequest();
            $indigencyRequest->voters = $request->input('voters');
            $indigencyRequest->name = $request->input('name');
            $indigencyRequest->copy = $request->input('copy');
            $indigencyRequest->age = $request->input('age');
            $indigencyRequest->address = $request->input(key: 'address');
            $indigencyRequest->cnum = $request->input('cnum');
            $indigencyRequest->purpose = $request->input('purpose');
            $indigencyRequest->otherpurpose = $request->input('otherpurpose');
            $indigencyRequest->type = "Barangay Indigency";
            $indigencyRequest->email = $request->input('email');
            $indigencyRequest->reg_num = 'REG_00000000_01';
            $indigencyRequest->requirements = 'Approved.pdf'; // Store the file path in the database
            $indigencyRequest->status = 'Approved'; // Default status
            $indigencyRequest->save();

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Indigency request submitted successfully',
            ]);
        } catch (\Exception $e) {
            Log::error('Error submitting indigency request: ' . $e->getMessage());
    
            return response()->json([
                'success' => false,
                'message' => 'Error submitting request. Please try again.',
            ], 500);
        }

    }

    public function submitBusinessPermit(Request $request)
    {
        $messages = [
            'voters.required' => 'The voters field is required.',
            'voters.in' => 'Voters field must be Valid".',
            'name.required' => 'Fullname is Requiered.',
            'address.required' => 'Address is Requiered.',
            'copy.required' => 'Copy field is required.',
            'copy.min' => 'Copy field must be at least 0.',
            'copy.max' => 'Copy field must not exceed 5.',
            'bname.required' => 'Business Name field is required.',
            'bname.regex' => 'Business Name field is invalid.',
            'baddress.required' => 'Business Address field is required.',
            'baddress.regex' => 'Business Address field is invalid.'

        ];

        // Validate the input data
        $request->validate([
            'voters' => 'required|in:Voters,Non-Voters',
            'name' => 'required|string',
            'address' => 'required|string',
            'age' => 'required|string',
            'cnum' => 'required|string',
            'email' => 'required|string',
            'copy' => ['required', function ($attribute, $value, $fail) {
                if ($value > 5) {
                    $fail('Requuesting a copy Mustbe limit to 5.');
                }
            }],
            'bname' => 'required|regex:/^[a-zA-Z\s\p{P}0-9]+$/u',
            'baddress' => 'required|regex:/^[a-zA-Z\s\p{P}0-9]+$/u'
            
        ], $messages); 
        try { 
        $businessPermit = new BusinessPermit();
        $businessPermit->email = $request->input('email');
        $businessPermit->reg_num = 'REG_00000000_01';
        $businessPermit->type = "Business Permit";
        $businessPermit->voters = $request->input('voters');
        $businessPermit->name = $request->input('name');
        $businessPermit->copy = $request->input('copy');
        $businessPermit->age = $request->input('age');
        $businessPermit->address = $request->input(key: 'address');
        $businessPermit->cnum = $request->input('cnum');
        $businessPermit->bname = $request->input('bname');
        $businessPermit->baddress = $request->input('baddress');
        $businessPermit->requirements = 'Approved.pdf';
        $businessPermit->status = 'Approved'; // Default status
        $businessPermit->save(); // Save the business permit into the database

        // Return success response
        return response()->json([
                'success' => true,
                'message' => 'Business permit request submitted successfully',
            ]);
            } catch (\Exception $e) {
            Log::error('Error submitting indigency request: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error submitting request. Please try again.',
            ], 500);
        }
    }

    public function submitRequestcertificate(Request $request)
{
      // Define custom error messages
      $messages = [
        'voters.required' => 'The voters field is required.',
        'voters.in' => 'Voters field must be Valid".',
        'name.required' => 'Fullname is Requiered.',
        'address.required' => 'Address is Requiered.',
        'copy.required' => 'Copy field is required.',
        'copy.min' => 'Copy field must be at least 0.',
        'copy.max' => 'Copy field must not exceed 5.',
        'purpose.required' => 'Purpose field is required.',
        'otherpurpose' => ' Purpose field is required.',
        'otherpurpose.regex' => 'Other purpose field must contain only letters, spaces, special characters, and numbers.',
    ];

    // Validate the input data
    $request->validate([
        'voters' => 'required|in:Voters,Non-Voters',
        'name' => 'required|string',
        'address' => 'required|string',
        'age' => 'required|string',
        'cnum' => 'required|string',
        'email' => 'required|string',
        'copy' => ['required', function ($attribute, $value, $fail) {
            if ($value > 5) {
                $fail('Requuesting a copy Mustbe limit to 5.');
            }
        }],
        'otherpurpose' => 'nullable|regex:/^[a-zA-Z\s\p{P}0-9]+$/u',
        
    ], $messages);
       
    try { 
         // Create a new indigency request in the database
        $indigencyRequest = new CertificateRequest();
        $indigencyRequest->voters = $request->input('voters');
        $indigencyRequest->name = $request->input('name');
        $indigencyRequest->copy = $request->input('copy');
        $indigencyRequest->age = $request->input('age');
        $indigencyRequest->address = $request->input(key: 'address');
        $indigencyRequest->cnum = $request->input('cnum');
        $indigencyRequest->purpose = $request->input('purpose');
        $indigencyRequest->otherpurpose = $request->input('otherpurpose');
        $indigencyRequest->type = "Barangay Certificate";
        $indigencyRequest->email = $request->input('email');
        $indigencyRequest->reg_num = 'REG_00000000_01';
        $indigencyRequest->requirements = 'Approved.pdf'; // Store the file path in the database
        $indigencyRequest->status = 'Approved'; // Default status
        $indigencyRequest->save();

        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Certificate request submitted successfully',
        ]);
    } catch (\Exception $e) {
        Log::error('Error submitting indigency request: ' . $e->getMessage());

        return response()->json([
            'success' => false,
            'message' => 'Error submitting request. Please try again.',
        ], 500);
    }
    }
    public function submitBusinessCessation(Request $request)
    {
        $messages = [
            'voters.required' => 'The voters field is required.',
            'voters.in' => 'Voters field must be Valid".',
            'name.required' => 'Fullname is Requiered.',
            'address.required' => 'Address is Requiered.',
            'copy.required' => 'Copy field is required.',
            'copy.min' => 'Copy field must be at least 0.',
            'copy.max' => 'Copy field must not exceed 5.',
            'bname.required' => 'Business Name field is required.',
            'bname.regex' => 'Business Name field is invalid.',
            'baddress.required' => 'Business Address field is required.',
            'baddress.regex' => 'Business Address field is invalid.',
            'CEOname.required' => 'CEO name field is required.',
            'CEOname.regex' => 'CEO name field is Invalid.'

        ];

        // Validate the input data
        $request->validate([
            'voters' => 'required|in:Voters,Non-Voters',
            'name' => 'required|string',
            'address' => 'required|string',
            'age' => 'required|string',
            'cnum' => 'required|string',
            'email' => 'required|string',
            'copy' => ['required', function ($attribute, $value, $fail) {
                if ($value > 5) {
                    $fail('Requesting a copy Mustbe limit to 5.');
                }
            }],
            'CEOname' => 'required|regex:/^[a-zA-Z\s\p{P}0-9]+$/u',
            'bname' => 'required|regex:/^[a-zA-Z\s\p{P}0-9]+$/u',
            'baddress' => 'required|regex:/^[a-zA-Z\s\p{P}0-9]+$/u'
            
        ], $messages); 
        try { 
        $businessCessation = new BusinessCessation();
        $businessCessation->email = $request->input('email');
        $businessCessation->reg_num = 'REG_00000000_01';
        $businessCessation->type = "Business Cessation";
        $businessCessation->voters = $request->input('voters');
        $businessCessation->name = $request->input('name');
        $businessCessation->copy = $request->input('copy');
        $businessCessation->age = $request->input('age');
        $businessCessation->address = $request->input(key: 'address');
        $businessCessation->cnum = $request->input('cnum');
        $businessCessation->bname = $request->input('bname');
        $businessCessation->CEO = $request->input('CEOname');
        $businessCessation->baddress = $request->input('baddress');
        $businessCessation->requirements = 'Approved.pdf';
        $businessCessation->status = 'Approved'; // Default status
        $businessCessation->save(); // Save the business permit into the database

        // Return success response
        return response()->json([
                'success' => true,
                'message' => 'Business Cessation request submitted successfully',
            ]);
            } catch (\Exception $e) {
            Log::error('Error submitting Cessation request: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error submitting request. Please try again.',
            ], 500);
        }
    }
    public function submitFTJ(Request $request)
    {
        $messages = [
            'voters.required' => 'The voters field is required.',
            'voters.in' => 'Voters field must be Valid".',
            'name.required' => 'Fullname is Requiered.',
            'address.required' => 'Address is Requiered.',
            'copy.required' => 'Copy field is required.',
            'copy.min' => 'Copy field must be at least 0.',
            'copy.max' => 'Copy field must not exceed 5.',
            'pname.regex' => 'Parent Name field is invalid.',
            'paddress.regex' => 'Parent Address is Invalid.',
            'type.in' => 'Type of First Time job Seeker is Required".',
            'number_day.required' => 'Number of Days field is required.',

        ];

        // Validate the input data
        $request->validate([
            'voters' => 'required|in:Voters,Non-Voters',
            'name' => 'required|string',
            'address' => 'required|string',
            'age' => 'required|string',
            'cnum' => 'required|string',
            'email' => 'required|string',
            'copy' => ['required', function ($attribute, $value, $fail) {
                if ($value > 5) {
                    $fail('Requuesting a copy Mustbe limit to 5.');
                }
            }],
            'type' => 'required|in:First Time Job seeker (Minor),First Time Job Seeker Oath Taking,First Time Job Seeker',
            'pname' => 'nullable|regex:/^[a-zA-Z\s\p{P}0-9]+$/u',
            'paddress' => 'nullable|regex:/^[a-zA-Z\s\p{P}0-9]+$/u',
            'page' => 'nullable',
            'number_day' => ['required', function ($attribute, $value, $fail) {
            if ($value === '0 null' ||stripos($value, 'null') !== false ||stripos($value, '0') !== false) {
                $fail('Number of years Resided in the Barangay is Required');
            }
        }],
            
        ], $messages); 
        try { 
        $requestModel = new FTJRequest();
        $requestModel->email = $request->input('email');
        $requestModel->reg_num = 'REG_00000000_01';
        $requestModel->type = $request->input('type');
        $requestModel->voters = $request->input('voters');
        $requestModel->name = $request->input('name');
        $requestModel->copy = $request->input('copy');
        $requestModel->age = $request->input('age');
        $requestModel->address = $request->input(key: 'address');
        $requestModel->cnum = $request->input('cnum');
        $requestModel->pname = $request->input('pname');
        $requestModel->paddress = $request->input('paddress');
        $requestModel->page = $request->input('page');
        $requestModel->number_day = $request->input('number_day');
        $requestModel->requirements = 'Approved.pdf';
        $requestModel->parentrequirements = 'Approved.pdf';
        $requestModel->status = 'Approved'; // Default status
        $requestModel->save(); // Save the business permit into the database

        // Return success response
        return response()->json([
                'success' => true,
                'message' => $request->input('type').' submitted successfully',
            ]);
            } catch (\Exception $e) {
            Log::error('Error submitting Cessation request: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error submitting request. Please try again.',
            ], 500);
        }
    }
    public function submitRequestsoloparent(Request $request)
{
    $messages = [
        'voters.required' => 'Voters field is required.',
        'voters.in' => 'Voters field must be Valid".',
        'name.required' => 'Name field is required.',
        'name.invalid' => 'Name field is invalid.',
        'address.required' => 'address field is required.',
        'address.invalid' => 'address field is invalid.',
        'age.required' => 'Name field is required.',
        'age.invalid' => 'Name field is invalid.',
        'cnum.required' => 'Name field is required.',
        'cnum.invalid' => 'Name field is invalid.',
        'copy.required' => 'Copy field is required.',
        'copy.min' => 'Copy field must be at least 0.',
        'copy.max' => 'Copy field must not exceed 5.',

    ];

    // Validate the input data
    $request->validate([
        'voters' => 'required|in:Voters,Non-Voters',
        'name' => 'required|string',
        'address' => 'required|string',
        'age' => 'required|string',
        'cnum' => 'required|string',
        'email' => 'required|string',
        'copy' => ['required', function ($attribute, $value, $fail) {
            if ($value > 5) {
                $fail('Requesting a copy Mustbe limit to 5.');
            }
        }],
        'selectedChildren' => ['required', function ($attribute, $value, $fail) {
            $children = json_decode($value, true);
            if (json_last_error() !== JSON_ERROR_NONE || !is_array($children) || empty($children)) {
                $fail('Select the name of your Child/Children');
            }
        }]
        
    ], $messages); 
    // Save the data to the database
    $requestModel = new SoloparentRequest();
    $requestModel->email = $request->input('email');
    $requestModel->reg_num = 'REG_00000000_01';
    $requestModel->type = 'Solo Parents';
    $requestModel->voters = $request->input('voters');
    $requestModel->name = $request->input('name');
    $requestModel->copy = $request->input('copy');
    $requestModel->age = $request->input('age');
    $requestModel->address = $request->input(key: 'address');
    $requestModel->cnum = $request->input('cnum');
    $requestModel->requirements = 'Approved.pdf';
    $requestModel->status = 'Approved'; // Default status


    $selectedChildren = json_decode($request->input('selectedChildren'), true);
    Log::info('Selected Children Data:', $selectedChildren);
    $requestModel->children = json_encode($selectedChildren);
    $requestModel->save();


    // Return a response
    return response()->json(['success' => 'Certificate request submitted successfully']);
}
}

?>