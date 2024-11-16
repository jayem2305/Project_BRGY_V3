<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\Member;
use App\Models\Official;
use App\Models\DeclinedNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountApprovalNotification;
use Carbon\Carbon;
class ResidentListController extends Controller
{
    

    public function index()
    {
        // Get counts from the database
    $totalResidences = Resident::whereNotIn('status', ['Admin','Declined','pending'])->count();
    $totalSeniors = Resident::whereNotIn('status', ['Admin','Declined','pending'])->where('age', '>=', 65)->count();
    $totalMinors = Resident::whereNotIn('status', ['Admin','Declined','pending'])->where('age', '<', 18)->count();
    $totalMales = Resident::whereNotIn('status', ['Admin','Declined','pending'])->where('gender', 'male')->count();
    $totalFemales = Resident::whereNotIn('status', ['Admin','Declined','pending'])->where('gender', 'female')->count();
    
    $totalResidencesMember = Member::whereNotIn('status', ['Admin','Declined','pending'])->count();
    $totalSeniorsMember = Member::whereNotIn('status', ['Admin','Declined','pending'])->where('age', '>=', 65)->count();
    $totalMinorsMember = Member::whereNotIn('status', ['Admin','Declined','pending'])->where('age', '<', 18)->count();
    $totalMalesMember = Member::whereNotIn('status', ['Admin','Declined','pending'])->where('gender', 'male')->count();
    $totalFemalesMember = Member::whereNotIn('status', ['Admin','Declined','pending'])->where('gender', 'female')->count();
    
// Get the current year
$currentYear = Carbon::now()->year;

// Define the range of years you want to count (e.g., from 2023 to the current year)
$startYear = 2023; // Change this to your desired start year
$endYear = $currentYear; // Current year

// Initialize an array to hold the counts for each month
$residentsCount = [];

// Loop through each month (1 to 12)
for ($month = 1; $month <= 12; $month++) {
    // Initialize an array for each month
    $residentsCount[$month] = []; 

    // Loop through each year in the defined range
    for ($year = $startYear; $year <= $endYear; $year++) {
        // Count the number of residents for the specified year and month
        $totalResidenceschart = Resident::whereNotIn('status', ['Admin', 'Declined', 'pending'])
            ->whereYear('created_at', $year) // Adjust 'created_at' to your date column name
            ->whereMonth('created_at', $month) // Adjust 'created_at' to your date column name
            ->count();

        // Store the count in the array
        $residentsCount[$month][$year] = $totalResidenceschart;
    }
}

// Transform the data for Chart.js
$chartData = [
    'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], // X-axis labels (months)
    'datasets' => []
];

// Prepare the dataset for each year
foreach (range($startYear, $endYear) as $year) {
    $data = []; // Initialize the data array for this year
    foreach (range(1, 12) as $month) {
        $data[] = $residentsCount[$month][$year] ?? 0; // Add count for each month or 0 if not set
    }

    // Add the dataset for this year
    $chartData['datasets'][] = [
        'label' => (string)$year,
        'data' => $data,
        'backgroundColor' => 'rgba(54, 162, 235, 0.2)', // Fill color
        'borderColor' => 'rgba(54, 162, 235, 1)', // Line color
        'borderWidth' => 2,
        'fill' => true,
        'tension' => 0.4
    ];
}
    // Pass counts to the view
    $totalR = $totalResidences + $totalResidencesMember;
    $totalS = $totalSeniors + $totalSeniorsMember;
    $totalM = $totalMinors + $totalMinorsMember;
    $totalML = $totalMales + $totalMalesMember;
    $totalF = $totalFemales + $totalFemalesMember;
    
    return response()->json([
        'totalResidences' => $totalR,
        'totalSeniors' => $totalS,
        'totalMinors' => $totalM,
        'totalMales' => $totalML,
        'totalFemales' => $totalF,
        'totalresidentschart' => $chartData,
    ]);
    }
    
    public function getResidents()
    {
        // Fetch resident data with status "Resident" or "Restricted"
        $residents = Resident::whereIn('status', ['Resident', 'Restricted'])->get();
        $members = Member::whereIn('status', ['Resident', 'Restricted'])->get();
        
        // Combine the data into an array
        $data = [
            'residents' => $residents,
            'members' => $members
        ];
        
        return response()->json($data);
    }
    

    public function store(Request $request)
    {
        $residentId = $request->input('regNumber');
        Log::info('Retrieved Resident:', ['resident' => $residentId]);
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'reason' => 'required|string|regex:/^[a-zA-Z0-9\s.,?!@#$%^&*()-_=+]+$/', 
        ]);
        if (strpos($residentId, 'REG_') === 0) {
        try {
            // Fetch the resident based on the ID
            $resident = Resident::findOrFail($residentId);
            Log::info('Retrieved Resident:', ['resident' => $resident]);
            $email = $resident->email;
            Log::info('Resident Email:', ['email' => $email]);
            $subject="Account Restriction Notification";
            $Body = $validatedData['reason'];;
          
            // Send email notification using Mailable class
            try {
                Mail::to($email)->send(new AccountApprovalNotification($subject, $Body));
                $resident->status = 'Restricted';
                $resident->save();

                 // Create a new record in the declined_notifications table
        $declinedNotification = new DeclinedNotification();
        $declinedNotification->name = $validatedData['name'];
        $declinedNotification->resident_id = $residentId;
        $declinedNotification->comment = $validatedData['reason'];
        $declinedNotification->save();
        return response()->json(['message' => 'Data saved successfully']);
            } catch (\Exception $e) {
                Log::error('Exception while sending email: ' . $e->getMessage());
            }
            return response()->json(['success' => true]);
       } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Error sending email notification: Resident with ID ' . $residentId . ' not found');
            return response()->json(['error' => 'Resident not found'], 404);
        } catch (\Exception $e) {
            Log::error('Error sending email notification: ' . $e->getMessage());
return response()->json(['error' => 'Internal Server Error'], 500);
        }   
    }else {
        // If not, assume it's a Member ID
        $resident = Member::find($residentId);
        if ($resident) {
            // Update the status
            $resident->Status = "Restricted";
            $resident->save();

            // Return a success response
            return response()->json(['message' => 'Status updated successfully']);
        } else {
            // Return an error response if resident is not found
            return response()->json(['error' => 'Resident not found'], 404);
        }
    } 
    }
    public function updateStatus(Request $request)
{
    $regNumber = $request->input('regNumbers');
    Log::error('Retrieved Resident:', ['resident' => $regNumber]);
   
    if (strpos($regNumber, 'REG_') === 0) {
            // Retrieve the resident based on the registration number
        $resident = Resident::where('reg_number', $regNumber)->first();

        if ($resident) {
            // Update the status
            $resident->status = "Resident";
            $resident->save();

            // Return a success response
            return response()->json(['message' => 'Status updated successfully']);
        } else {
            // Return an error response if resident is not found
            return response()->json(['error' => 'Resident not found'], 404);
        }
    } else {
        // If not, assume it's a Member ID
        $resident = Member::find($regNumber);
        if ($resident) {
            // Update the status
            $resident->Status = "Resident";
            $resident->save();

            // Return a success response
            return response()->json(['message' => 'Status updated successfully']);
        } else {
            // Return an error response if resident is not found
            return response()->json(['error' => 'Resident not found'], 404);
        }
    } 
 
}

public function getResidentsview(Request $request)
    {
        $regNumber = $request->input('regNumber');
        // Fetch resident data with status "Resident"
        if (strpos($regNumber, 'REG_') === 0) {
            // If the format is like "REG_20240426_02", it corresponds to a Resident
            $residents = Resident::where('reg_number', $regNumber)->first();
        } else {
            // If not, assume it's a Member ID
            $residents = Member::find($regNumber);
        } 
        return response()->json($residents);
    }
   
}
