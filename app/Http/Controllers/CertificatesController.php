<?php
namespace App\Http\Controllers;
use App\Models\FtjRequest;
use Illuminate\Http\Request;
use App\Models\IndigencyRequest;
use App\Models\BusinessPermit;
use App\Models\BusinessCessation;
use App\Models\CertificateRequest;
use App\Models\Member;
use App\Models\SoloparentRequest;
use App\Models\Official;
use App\Models\Resident;
use Illuminate\Support\Facades\Log;
use PDF;
use PhpOffice\PhpWord\IOFactory;
use TCPDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccountApprovalNotification;
class CertificatesController extends Controller
{
    public function countPendingFtj()
{
    $pendingCount = FtjRequest::where('status', 'pending')->count();
    $readytoclaimCount = FtjRequest::where('status', 'Ready To claim')->count();
    $claimCount = FtjRequest::where('status', 'claimed')->count();
    return response()->json(['count' => $pendingCount, 'Readytoclaimcount' => $readytoclaimCount
    , 'claimcount' => $claimCount]);
}
public function countPendingindigency()
{
    $pendingCount = IndigencyRequest::where('status', 'pending')->count();
    $readytoclaimCount = IndigencyRequest::where('status', 'Ready To claim')->count();
    $claimCount = IndigencyRequest::where('status', 'claimed')->count();
    return response()->json(['count' => $pendingCount, 'Readytoclaimcount' => $readytoclaimCount
    , 'claimcount' => $claimCount]);
}
public function countPendingcert()
{
    $pendingCount = CertificateRequest::where('status', 'pending')->count();
    $readytoclaimCount = CertificateRequest::where('status', 'Ready To claim')->count();
    $claimCount = CertificateRequest::where('status', 'claimed')->count();
    return response()->json(['count' => $pendingCount, 'Readytoclaimcount' => $readytoclaimCount
    , 'claimcount' => $claimCount]);
}
public function countPendingpermit()
{
    $pendingCount = BusinessPermit::where('status', 'pending')->count();
    $readytoclaimCount = BusinessPermit::where('status', 'Ready To claim')->count();
    $claimCount = BusinessPermit::where('status', 'claimed')->count();
    return response()->json(['count' => $pendingCount, 'Readytoclaimcount' => $readytoclaimCount
    , 'claimcount' => $claimCount]);
}
public function countPendingcessation()
{
    $pendingCount = BusinessCessation::where('status', 'Pending')->count();
    $readytoclaimCount = BusinessCessation::where('status', 'Ready To claim')->count();
    $claimCount = BusinessCessation::where('status', 'claimed')->count();
    return response()->json(['count' => $pendingCount, 'Readytoclaimcount' => $readytoclaimCount
    , 'claimcount' => $claimCount]);
}
public function countPendingsoloparent()
{
    $pendingCount = SoloparentRequest::where('status', 'pending')->count();
    $readytoclaimCount = SoloparentRequest::where('status', 'Ready To claim')->count();
    $claimCount = SoloparentRequest::where('status', 'claimed')->count();
    return response()->json(['count' => $pendingCount, 'Readytoclaimcount' => $readytoclaimCount
    , 'claimcount' => $claimCount]);
}


//get data to table
public function getData($type)
    {
        switch ($type) {
            case 'ftj':
                $data = FtjRequest::where('status', 'pending')
                ->whereHas('residents', function ($query) {
                    $query->whereColumn('reg_num', 'residents.reg_number');
                })
                ->with(['residents' => function ($query) {
                    $query->select('reg_number', 'address', 'cnum');
                }])
                ->get();
                break;
            case 'indigency':
                $data = IndigencyRequest::where('type', 'Barangay Indigency')->where('status', 'pending')
                ->whereHas('resident', function ($query) {
                    $query->whereColumn('reg_num', 'residents.reg_number');
                })
                ->with(['resident' => function ($query) {
                    $query->select('reg_number', 'address', 'cnum');
                }])
                ->get();
                break;
            case 'certificate':
                $data = CertificateRequest::where('type', 'Barangay Certificate')->where('status', 'pending')
                ->whereHas('resident', function ($query) {
                    $query->whereColumn('reg_num', 'residents.reg_number');
                })
                ->with(['resident' => function ($query) {
                    $query->select('reg_number', 'address', 'cnum');
                }])
                ->get();
                break;
            case 'permits':
                $data = BusinessPermit::where('type', 'Business Permit')->where('status', 'pending')
                ->whereHas('resident', function ($query) {
                    $query->whereColumn('reg_num', 'residents.reg_number');
                })
                ->with(['resident' => function ($query) {
                    $query->select('reg_number', 'address', 'cnum');
                }])
                ->get();
                Log::info('Retrieved Resident:', ['permits' => $data]);
                break;

            case 'cessation':
                $data = BusinessCessation::where('type', 'Business Cessation')->where('status', 'pending')
                ->whereHas('resident', function ($query) {
                    $query->whereColumn('reg_num', 'residents.reg_number');
                })
                ->with(['resident' => function ($query) {
                    $query->select('reg_number', 'address', 'cnum');
                }])
                ->get();
                break;
            case 'soloparent':
                $data = SoloparentRequest::where('type', 'Solo Parents')->where('status', 'pending')
                ->whereHas('resident', function ($query) {
                    $query->whereColumn('reg_num', 'residents.reg_number');
                })
                ->with(['resident' => function ($query) {
                    $query->select('reg_number', 'address', 'cnum');
                }])
                ->get();
                break;
            default:
                $data = [];
        }

        return response()->json($data);
    }
    public function GetdataApproved($type)
    {
        switch ($type) {
            case 'ftj':
                $datas = FtjRequest::where('status', 'Approved')->orWhere('status', 'Ready To claim')
                ->orWhere('status', 'Claimed')
                ->whereHas('residents', function ($query) {
                    $query->whereColumn('reg_num', 'residents.reg_number');
                })
                ->with(['residents' => function ($query) {
                    $query->select('reg_number', 'address', 'cnum');
                }])
                ->get();
                break;
            case 'indigency':
                $datas = IndigencyRequest::where('type', 'Barangay Indigency')->where('status', 'Approved')
                ->orWhere('status', 'Ready To claim')
                ->orWhere('status', 'Claimed')
                ->whereHas('resident', function ($query) {
                    $query->whereColumn('reg_num', 'residents.reg_number');
                })
                ->with(['resident' => function ($query) {
                    $query->select('reg_number', 'address', 'cnum');
                }])
                ->get();
                break;
            case 'certificate':
                $datas = CertificateRequest::where('type', 'Barangay Certificate')->where('status', 'Approved')
                ->orWhere('status', 'Claimed')
                ->orWhere('status', 'Ready To claim')
                ->whereHas('resident', function ($query) {
                    $query->whereColumn('reg_num', 'residents.reg_number');
                })
                ->with(['resident' => function ($query) {
                    $query->select('reg_number', 'address', 'cnum');
                }])
                ->get();
                break;
            case 'permits':
                $datas = BusinessPermit::where('type', 'Business Permit')->where('status', 'Approved')
                ->orWhere('status', 'Claimed')
                ->orWhere('status', 'Ready To claim')
                ->whereHas('resident', function ($query) {
                    $query->whereColumn('reg_num', 'residents.reg_number');
                })
                ->with(['resident' => function ($query) {
                    $query->select('reg_number', 'address', 'cnum');
                }])
                ->get();
                Log::info('Retrieved Resident:', ['permits' => $datas]);
                break;

            case 'cessation':
                $datas = BusinessCessation::where('type', 'Business Cessation')->where('status', 'Approved')
                ->orWhere('status', 'Claimed')
                ->orWhere('status', 'Ready To claim')
                ->whereHas('resident', function ($query) {
                    $query->whereColumn('reg_num', 'residents.reg_number');
                })
                ->with(['resident' => function ($query) {
                    $query->select('reg_number', 'address', 'cnum');
                }])
                ->get();
                break;
            case 'soloparent':
                $datas = SoloparentRequest::where('type', 'Solo Parents')->where('status', 'Approved')
                ->orWhere('status', 'Claimed')
                ->orWhere('status', 'Ready To claim')
                ->whereHas('resident', function ($query) {
                    $query->whereColumn('reg_num', 'residents.reg_number');
                })
                ->with(['resident' => function ($query) {
                    $query->select('reg_number', 'address', 'cnum');
                }])
                ->get();
                break;
            default:
                $datas = [];
        }

        return response()->json($datas);
    }
    
    public function getRelatedData(Request $request)
    {
        // Retrieve all active officials
        $officials = Official::where('status', "active")->get();
    
        // Prepare the data to be returned as JSON
        $officials_members = $officials->map(function ($official) {
            return [
                'name' => $official->name,
                'position' => $official->position,
                'image' => $official->profile_path
            ];
        });
    
        Log::info('Retrieved Names:', ['names' => $officials_members]);
    
        return response()->json($officials_members);
    }
    
    public function generatePDF(Request $request)
    {
        // Retrieve the FTJ data based on the ID
        $id = $request->id;
        $type = $request->type;
        $offcier = $request->offcier;
    
        if ($type == "Barangay Indigency") {
            $data = IndigencyRequest::findOrFail($id);
            $regnumber = $data->reg_num;
            if($regnumber == "REG_00000000_01"){
                //$data_infos = IndigencyRequest::where('reg_num', $regnumber)->firstOrFail($id);
                $address = strtoupper($data->address);
                $age = $data->age;
                $name = strtoupper($data->name);
            }else{
                $name = strtoupper($data->name);
                $data_info = Resident::where('reg_number', $regnumber)->firstOrFail();
                $data_name = $data_info->lname . ', ' . $data_info->fname . ' ' . $data_info->mname . ' ' . $data_info->ext;
                $address = strtoupper($data_info->address);
                //$age = ($data_name == $data->name) ? $data_info->age : Member::where('reg_num', $regnumber)->firstOrFail()->age;
                if (trim($data_name) == trim($data->name)) {
                    $age = $data_info->age;
                } else {
                    $data_info = Member::where('reg_num', $regnumber)->firstOrFail();
                    $data_name = $data_info->lname . ', ' . $data_info->fname . ' ' . $data_info->mname . ' ' . $data_info->ext;
                    $age = $data_info->age;
                }
            }
            $data_officials = Official::where('name', $offcier)->firstOrFail();
            $officials = Official::where('status', "active")->get();
            // Set initial Y position
            $y = 43;
            $fianceuncheckedImagePath = 'pic/unchecked.jpg'; 
            $schooluncheckedImagePath = 'pic/unchecked.jpg'; 
            $burialuncheckedImagePath = 'pic/unchecked.jpg'; 
            $educuncheckedImagePath = 'pic/unchecked.jpg'; 
            $othersuncheckedImagePath = 'pic/unchecked.jpg';
            $meduncheckedImagePath = 'pic/unchecked.jpg'; 
            $scholaruncheckedImagePath = 'pic/unchecked.jpg'; 
            $socialuncheckedImagePath = 'pic/unchecked.jpg';
            $hospiuncheckedImagePath = 'pic/unchecked.jpg'; 
            $purposeother = "Others:___________________________________________";

            if($data == "Financial Assistance"){
                $fianceuncheckedImagePath = 'pic/checked.jpg';
            }
            else if($data->purpose == "School Requirement"){
                $schooluncheckedImagePath = 'pic/checked.jpg';
            }
            else if($data->purpose == "Scholarship Application"){
                $scholaruncheckedImagePath = 'pic/checked.jpg';
            }
            else if($data->purpose == "Burial Assistance"){
                $burialuncheckedImagePath = 'pic/checked.jpg';
            }
            else if($data->purpose == "Educational Assistance"){
                $educuncheckedImagePath = 'pic/checked.jpg';
            }
            else if($data->purpose == "Social Pension Application For Indigent Senior Citizen"){
                $socialuncheckedImagePath = 'pic/checked.jpg';
            }
            else if($data->purpose == "Medical Assistance"){
                $meduncheckedImagePath = 'pic/checked.jpg';
            }
            else if($data->purpose == "Hospital Requirement"){
                $hospiuncheckedImagePath = 'pic/checked.jpg';
            }else{
               $othersuncheckedImagePath = 'pic/checked.jpg';
               $purposeother = "Others: ".$data->otherpurpose;
            }
            // Create TCPDF instance
            $pdf = new TCPDF();
    
            // Set document properties
            $pdf->SetCreator('Barangay 781 Zone 85');
            $pdf->SetTitle('Barangay Indigency Request');
            $pdf->SetSubject('Barangay Indigency');
            $pdf->SetKeywords('BI_Req');
            // Add a page
            $pdf->AddPage();
            // Display image as template
            $templatePath = public_path('cert/PDFDOCU/indigency.jpg');
            $pdf->Image($templatePath, 0, 0, 255, 327, '', '', '', false, 400, '', false, false, 0);
            if (!file_exists($templatePath)) {
                exec("gs -sDEVICE=jpeg -sOutputFile={$templatePath} -r300 {templatePath}");
            }
            // Set font
            $pdf->SetFont('times', '', 12);
            // Display data on top of the image
            $pdf->SetXY(97, 45); // Set position for data
            $pdf->SetFont('times', 'BU', 20);
            $pdf->Cell(0, 10, 'BARANGAY INDIGENCY', 0, 1, 'L');
            foreach ($officials as $official) {
                // Set position for data
                $pdf->SetXY(15, $y);
                $pdf->SetFont('times', 'BU', 12.5);
                $pdf->MultiCell(65, 10, $official->name, 1, 'C');
                $y += 4;
                $pdf->SetXY(16, $y);
                $pdf->SetFont('times', 'B', 11);
                $pdf->MultiCell(60, 10, $official->position, 1,'C');
                $y += 13; // Adjust as needed based on spacing
            }

            $pdf->SetXY(80, 57); // Set position for data
            $pdf->SetFont('times', '', 12);
            if($data->voters == "Non-Voters")
            {
                $text = "           This is to certify that $name, $age years old, is a bonafide resident of this barangay with postal address at $address.
                This certification is being issued upon the request of the bearer for the reason stated below and for whatever legal purpose it may serve.";
            }else{
                $text = "           This is to certify that $name, $age years old, is a registered voter and bonafide resident of this barangay with postal address at $address.
                This certification is being issued upon the request of the bearer for the reason stated below and for whatever legal purpose it may serve.";
            }
            $pdf->MultiCell(115, 15, $text, 0, 'J');
//staring of purposes
            $pdf->SetXY(91, 97);
            $pdf->Image($fianceuncheckedImagePath, 80, 100, 12, 10);
            $pdf->Cell(115, 15, "Financial Assistance",0, 'J');

            $pdf->SetXY(91, 112);
            $pdf->Image($schooluncheckedImagePath, 80, 115, 12, 10);
            $pdf->Cell(115, 15, "School Requirement",0, 'J');

            $pdf->SetXY(91, 127);
            $pdf->Image($burialuncheckedImagePath, 80, 130, 12, 10);
            $pdf->Cell(115, 15, "Burial Assistance",0, 'J');

            $pdf->SetXY(91, 142);
            $pdf->Image($educuncheckedImagePath, 80, 145, 12, 10);
            $pdf->Cell(115, 15, "Educational Assistance",0, 'J');

            $pdf->SetXY(91, 157);
            $pdf->Image($othersuncheckedImagePath, 80, 160, 12, 10);
            $pdf->Cell(115, 15, $purposeother ,0, 'J');

            $pdf->SetXY(151, 97);
            $pdf->Image($meduncheckedImagePath, 140, 100, 12, 10);
            $pdf->Cell(115, 15, "Medical Assistance",0, 'J');

            $pdf->SetXY(151, 112);
            $pdf->Image($hospiuncheckedImagePath, 140, 115, 12, 10);
            $pdf->Cell(115, 15, "Hospital Requirement",0, 'J');

            $pdf->SetXY(151, 127);
            $pdf->Image($scholaruncheckedImagePath, 140, 130, 12, 10);
            $pdf->Cell(115, 15, "Scholarship Application",0, 'J');

            $pdf->SetXY(151, 145);
            $pdf->Image($socialuncheckedImagePath, 140, 145, 12, 10);
            $pdf->MultiCell(49, 15, "Social Pension for Indigent Senior Citizen Application ",0, 'J');

            $pdf->SetXY(80, 173); 
            $date = date("jS \t\ F Y");
            $location = "Barangay 781, Zone 85, Sta. Ana, Manila, Philippines.";
            $text = "       SIGNED and ISSUED this $date at $location";
            $pdf->MultiCell(120, 20, $text, 0, 'L');

            
           if( $data_officials->position != "Punong Barangay"){
            $pdf->SetXY(135, 190);
            $pdf->SetFont('times', 'BU', 13);
            $pdf->Cell(0, 10, $data_officials->name, 0, 1, 'C');
            $pdf->SetFont('times', 'B', 12);
            $pdf->SetXY(135, 197);
            $pdf->MultiCell(65, 10, "Barangay Kagawad" ,0, 'C'); 
            $pdf->SetXY(135, 206);
            $pdf->SetFont('times', 'B', 12);
            $pdf->MultiCell(65, 10, "For" ,0, 'C'); 
            $pdf->SetXY(135, 216);
            $pdf->SetFont('times', 'BU', 12);
            $pdf->MultiCell(65, 10, "Manolito S. Diaz" ,0, 'C'); 
            $pdf->SetXY(135, 220);
            $pdf->SetFont('times', 'B', 12);
            $pdf->MultiCell(65, 10, "Punong Barangay" ,0, 'C'); 
       }else{
            $pdf->SetXY(135, 190);
            $pdf->SetFont('times', 'BU', 13);
            $pdf->Cell(0, 10, $data_officials->name, 0, 1, 'C');
            $pdf->SetFont('times', 'B', 12);
            $pdf->SetXY(135, 197);
            $pdf->MultiCell(65, 10, $data_officials->position ,0, 'C');
       }

            $pdfFilePath = public_path('cert/') . $data->name . '-' . 'Certificate.pdf';
            $pdf->Output($pdfFilePath, 'F'); // Output to file
    
            // Return the URL to the generated PDF
            return response()->json(['url' => url('cert/' . $data->name . '-' . 'Certificate.pdf')]);
        }

        if ($type == "Barangay Certificate") {
            $data = CertificateRequest::findOrFail($id);
            $regnumber = $data->reg_num;
            if($regnumber == "REG_00000000_01"){
                $data_infos = CertificateRequest::where('reg_num', $regnumber)->firstOrFail();
                $address = strtoupper($data_infos->address);
                $age = $data_infos->age;
                $name =  strtoupper($data_infos->name);
            }else{
                $name = strtoupper($data->name);
                $data_info = Resident::where('reg_number', $regnumber)->firstOrFail();
                $data_name = $data_info->lname . ', ' . $data_info->fname . ' ' . $data_info->mname . ' ' . $data_info->ext;
                $address = strtoupper($data_info->address);
                //$age = ($data_name == $data->name) ? $data_info->age : Member::where('reg_num', $regnumber)->firstOrFail()->age;
                if (trim($data_name) == trim($data->name)) {
                    $age = $data_info->age;
                } else {
                    $data_info = Member::where('reg_num', $regnumber)->firstOrFail();
                    $data_name = $data_info->lname . ', ' . $data_info->fname . ' ' . $data_info->mname . ' ' . $data_info->ext;
                    $age = $data_info->age;
                }
            }
            $data_officials = Official::where('name', $offcier)->firstOrFail();
            $officials = Official::where('status', "active")->get();
            // Set initial Y position
            $y = 43;
            $ResidencyuncheckedImagePath = 'pic/unchecked.jpg'; 
            $EmploymentuncheckedImagePath = 'pic/unchecked.jpg'; 
            $PWDuncheckedImagePath = 'pic/unchecked.jpg'; 
            $EducationaluncheckedImagePath = 'pic/unchecked.jpg'; 
            $SchooluncheckedImagePath = 'pic/unchecked.jpg';
            $SenioruncheckedImagePath = 'pic/unchecked.jpg'; 
            $BankuncheckedImagePath = 'pic/unchecked.jpg'; 
            $otherscertuncheckedImagePath = 'pic/unchecked.jpg';
            $hospiuncheckedImagePath = 'pic/unchecked.jpg'; 
            $purposeother = "Others:___________________________________________";

            if($data->purpose == "Proof of Residency"){
                $ResidencyuncheckedImagePath = 'pic/checked.jpg';
            }
            else if($data->purpose == "Local Employment"){
                $EmploymentuncheckedImagePath = 'pic/checked.jpg';
            }
            else if($data->purpose == "PWD ID Application"){
                $PWDuncheckedImagePath = 'pic/checked.jpg';
            }
            else if($data->purpose == "Educational Assistance"){
                $EducationaluncheckedImagePath = 'pic/checked.jpg';
            }
            else if($data->purpose == "School Requirement"){
                $SchooluncheckedImagePath = 'pic/checked.jpg';
            }
            else if($data->purpose == "Senior Citizen Application"){
                $SenioruncheckedImagePath = 'pic/checked.jpg';
            }
            else if($data->purpose == "Bank Account Opening"){
                $BankuncheckedImagePath = 'pic/checked.jpg';
            }
            else if($data->purpose == "Hospital Requirement"){
                $hospiuncheckedImagePath = 'pic/checked.jpg';
            }else{
               $otherscertuncheckedImagePath = 'pic/checked.jpg';
               $purposeother = "Others: ".$data->otherpurpose;
            }
            
            // Create TCPDF instance
            $pdf = new TCPDF();
    
            // Set document properties
            $pdf->SetCreator('Barangay 781 Zone 85');
            $pdf->SetTitle('Barangay Certificate Request');
            $pdf->SetSubject('Barangay Certificate');
            $pdf->SetKeywords('BC_Req');
            
            // Add a page
            $pdf->AddPage();
            // Display image as template
            $templatePath = public_path('cert/PDFDOCU/indigency.jpg');
            $pdf->Image($templatePath, 0, 0, 255, 327, '', '', '', false, 400, '', false, false, 0);
            if (!file_exists($templatePath)) {
                exec("gs -sDEVICE=jpeg -sOutputFile={$templatePath} -r300 {templatePath}");
            }
            // Set font
            $pdf->SetFont('times', '', 12);
            // Display data on top of the image
            $pdf->SetXY(97, 45); // Set position for data
            $pdf->SetFont('times', 'BU', 20);
            $pdf->Cell(0, 10, 'BARANGAY CERTIFICATE', 0, 1, 'L');
            foreach ($officials as $official) {
                // Set position for data
                $pdf->SetXY(15, $y);
                $pdf->SetFont('times', 'B', 12.5);
                $pdf->MultiCell(65, 10, $official->name, 1, 'C');
                $y += 4;
                $pdf->SetXY(16, $y);
                $pdf->SetFont('times', 'B', 11);
                $pdf->MultiCell(60, 10, $official->position, 1,'C');
                $y += 13; // Adjust as needed based on spacing
            }

            $pdf->SetXY(80, 57); // Set position for data
            $pdf->SetFont('times', '', 12);
            if($data->voters == "Non-Voters")
            {
                $text = "           This is to certify that $name, $age years old, is a bonafide resident of this barangay with postal address at $address.
                This certification is being issued upon the request of the bearer for the reason stated below and for whatever legal purpose it may serve.";
            }else{
                $text = "           This is to certify that $name, $age years old, is a registered voter and bonafide resident of this barangay with postal address at $address.
                This certification is being issued upon the request of the bearer for the reason stated below and for whatever legal purpose it may serve.";
            }
            
            $pdf->MultiCell(115, 15, $text, 0, 'J');
//staring of purposes
            $pdf->SetXY(91, 97);
            $pdf->Image($ResidencyuncheckedImagePath, 80, 100, 12, 10);
            $pdf->Cell(115, 15, "Proof of Residency",0, 'J');

            $pdf->SetXY(91, 112);
            $pdf->Image($EmploymentuncheckedImagePath, 80, 115, 12, 10);
            $pdf->Cell(115, 15, "Local Employment",0, 'J');

            $pdf->SetXY(91, 127);
            $pdf->Image($PWDuncheckedImagePath, 80, 130, 12, 10);
            $pdf->Cell(115, 15, "PWD ID Application",0, 'J');

            $pdf->SetXY(91, 142);
            $pdf->Image($EducationaluncheckedImagePath, 80, 145, 12, 10);
            $pdf->Cell(115, 15, "Educational Assistance",0, 'J');

            $pdf->SetXY(91, 157);
            $pdf->Image($otherscertuncheckedImagePath, 80, 160, 12, 10);
            $pdf->Cell(115, 15, $purposeother ,0, 'J');

            $pdf->SetXY(151, 97);
            $pdf->Image($SchooluncheckedImagePath, 140, 100, 12, 10);
            $pdf->Cell(115, 15, "School Requirement",0, 'J');

            $pdf->SetXY(151, 112);
            $pdf->Image($hospiuncheckedImagePath, 140, 115, 12, 10);
            $pdf->Cell(115, 15, "Hospital Requirement",0, 'J');

            $pdf->SetXY(151, 127);
            $pdf->Image($SenioruncheckedImagePath, 140, 130, 12, 10);
            $pdf->Cell(115, 15, "Senior Citizen Application",0, 'J');

            $pdf->SetXY(151, 145);
            $pdf->Image($BankuncheckedImagePath, 140, 145, 12, 10);
            $pdf->MultiCell(49, 15, "Bank Account Opening",0, 'J');

            $pdf->SetXY(80, 173); 
            $date = date("jS \t\ F Y");
            $location = "Barangay 781, Zone 85, Sta. Ana, Manila, Philippines.";
            $text = "       SIGNED and ISSUED this $date at $location";
            $pdf->MultiCell(120, 20, $text, 0, 'L');
            if( $data_officials->position != "Punong Barangay"){
                $pdf->SetXY(135, 190);
                $pdf->SetFont('times', 'BU', 13);
                $pdf->Cell(0, 10, $data_officials->name, 0, 1, 'C');
                $pdf->SetFont('times', 'B', 12);
                $pdf->SetXY(135, 197);
                $pdf->MultiCell(65, 10, "Barangay Kagawad" ,0, 'C'); 
                $pdf->SetXY(135, 206);
                $pdf->SetFont('times', 'B', 12);
                $pdf->MultiCell(65, 10, "For" ,0, 'C'); 
                $pdf->SetXY(135, 216);
                $pdf->SetFont('times', 'BU', 12);
                $pdf->MultiCell(65, 10, "Manolito S. Diaz" ,0, 'C'); 
                $pdf->SetXY(135, 220);
                $pdf->SetFont('times', 'B', 12);
                $pdf->MultiCell(65, 10, "Punong Barangay" ,0, 'C'); 
           }else{
                $pdf->SetXY(135, 190);
                $pdf->SetFont('times', 'BU', 13);
                $pdf->Cell(0, 10, $data_officials->name, 0, 1, 'C');
                $pdf->SetFont('times', 'B', 12);
                $pdf->SetXY(135, 197);
                $pdf->MultiCell(65, 10, $data_officials->position ,0, 'C');
           }

            $pdfFilePath = public_path('cert/') . $data->name . '-' . 'Certificate.pdf';
            $pdf->Output($pdfFilePath, 'F'); // Output to file
    
            // Return the URL to the generated PDF
            return response()->json(['url' => url('cert/' . $data->name . '-' . 'Certificate.pdf')]);
        }

        if ($type == "Business Permit") {
            $data = BusinessPermit::findOrFail($id);
            $regnumber = $data->reg_num;
            if($regnumber == "REG_00000000_01"){
                //$data_infos = IndigencyRequest::where('reg_num', $regnumber)->firstOrFail($id);
                $address = strtoupper($data->address);
                $age = $data->age;
                $name = strtoupper($data->name);
                $bname = strtoupper($data->bname);
                $baddress = strtoupper($data->baddress);
            }else{
                $bname = strtoupper($data->bname);
                $baddress = strtoupper($data->baddress);
                $name = strtoupper($data->name);
                $data_info = Resident::where('reg_number', $regnumber)->firstOrFail();
                $data_name = $data_info->lname . ', ' . $data_info->fname . ' ' . $data_info->mname . ' ' . $data_info->ext;
                $address = strtoupper($data_info->address);
                //$age = ($data_name == $data->name) ? $data_info->age : Member::where('reg_num', $regnumber)->firstOrFail()->age;
                if (trim($data_name) == trim($data->name)) {
                    $age = $data_info->age;
                } else {
                    $data_info = Member::where('reg_num', $regnumber)->firstOrFail();
                    $data_name = $data_info->lname . ', ' . $data_info->fname . ' ' . $data_info->mname . ' ' . $data_info->ext;
                    $age = $data_info->age;
                }
            }
            $data_officials = Official::where('name', $offcier)->firstOrFail();
            $officials = Official::where('status', "active")->get();
            // Set initial Y position
            $y = 43;
            // Create TCPDF instance
            $pdf = new TCPDF();
    
            // Set document properties
            $pdf->SetCreator('Barangay 781 Zone 85');
            $pdf->SetTitle('Business Permit Request');
            $pdf->SetSubject('Business Permit');
            $pdf->SetKeywords('BP_Req');
            // Add a page
            $pdf->AddPage();
            // Display image as template
            $templatePath = public_path('cert/PDFDOCU/bpermit.jpg');
            $pdf->Image($templatePath, 0, 0, 255, 327, '', '', '', false, 400, '', false, false, 0);
            if (!file_exists($templatePath)) {
                exec("gs -sDEVICE=jpeg -sOutputFile={$templatePath} -r300 {templatePath}");
            }
            // Set font
            $pdf->SetFont('times', '', 12);
            // Display data on top of the image
            $pdf->SetXY(97, 45); // Set position for data
            $pdf->SetFont('times', 'BU', 20);
            $pdf->Cell(0, 10, 'BUSINESS PERMIT', 0, 1, 'L');
            foreach ($officials as $official) {
                // Set position for data
                $pdf->SetXY(15, $y);
                $pdf->SetFont('times', 'B', 12.5);
                $pdf->MultiCell(65, 10, $official->name, 1, 'C');
                $y += 4;
                $pdf->SetXY(16, $y);
                $pdf->SetFont('times', 'B', 11);
                if( $data_officials->position != "Punong Barangay"){
                    $pdf->MultiCell(65, 10, "Barangay Kagawad" ,0, 'C'); 
                }else{
                    $pdf->MultiCell(65, 10, $data_officials->position ,0, 'C');
                }
                $y += 13; // Adjust as needed based on spacing
            }

            $pdf->SetXY(80, 60); // Set position for data
            $pdf->SetFont('times', '', 13);
                $text = "TO WHOM IT MAY CONCERN:    
        This is to certify that $bname with postal address at $baddress is hereby granted a permit to operate its business that is within the Territorial Jurisdiction of Barangay 781 Zone 85, pursuant to the provisions of Section 152 c, Republic Act No. 7160, otherwise known as the Government Code of 1991.
                    
        This permit is issued upon the request of $name, whose signature and Community Tax No. are listed below.";
            
            $pdf->MultiCell(115, 15, $text, 0, 'J');
            $pdf->SetXY(80, 130); 
            $date = date("jS \t\ F Y");
            $location = "Barangay 781, Zone 85, Sta. Ana, Manila, Philippines.";
            $text = "       SIGNED and ISSUED this $date at $location";
            $pdf->MultiCell(120, 20, $text, 0, 'L');

            $pdf->SetXY(135, 160);
            $pdf->SetFont('times', 'BU', 13);
            $pdf->Cell(0, 10, $data->name, 0, 1, 'C');
            $pdf->SetFont('times', 'B', 12);
            $pdf->SetXY(135, 166);
            $pdf->MultiCell(65, 10, "Owner/OIC – Manager" ,0, 'C');

            
           if( $data_officials->position != "Punong Barangay"){
            $pdf->SetXY(135, 190);
            $pdf->SetFont('times', 'BU', 13);
            $pdf->Cell(0, 10, $data_officials->name, 0, 1, 'C');
            $pdf->SetFont('times', 'B', 12);
            $pdf->SetXY(135, 197);
            $pdf->MultiCell(65, 10, "Barangay Kagawad" ,0, 'C'); 
            $pdf->SetXY(135, 206);
            $pdf->SetFont('times', 'B', 12);
            $pdf->MultiCell(65, 10, "For" ,0, 'C'); 
            $pdf->SetXY(135, 216);
            $pdf->SetFont('times', 'BU', 12);
            $pdf->MultiCell(65, 10, "Manolito S. Diaz" ,0, 'C'); 
            $pdf->SetXY(135, 220);
            $pdf->SetFont('times', 'B', 12);
            $pdf->MultiCell(65, 10, "Punong Barangay" ,0, 'C'); 
       }else{
            $pdf->SetXY(135, 190);
            $pdf->SetFont('times', 'BU', 13);
            $pdf->Cell(0, 10, $data_officials->name, 0, 1, 'C');
            $pdf->SetFont('times', 'B', 12);
            $pdf->SetXY(135, 197);
            $pdf->MultiCell(65, 10, $data_officials->position ,0, 'C');
       }

            $pdfFilePath = public_path('cert/') . $data->name . '-' . 'Certificate.pdf';
            $pdf->Output($pdfFilePath, 'F'); // Output to file
    
            // Return the URL to the generated PDF
            return response()->json(['url' => url('cert/' . $data->name . '-' . 'Certificate.pdf')]);
        }
        if ($type == "Business Cessation") {
            $data = BusinessCessation::findOrFail($id);
            $regnumber = $data->reg_num;
            if($regnumber == "REG_00000000_01"){
                //$data_infos = BusinessCessation::where('reg_num', $regnumber)->firstOrFail();
                $name = strtoupper($data->name);
                $bname = strtoupper($data->bname);
                $baddress = strtoupper($data->baddress);
                $ceo = strtoupper($data->CEO);
            }else{
                $name = strtoupper($data->name);
                $bname = strtoupper($data->bname);
                $baddress = strtoupper($data->baddress);
                $ceo = strtoupper($data->CEO);
                $data_info = Resident::where('reg_number', $regnumber)->firstOrFail();
                $data_name = $data_info->lname . ', ' . $data_info->fname . ' ' . $data_info->mname . ' ' . $data_info->ext;
                if (trim($data_name) == trim($data->name)) {
                    $age = $data_info->age;
                } else {
                    $data_info = Member::where('reg_num', $regnumber)->firstOrFail();
                    $data_name = $data_info->lname . ', ' . $data_info->fname . ' ' . $data_info->mname . ' ' . $data_info->ext;
                    $age = $data_info->age;
                }
            }
            $data_officials = Official::where('name', $offcier)->firstOrFail();
            $officials = Official::where('status', "active")->get();
            $currentDate = Carbon::now()->format('F j, Y');
            // Set initial Y position
            $y = 43;
            // Create TCPDF instance
            $pdf = new TCPDF();
            
            // Set document properties
            $pdf->SetCreator('Barangay 781 Zone 85');
            $pdf->SetTitle('Business Cessation Request');
            $pdf->SetSubject('Business Cessation');
            $pdf->SetKeywords('BCS_Req');
            // Add a page
            $pdf->AddPage();
            // Display image as template
            $templatePath = public_path('cert/PDFDOCU/bpermit.jpg');
            $pdf->Image($templatePath, 0, 0, 255, 327, '', '', '', false, 400, '', false, false, 0);
            if (!file_exists($templatePath)) {
                exec("gs -sDEVICE=jpeg -sOutputFile={$templatePath} -r300 {templatePath}");
            }
            // Set font
            $pdf->SetFont('times', '', 12);
            // Display data on top of the image
            $pdf->SetXY(80, 45); // Set position for data
            $pdf->SetFont('times', 'BU', 15);
            $pdf->Cell(0, 10, 'CERTIFICATE OF CESSATION OF BUSINESS', 0, 1, 'L');
            foreach ($officials as $official) {
                // Set position for data
                $pdf->SetXY(15, $y);
                $pdf->SetFont('times', 'B', 12.5);
                $pdf->MultiCell(65, 10, $official->name, 1, 'C');
                $y += 4;
                $pdf->SetXY(16, $y);
                $pdf->SetFont('times', 'B', 11);
                if( $data_officials->position != "Punong Barangay"){
                    $pdf->MultiCell(65, 10, "Barangay Kagawad" ,0, 'C'); 
                }else{
                    $pdf->MultiCell(65, 10, $data_officials->position ,0, 'C');
                }
                $y += 13; // Adjust as needed based on spacing
            }

            $pdf->SetXY(80, 60); // Set position for data
            $pdf->SetFont('times', '', 12);
                $text = "       This is to certify that $bname, owned by $name has already ceased its operation on $currentDate within the jurisdiction of the Barangay with business address at $baddress.
        
        This certification is being issued for whatever legal purpose it may serve.";
            
            $pdf->MultiCell(115, 15, $text, 0, 'J');
//staring of purposes
       

            $pdf->SetXY(80, 130); 
            $date = date("jS \t\ F Y");
            $location = "Barangay 781, Zone 85, Sta. Ana, Manila, Philippines.";
            $text = "       SIGNED and ISSUED this $date at $location";
            $pdf->MultiCell(120, 20, $text, 0, 'L');

            $pdf->SetXY(135, 160);
            $pdf->SetFont('times', 'BU', 13);
            $pdf->Cell(0, 10, $data->name, 0, 1, 'C');
            $pdf->SetFont('times', 'B', 12);
            $pdf->SetXY(135, 166);
            $pdf->MultiCell(65, 10, "Owner/OIC – Manager" ,0, 'C');

            $pdf->SetXY(135, 200);
            $pdf->SetFont('times', 'BU', 13);
            $pdf->Cell(0, 10, $data_officials->name, 0, 1, 'C');
            $pdf->SetFont('times', 'B', 12);
            $pdf->SetXY(135, 206);
            if( $data_officials->position != "Punong Barangay"){
                $pdf->MultiCell(65, 10, "Barangay Kagawad" ,0, 'C'); 
            }else{
                $pdf->MultiCell(65, 10, $data_officials->position ,0, 'C');
            }

            $pdfFilePath = public_path('cert/') . $data->name . '-' . 'Certificate.pdf';
            $pdf->Output($pdfFilePath, 'F'); // Output to file
    
            // Return the URL to the generated PDF
            return response()->json(['url' => url('cert/' . $data->name . '-' . 'Certificate.pdf')]);
        }
        if ($type == "Solo Parents") {
            $data = SoloparentRequest::findOrFail($id);
            $regnumber = $data->reg_num;
            if($regnumber == "REG_00000000_01"){
                $data_infos = SoloparentRequest::where('reg_num', $regnumber)->firstOrFail();
                $address = $data_infos->address;
                $age = $data_infos->age;
                $name = $data_infos->name;
            }else{
                $name = strtoupper($data->name);
                $data_info = Resident::where('reg_number', $regnumber)->firstOrFail();
                $data_name = $data_info->lname . ', ' . $data_info->fname . ' ' . $data_info->mname . ' ' . $data_info->ext;
                $address = strtoupper($data_info->address);
                //$age = ($data_name == $data->name) ? $data_info->age : Member::where('reg_num', $regnumber)->firstOrFail()->age;
                if (trim($data_name) == trim($data->name)) {
                    $age = $data_info->age;
                } else {
                    $data_info = Member::where('reg_num', $regnumber)->firstOrFail();
                    $data_name = $data_info->lname . ', ' . $data_info->fname . ' ' . $data_info->mname . ' ' . $data_info->ext;
                    $age = $data_info->age;
                }
            }
            $data_officials = Official::where('name', $offcier)->firstOrFail();
            $officials = Official::where('status', "active")->get();
            $currentDate = Carbon::now()->format('F j, Y');
            $children = json_decode($data->children, true);
            $formattedChildren = [];
            foreach ($children as $index => $child) {
                $formattedChildren[] = ($index + 1) . '. ' . $child;
            }
            $childrenText = implode("\n", $formattedChildren);
            // Set initial Y position
            $y = 43;
            // Create TCPDF instance
            $pdf = new TCPDF();
            
            // Set document properties
            $pdf->SetCreator('Barangay 781 Zone 85');
            $pdf->SetTitle('Solo Parent Request');
            $pdf->SetSubject('Barangay Certificate');
            $pdf->SetKeywords('SP_Req');
            // Add a page
            $pdf->AddPage();
            // Display image as template
            $templatePath = public_path('cert/PDFDOCU/indigency.jpg');
            $pdf->Image($templatePath, 0, 0, 255, 327, '', '', '', false, 400, '', false, false, 0);
            if (!file_exists($templatePath)) {
                exec("gs -sDEVICE=jpeg -sOutputFile={$templatePath} -r300 {templatePath}");
            }
            // Set font
            $pdf->SetFont('times', '', 12);
            // Display data on top of the image
            $pdf->SetXY(97, 45); // Set position for data
            $pdf->SetFont('times', 'BU', 15);
            $pdf->Cell(0, 10, 'BARANGAY CERTIFICATE', 0, 1, 'L');
            foreach ($officials as $official) {
                // Set position for data
                $pdf->SetXY(15, $y);
                $pdf->SetFont('times', 'B', 12.5);
                $pdf->MultiCell(65, 10, $official->name, 1, 'C');
                $y += 4;
                $pdf->SetXY(16, $y);
                $pdf->SetFont('times', 'B', 11);
                if( $data_officials->position != "Punong Barangay"){
                    $pdf->MultiCell(65, 10, "Barangay Kagawad" ,0, 'C'); 
                }else{
                    $pdf->MultiCell(65, 10, $data_officials->position ,0, 'C');
                }
                $y += 13; // Adjust as needed based on spacing
            }

            $pdf->SetXY(80, 60); // Set position for data
            $pdf->SetFont('times', '', 12);
            if($data->voters == "Voters"){
                $text = "           This is to certify that $name, $age years old, is a registered voter and bonafide resident of this barangay with postal address at  $address";
            }else{
                $text = "           This is to certify that $name, $age years old, is a bonafide resident of this barangay with postal address at  $address";
            }
            $pdf->MultiCell(115, 15, $text, 0, 'J');
            $pdf->SetXY(80, 82); // Set position for data
            $pdf->SetFont('times', '', 12);
            $pdf->MultiCell(115, 15, "      This further certifies that the subject person is a SOLO PARENT living with his/her child/children, as follows:", 0, 'J');

            $pdf->SetXY(80, 97); // Set position for data
            $pdf->SetFont('times', 'B', 12);
            $pdf->MultiCell(115, 15, "NAME OF CHILD:", 0, 'L');

            $pdf->SetXY(80, 103); // Set position for data
            $pdf->SetFont('times', 'B', 12);
            $pdf->MultiCell(115, 15, $childrenText, 0, 'L');

            $pdf->SetXY(80, 135); // Set position for data
            $pdf->SetFont('times', '', 12);
            $pdf->MultiCell(115, 15, "      This certification is hereby issued upon the request of the above- subject person for $data->type purposes.
", 0, 'J');

            $pdf->SetXY(80, 150); 
            $date = date("jS \t\ F Y");
            $location = "Barangay 781, Zone 85, Sta. Ana, Manila, Philippines.";
            $text = "       SIGNED and ISSUED this $date at $location";
            $pdf->MultiCell(120, 20, $text, 0, 'L');

            $pdf->SetXY(135, 200);
            $pdf->SetFont('times', 'BU', 13);
            $pdf->Cell(0, 10, $data_officials->name, 0, 1, 'C');
            $pdf->SetFont('times', 'B', 12);
            $pdf->SetXY(135, 206);
            if( $data_officials->position != "Punong Barangay"){
                $pdf->MultiCell(65, 10, "Barangay Kagawad" ,0, 'C'); 
            }else{
                $pdf->MultiCell(65, 10, $data_officials->position ,0, 'C');
            }

            $pdfFilePath = public_path('cert/') . $data->name . '-' . 'Certificate.pdf';
            $pdf->Output($pdfFilePath, 'F'); // Output to file
    
            // Return the URL to the generated PDF
            return response()->json(['url' => url('cert/' . $data->name . '-' . 'Certificate.pdf')]);
        }
        if ($type == "First Time Job Seeker Oath Taking") {
            $data = FtjRequest::findOrFail($id);
            $regnumber = $data->reg_num;
            if($regnumber == "REG_00000000_01"){
               // $data_infos = FtjRequest::where('reg_num', $regnumber)->firstOrFail();
                $address = $data->address;
                $age = $data->age;
                $name = strtoupper($data->name);
            }else{
                $name = strtoupper($data->name);
                $data_info = Resident::where('reg_number', $regnumber)->firstOrFail();
                $data_name = $data_info->lname . ', ' . $data_info->fname . ' ' . $data_info->mname . ' ' . $data_info->ext;
                $address = strtoupper($data_info->address);
                //$age = ($data_name == $data->name) ? $data_info->age : Member::where('reg_num', $regnumber)->firstOrFail()->age;
                if (trim($data_name) == trim($data->name)) {
                    $age = $data_info->age;
                } else {
                    $data_info = Member::where('reg_num', $regnumber)->firstOrFail();
                    $data_name = $data_info->lname . ', ' . $data_info->fname . ' ' . $data_info->mname . ' ' . $data_info->ext;
                    $age = $data_info->age;
                }
            }
            $data_officials = Official::where('name', $offcier)->firstOrFail();
            $officials = Official::where('status', "active")->get();
            $currentDate = Carbon::now()->format('F j, Y');
            $y = 43;
            // Create TCPDF instance
            $pdf = new TCPDF();
            
            // Set document properties
            $pdf->SetCreator('Barangay 781 Zone 85');
            $pdf->SetTitle('First Time Job Seeker Oath Taking');
            $pdf->SetSubject('First Time job Seeker Certificate');
            $pdf->SetKeywords('FTJ_Req');
            // Add a page
            $pdf->AddPage();
            // Display image as template
            $templatePath = public_path('cert/PDFDOCU/ftj.jpg');
            $pdf->Image($templatePath, 0, 0, 255, 327, '', '', '', false, 400, '', false, false, 0);
            if (!file_exists($templatePath)) {
                exec("gs -sDEVICE=jpeg -sOutputFile={$templatePath} -r300 {templatePath}");
            }
            // Set font
            $pdf->SetFont('times', '', 12);
            // Display data on top of the image
            $pdf->SetXY(15, 53); // Set position for data
            $pdf->SetFont('times', '', 12);
            $pdf->MultiCell(180, 10, 'I, '.$name.', '.$age.' years of age, a resident of '.$address.' of Brgy. 781 Zone 85 District V for 20 years, is a qualified availee of the benefits of Republic Act 11261, otherwise known as the First Time Job-seekers Assistance Act of 2019, do hereby declare, agree and undertake to abide and be bound by the following;
            ', 0, 'J');

            $pdf->SetXY(20, 80); // Set position for data
            $pdf->SetFont('times', '', 12);
            $textLines = [
                "That this is the first time I was actively look for a job, and therefore requesting that barangay certification be issued in my favor to avail the benefits of the law;",
                "That I am aware that the benefit and privilege/s under the said law shall be valid only for one (1) year from the date that the barangay certification is issued;",
                "That I can avail the benefits of the law only once;",
                "That I understand that my personal information shall be included in the Roster/List of First Time Jobseekers and will not be used for any unlawful purpose;",
                "That I will inform and/or report to the Barangay personally, through text or other means, through my family/relatives once I get employed; and",
                "That I am not a beneficiary of the Job Start Program under R.A. No. 10869 and other laws that give similar exemptions for the documents or transaction exempted under R.A. No. 11261;",
                "That if issued the requested Certification, I will not use the same in any fraud, neither falsify nor help and/or assist in the fabrication of the said certification;",
                "That this undertaking is made solely for the purpose of obtaining a Barangay Certification consistent with the objective of R. A. No. 11261 and not for any other purpose;",
                "That I consent to the use of my personal information pursuant to the Data Privacy Act and other applicable laws, rules, and regulations."
            ];
            
            // Initialize formatted text
            $formattedText = '';
            
            // Add numbering to each line
            foreach ($textLines as $index => $line) {
                $formattedText .= ($index + 1) . ". $line\n";
            }
            // Output the formatted text
            $pdf->MultiCell(175, 10, $formattedText, 0, 'L');

            $pdf->SetXY(60, 180); 
            $date = date("jS \\of F Y");
            $text = "Signed this $date in the City of Manila.";
            $pdf->MultiCell(120, 20, $text, 0, 'L');

            $pdf->SetXY(135, 200);
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(0, 10, "Witnessed by:  ", 0, 1, 'C');

            $pdf->SetXY(40, 200);
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(0, 10, "Signed by:  ", 0, 1, 'L');

            $pdf->SetFont('times', 'B', 12);
            $pdf->SetXY(135, 230);
            $pdf->SetFont('times', 'BU', 13);
            $pdf->Cell(0, 10, $data_officials->name, 0, 1, 'C');

            $pdf->SetFont('times', '', 12);
            $pdf->SetXY(135, 236);
            if( $data_officials->position != "Punong Barangay"){
                $pdf->MultiCell(65, 10, "Barangay Kagawad" ,0, 'C'); 
            }else{
                $pdf->MultiCell(65, 10, $data_officials->position ,0, 'C');
            }
            $pdf->SetFont('times', 'B', 12);
            $pdf->SetXY(25, 230);
            $pdf->SetFont('times', 'BU', 13);
            $pdf->Cell(0, 10, $name, 0, 1, 'L');
            $pdf->SetFont('times', '', 12);
            $pdf->SetXY(25, 236);
            $pdf->MultiCell(65, 10, "First time job seeker" ,0, 'C');


            $pdf->SetFont('times', 'B', 12);
            $pdf->SetXY(135, 245);
            $pdf->SetFont('times', 'U', 13);
            $pdf->Cell(0, 10, date("F j, Y"), 0, 1, 'C');

            $pdf->SetFont('times', '', 12);
            $pdf->SetXY(135, 251);
            $pdf->MultiCell(65, 10, "Date" ,0, 'C');

            $pdf->SetXY(20,270); 
            $pdf->SetFont('times', '', 9);
            $text = "(VALID 100 DAYS WITH BARANGAY DRY SEAL)";
            $pdf->MultiCell(0, 0, $text, 0, 'C');

            $pdfFilePath = public_path('cert/') . $data->name . '-' . 'Certificate.pdf';
            $pdf->Output($pdfFilePath, 'F'); // Output to file
    
            // Return the URL to the generated PDF
            return response()->json(['url' => url('cert/' . $data->name . '-' . 'Certificate.pdf')]);
        }

        if ($type == "First Time Job Seeker") {
            $data = FtjRequest::findOrFail($id);
            $regnumber = $data->reg_num;
            if($regnumber == "REG_00000000_01"){
                //$data_infos = FtjRequest::where('reg_num', $regnumber)->firstOrFail();
                $address = $data->address;
                $age = $data->age;
                $name = strtoupper($data->name);
            }else{
                $name = strtoupper($data->name);
                $data_info = Resident::where('reg_number', $regnumber)->firstOrFail();
                $data_name = $data_info->lname . ', ' . $data_info->fname . ' ' . $data_info->mname . ' ' . $data_info->ext;
                $address = strtoupper($data_info->address);
                //$age = ($data_name == $data->name) ? $data_info->age : Member::where('reg_num', $regnumber)->firstOrFail()->age;
                if (trim($data_name) == trim($data->name)) {
                    $age = $data_info->age;
                } else {
                    $data_info = Member::where('reg_num', $regnumber)->firstOrFail();
                    $data_name = $data_info->lname . ', ' . $data_info->fname . ' ' . $data_info->mname . ' ' . $data_info->ext;
                    $age = $data_info->age;
                }
            }
            $data_officials = Official::where('name', $offcier)->firstOrFail();
            $officials = Official::where('status', "active")->get();
            $currentDate = Carbon::now()->format('F j, Y');
            $y = 43;
            // Create TCPDF instance
            $pdf = new TCPDF();
            
            // Set document properties
            $pdf->SetCreator('Barangay 781 Zone 85');
            $pdf->SetTitle('First Time Job Seeker');
            $pdf->SetSubject('Barangay Certificate');
            $pdf->SetKeywords('SP_Req');
            // Add a page
            $pdf->AddPage();
            // Display image as template
            $templatePath = public_path('cert/PDFDOCU/ftjtemp.jpg');
            $pdf->Image($templatePath, 0, 0, 255, 327, '', '', '', false, 400, '', false, false, 0);
            if (!file_exists($templatePath)) {
                exec("gs -sDEVICE=jpeg -sOutputFile={$templatePath} -r300 {templatePath}");
            }
            // Set font
            $pdf->SetFont('times', '', 12);
            // Display data on top of the image
            $pdf->SetXY(15, 62); // Set position for data
            $pdf->SetFont('times', '', 12);
            $pdf->MultiCell(180, 10, '          This is to certify that Mr./Ms. '.$name.', '.$age.' a resident of '.$address.' of Brgy. 781 Zone 85 District V for '.$data->number_day.', is a qualified availee of RA 11261 or the First Time Jobseekers Assistance Act of 2019.', 0, 'J');

            $pdf->SetXY(20, 80); // Set position for data
            $pdf->SetFont('times', '', 12);
            $textLines = "      I further certify the holder/bearer was informed of his/her rights, including the duties and responsibilities accorded by RA 11261 through the Oath of Undertaking he/she has signed and executed in the presence of the Barangay Officials.";

            // Output the formatted text
            $pdf->MultiCell(175, 10, $textLines, 0, 'J');

            $pdf->SetXY(40, 100); 
            $date = date("jS \\of F Y");
            $text = "Signed this $date in the City/Municipality of Manila";
            $pdf->MultiCell(120, 20, $text, 0, 'L');

            
            $pdf->SetXY(40, 100); 
            $date = date("jS \\of F Y", strtotime("+1 year"));
            $text = "This certification is valid only until $date one year from the issuance.";
            $pdf->cell(120, 20, $text, 0, 'L');

            
            $pdf->SetFont('times', 'B', 12);
            $pdf->SetXY(135, 150);
            $pdf->SetFont('times', 'BU', 13);
            $pdf->Cell(0, 10, "MANOLITO S. DIAZ", 0, 1, 'C');

            $pdf->SetFont('times', '', 12);
            $pdf->SetXY(135, 156);
            $pdf->MultiCell(65, 10, "Punong Barangay" ,0, 'C'); 

            $pdf->SetFont('times', 'B', 12);
            $pdf->SetXY(135, 170);
            $pdf->SetFont('times', 'U', 13);
            $pdf->Cell(0, 10, date("F j, Y"), 0, 1, 'C');

            $pdf->SetFont('times', '', 12);
            $pdf->SetXY(135, 176);
            $pdf->MultiCell(65, 10, "Date" ,0, 'C');

            $pdf->SetXY(135, 200);
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(0, 10, "Witnessed by:  ", 0, 1, 'C');

            $pdf->SetFont('times', 'B', 12);
            $pdf->SetXY(135, 220);
            $pdf->SetFont('times', 'BU', 13);
            $pdf->Cell(0, 10, $data_officials->name, 0, 1, 'C');

            $pdf->SetFont('times', '', 12);
            $pdf->SetXY(135, 226);
            if( $data_officials->position != "Punong Barangay"){
                $pdf->MultiCell(65, 10, "Barangay Kagawad" ,0, 'C'); 
            }else{
                $pdf->MultiCell(65, 10, $data_officials->position ,0, 'C');
            }

            $pdf->SetFont('times', 'B', 12);
            $pdf->SetXY(135, 245);
            $pdf->SetFont('times', 'U', 13);
            $pdf->Cell(0, 10, date("F j, Y"), 0, 1, 'C');

            $pdf->SetFont('times', '', 12);
            $pdf->SetXY(135, 251);
            $pdf->MultiCell(65, 10, "Date" ,0, 'C');


            $pdfFilePath = public_path('cert/') . $data->name . '-' . 'Certificate.pdf';
            $pdf->Output($pdfFilePath, 'F'); // Output to file
    
            // Return the URL to the generated PDF
            return response()->json(['url' => url('cert/' . $data->name . '-' . 'Certificate.pdf')]);
        }
        if ($type == "First Time Job seeker (Minor)") {
            $data = FtjRequest::findOrFail($id);
            $regnumber = $data->reg_num;
            if($regnumber == "REG_00000000_01"){
                //$data_infos = FtjRequest::where('reg_num', $regnumber)->firstOrFail();
                $address = $data->address;
                $age = $data->age;
                $name = strtoupper($data->name);
                $pname = strtoupper($data->pname);
                $page = strtoupper($data->page);
                $paddress = strtoupper($data->paddress);
            }else{
                $name = strtoupper($data->name);
                $pname = strtoupper($data->pname);
                $page = strtoupper($data->page);
                $paddress = strtoupper($data->paddress);
                $data_info = Resident::where('reg_number', $regnumber)->firstOrFail();
                $data_name = $data_info->lname . ', ' . $data_info->fname . ' ' . $data_info->mname . ' ' . $data_info->ext;
                $address = strtoupper($data_info->address);
                //$age = ($data_name == $data->name) ? $data_info->age : Member::where('reg_num', $regnumber)->firstOrFail()->age;
                if (trim($data_name) == trim($data->name)) {
                    $age = $data_info->age;
                } else {
                    $data_info = Member::where('reg_num', $regnumber)->firstOrFail();
                    $data_name = $data_info->lname . ', ' . $data_info->fname . ' ' . $data_info->mname . ' ' . $data_info->ext;
                    $age = $data_info->age;
                }
            }
            $data_officials = Official::where('name', $offcier)->firstOrFail();
            $officials = Official::where('status', "active")->get();
            $currentDate = Carbon::now()->format('F j, Y');
            $y = 43;
            // Create TCPDF instance
            $pdf = new TCPDF();
            
            // Set document properties
            $pdf->SetCreator('Barangay 781 Zone 85');
            $pdf->SetTitle('First Time Job seeker');
            $pdf->SetSubject('First Time Job seeker');
            $pdf->SetKeywords('FTJ_Req');
            // Add a page
            $pdf->AddPage();
            // Display image as template
            $templatePath = public_path('cert/PDFDOCU/ftj.jpg');
            $pdf->Image($templatePath, 0, 0, 255, 327, '', '', '', false, 400, '', false, false, 0);
            if (!file_exists($templatePath)) {
                exec("gs -sDEVICE=jpeg -sOutputFile={$templatePath} -r300 {templatePath}");
            }
            // Set font
            $pdf->SetFont('times', '', 12);
            // Display data on top of the image
            $pdf->SetXY(15, 53); // Set position for data
            $pdf->SetFont('times', '', 12);
            $pdf->MultiCell(180, 10, 'I, '.$name.', '.$age.' years of age, a resident of '.$address.' of Brgy. 781 Zone 85 District V for 20 years, is a qualified availee of the benefits of Republic Act 11261, otherwise known as the First Time Job-seekers Assistance Act of 2019, do hereby declare, agree and undertake to abide and be bound by the following;
            ', 0, 'J');

            $pdf->SetXY(20, 80); // Set position for data
            $pdf->SetFont('times', '', 12);
            $textLines = [
                "That this is the first time I was actively look for a job, and therefore requesting that barangay certification be issued in my favor to avail the benefits of the law;",
                "That I am aware that the benefit and privilege/s under the said law shall be valid only for one (1) year from the date that the barangay certification is issued;",
                "That I can avail the benefits of the law only once;",
                "That I understand that my personal information shall be included in the Roster/List of First Time Jobseekers and will not be used for any unlawful purpose;",
                "That I will inform and/or report to the Barangay personally, through text or other means, through my family/relatives once I get employed; and",
                "That I am not a beneficiary of the Job Start Program under R.A. No. 10869 and other laws that give similar exemptions for the documents or transaction exempted under R.A. No. 11261;",
                "That if issued the requested Certification, I will not use the same in any fraud, neither falsify nor help and/or assist in the fabrication of the said certification;",
                "That this undertaking is made solely for the purpose of obtaining a Barangay Certification consistent with the objective of R. A. No. 11261 and not for any other purpose;",
                "That I consent to the use of my personal information pursuant to the Data Privacy Act and other applicable laws, rules, and regulations."
            ];
            
            // Initialize formatted text
            $formattedText = '';
            
            // Add numbering to each line
            foreach ($textLines as $index => $line) {
                $formattedText .= ($index + 1) . ". $line\n";
            }
            // Output the formatted text
            $pdf->MultiCell(175, 10, $formattedText, 0, 'L');

            $pdf->SetXY(60, 175); 
            $date = date("jS \\of F Y");
            $text = "Signed this $date in the City of Manila.";
            $pdf->MultiCell(120, 20, $text, 0, 'L');

            $pdf->SetXY(135, 185);
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(0, 10, "Witnessed by:  ", 0, 1, 'C');

            $pdf->SetXY(40, 185);
            $pdf->SetFont('times', 'B', 12);
            $pdf->Cell(0, 10, "Signed by:  ", 0, 1, 'L');

            $pdf->SetFont('times', 'B', 12);
            $pdf->SetXY(135, 195);
            $pdf->SetFont('times', 'BU', 13);
            $pdf->Cell(0, 10, $data_officials->name, 0, 1, 'C');

            $pdf->SetFont('times', '', 12);
            $pdf->SetXY(135, 201);
            if( $data_officials->position != "Punong Barangay"){
                $pdf->MultiCell(65, 10, "Barangay Kagawad" ,0, 'C'); 
            }else{
                $pdf->MultiCell(65, 10, $data_officials->position ,0, 'C');
            }
            $pdf->SetFont('times', 'B', 12);
            $pdf->SetXY(25, 195);
            $pdf->SetFont('times', 'BU', 13);
            $pdf->Cell(0, 10, $name, 0, 1, 'L');
            $pdf->SetFont('times', '', 12);
            $pdf->SetXY(25, 201);
            $pdf->MultiCell(65, 10, "First time job seeker" ,0, 'C');

            $pdf->SetXY(10,210); 
            $pdf->SetFont('times', 'B', 9);
            $text = "______________________________________________________________________________________________________________________For the applicants at least fifteen years old to less than 18 years of age:";
            $pdf->MultiCell(0, 0, $text, 0, 'C');

            $pdf->SetFont('times', '', 12);
            $pdf->SetXY(15, 219);
            $pdf->MultiCell(180, 10, "          I, $pname, $page  years of age, parent/guardian of $name, and a resident of $paddress for $data->number_day , do hereby give my consent for my child/dependent to avail the benefits of Republic Act 11261 and be bound by the abovementioned conditions." ,0, 'J');

            $pdf->SetXY(20, 240);
            $pdf->SetFont('times', 'B', 12);
            $pdf->MultiCell(0, 10, "Signed by:  ", 0, 'C');
            $pdf->SetXY(20, 255);
            $pdf->SetFont('times', 'BU', 12);
            $pdf->MultiCell(0, 10, $pname, 0, 'C');
            $pdf->SetXY(20, 261);
            $pdf->SetFont('times', '', 12);
            $pdf->MultiCell(0, 10, "Parent/Guardian", 0, 'C');

            $pdf->SetXY(20,273); 
            $pdf->SetFont('times', '', 9);
            $text = "(VALID 100 DAYS WITH BARANGAY DRY SEAL)";
            $pdf->MultiCell(0, 0, $text, 0, 'C');

            $pdfFilePath = public_path('cert/') . $data->name . '-' . 'Certificate.pdf';
            $pdf->Output($pdfFilePath, 'F'); // Output to file
    
            // Return the URL to the generated PDF
            return response()->json(['url' => url('cert/' . $data->name . '-' . 'Certificate.pdf')]);
        }
       
    }
    public function sendAllEmailNotificationCert(Request $request)
{
    $type = $request->input('type');
    Log::info('Received request to approve all of type:', ['type' => $type]);

    try {
        // Find all pending requests based on the type
        switch ($type) {
            case "First Time Job Seeker":
                $residents = FtjRequest::where('status', 'Pending')->get();
                break;
            case "Business Cessation":
                $residents = BusinessCessation::where('status', 'Pending')->get();
                break;
            case "Business Permit":
                $residents = BusinessPermit::where('status', 'Pending')->get();
                break;
            case "Barangay Certificate":
                $residents = CertificateRequest::where('status', 'Pending')->get();
                break;
            case "Barangay Indigency":
                $residents = IndigencyRequest::where('status', 'Pending')->get();
                break;
            case "Solo Parents":
                $residents = SoloparentRequest::where('status', 'Pending')->get();
                break;
            default:
                Log::error('No valid database found for type: ' . $type);
                return response()->json(['error' => 'Invalid request type'], 400);
        }

        // Loop through each resident, update status and send email
        foreach ($residents as $resident) {
            try {
                $email = $resident->email;
                $subject = "Document Approval Notification";
                $body = "Your document request is now being processed.";

                // Send email
                Mail::to($email)->send(new AccountApprovalNotification($subject, $body));

                // Update the status to 'Approved'
                $resident->status = 'Approved';
                $resident->save();

                Log::info('Email sent and status updated for resident ID:', ['id' => $resident->id]);
            } catch (\Exception $e) {
                Log::error('Error sending email or updating resident ID ' . $resident->id . ': ' . $e->getMessage());
            }
        }

        return response()->json(['success' => true, 'message' => 'All pending requests approved and emails sent.']);
    } catch (\Exception $e) {
        Log::error('Error processing approval request: ' . $e->getMessage());
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}

    public function sendEmailNotificationCert(Request $request)
{
    // Retrieve the resident ID from the request
    $email = $request->input('email');
    $type = $request->input('type');
    $id = $request->input('id');
    Log::info('Received resident email:', ['email' => $email]);
    try {
        if($type == "First Time Job Seeker"||$type == "First Time Job seeker (Minor)"||$type == "First Time Job Seeker Oath Taking" ){
            $resident = FtjRequest::findOrFail($id);
        }else if($type == "Business Cessation"){
            $resident = BusinessCessation::findOrFail($id);
        }else if($type == "Business Permit"){
            $resident = BusinessPermit::findOrFail($id);
        }else if($type == "Barangay Certificate"){
            $resident = CertificateRequest::findOrFail($id);
        }else if($type == "Barangay Indigency"){
            $resident = IndigencyRequest::findOrFail($id);
        }else if($type == "Solo Parents"){
            $resident = SoloparentRequest::findOrFail($id);
        }else{
         Log::error('No dataBases Found');
        }
        // Fetch the resident based on the ID
        Log::info('Retrieved email:', ['email_resident' => $email]);
        Log::info('Resident Email:', ['email' => $email]);
        $subject="Document Approval Notification";
        $Body = "Your Document Request are now in Process";
        // Send email notification using Mailable class
        try {
            Mail::to($email)->send(new AccountApprovalNotification($subject, $Body));
            $resident->status = 'Approved';
            $resident->save();
        } catch (\Exception $e) {
            Log::error('Exception while sending email: ' . $e->getMessage());
        }
        return response()->json(['success' => true]);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        Log::error('Error sending email notification: Resident with ID ' . $id . ' not found');
        return response()->json(['error' => 'Resident not found'], 404);
    } catch (\Exception $e) {
        Log::error('Error sending email notification: ' . $e->getMessage());
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}

public function sendEmailNotificationDecline(Request $request)
{
    // Retrieve the resident ID from the request
    $email = $request->input('email');
    $type = $request->input('type');
    $id = $request->input('id');
    $text = $request->input('text');
    $regnum = $request->input('controlnum');
    Log::info('Received resident email:', ['email' => $email]);
    try {
        if(empty($text)){
         return response()->json(['error' => 'Decline Message is Empty'], 422);
        }
        if($type == "First Time Job Seeker"||$type == "First Time Job seeker (Minor)"||$type == "First Time Job Seeker Oath Taking" ){
            $resident = FtjRequest::findOrFail($id);
        }else if($type == "Business Cessation"){
            $resident = BusinessCessation::findOrFail($id);
        }else if($type == "Business Permit"){
            $resident = BusinessPermit::findOrFail($id);
        }else if($type == "Barangay Certificate"){
            $resident = CertificateRequest::findOrFail($id);
        }else if($type == "Barangay Indigency"){
            $resident = IndigencyRequest::findOrFail($id);
        }else if($type == "Solo Parents"){
            $resident = SoloparentRequest::findOrFail($id);
        }else{
         Log::error('No dataBases Found');
        }
        // Fetch the resident based on the ID
        Log::info('Retrieved email:', ['email_resident' => $email]);
        Log::info('Resident Email:', ['email' => $email]);
        $subject="Document Declined Notification";
        $Body = "Controll Number: ".$regnum."\n"."Certificate Request: ".$type."\n"."To Mr./Ms: \n".$text;
        // Send email notification using Mailable class
        try {
            Mail::to($email)->send(new AccountApprovalNotification($subject, $Body));
            $resident->status = 'Declined';
            $resident->save();
        } catch (\Exception $e) {
            Log::error('Exception while sending email: ' . $e->getMessage());
        }
        return response()->json(['success' => true]);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        Log::error('Error sending email notification: Resident with ID ' . $id . ' not found');
        return response()->json(['error' => 'Resident not found'], 404);
    } catch (\Exception $e) {
        Log::error('Error sending email notification: ' . $e->getMessage());
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}
public function sendEmailNotificationClaim(Request $request)
{
    // Retrieve the resident ID from the request
    $email = $request->input('email');
    $type = $request->input('type');
    $id = $request->input('id');
    Log::info('Received resident email:', ['email' => $email]);
    try {
        if($type == "First Time Job Seeker"||$type == "First Time Job seeker (Minor)"||$type == "First Time Job Seeker Oath Taking" ){
            $resident = FtjRequest::findOrFail($id);
        }else if($type == "Business Cessation"){
            $resident = BusinessCessation::findOrFail($id);
        }else if($type == "Business Permit"){
            $resident = BusinessPermit::findOrFail($id);
        }else if($type == "Barangay Certificate"){
            $resident = CertificateRequest::findOrFail($id);
        }else if($type == "Barangay Indigency"){
            $resident = IndigencyRequest::findOrFail($id);
        }else if($type == "Solo Parents"){
            $resident = SoloparentRequest::findOrFail($id);
        }else{
         Log::error('No dataBases Found');
        }
        // Fetch the resident based on the ID
        Log::info('Retrieved email:', ['email_resident' => $email]);
        Log::info('Resident Email:', ['email' => $email]);
        $subject="Document Ready to Be Claimed";
        $Body = "Your Document Request are now Ready to claim. Please Present the Controll Number of the Document and 1 valid ID.";
        // Send email notification using Mailable class
        try {
            Mail::to($email)->send(new AccountApprovalNotification($subject, $Body));
            $resident->status = 'Ready To claim';
            $resident->save();
        } catch (\Exception $e) {
            Log::error('Exception while sending email: ' . $e->getMessage());
        }
        return response()->json(['success' => true]);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        Log::error('Error sending email notification: Resident with ID ' . $id . ' not found');
        return response()->json(['error' => 'Resident not found'], 404);
    } catch (\Exception $e) {
        Log::error('Error sending email notification: ' . $e->getMessage());
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}
public function sendEmailNotificationClaimed(Request $request)
{
    // Retrieve the resident ID from the request
    $email = $request->input('email');
    $type = $request->input('type');
    $id = $request->input('id');
    Log::info('Received resident email:', ['email' => $email]);
    try {
        if($type == "First Time Job Seeker"||$type == "First Time Job seeker (Minor)"||$type == "First Time Job Seeker Oath Taking" ){
            $resident = FtjRequest::findOrFail($id);
        }else if($type == "Business Cessation"){
            $resident = BusinessCessation::findOrFail($id);
        }else if($type == "Business Permit"){
            $resident = BusinessPermit::findOrFail($id);
        }else if($type == "Barangay Certificate"){
            $resident = CertificateRequest::findOrFail($id);
        }else if($type == "Barangay Indigency"){
            $resident = IndigencyRequest::findOrFail($id);
        }else if($type == "Solo Parents"){
            $resident = SoloparentRequest::findOrFail($id);
        }else{
         Log::error('No dataBases Found');
        }
        // Fetch the resident based on the ID
        Log::info('Retrieved email:', ['email_resident' => $email]);
        Log::info('Resident Email:', ['email' => $email]);

        try {
            $resident->status = 'Claimed';
            $resident->save();
        } catch (\Exception $e) {
            Log::error('Exception while sending email: ' . $e->getMessage());
        }
        return response()->json(['success' => true]);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        Log::error('Error sending email notification: Resident with ID ' . $id . ' not found');
        return response()->json(['error' => 'Resident not found'], 404);
    } catch (\Exception $e) {
        Log::error('Error sending email notification: ' . $e->getMessage());
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}
public function getCertificates() {
    // Get current year
    $currentYear = Carbon::now()->year;

    // Define the range of years (from 2023 to the current year)
    $startYear = 2023;
    $endYear = $currentYear;

    // Initialize an array to hold the counts for each month for each certificate type
    $certificatesCount = [
        'indigency_requests' => [],
        'ftj_requests' => [],
        'certificate_requests' => [],
        'business_cessation' => [],
        'business_permit' => [],
        'solo_parent_request' => []
    ];

    // Loop through each month (1 to 12)
    for ($month = 1; $month <= 12; $month++) {
        // Loop through each year in the defined range
        for ($year = $startYear; $year <= $endYear; $year++) {
            // Count the number of certificates for each type for the specified year and month
            $certificatesCount['indigency_requests'][$month][$year] = IndigencyRequest::whereYear('created_at', $year)
                ->where('status', 'Claimed')
                ->whereMonth('created_at', $month)
                ->sum('copy');
    
            $certificatesCount['ftj_requests'][$month][$year] = FtjRequest::whereYear('created_at', $year)
                ->where('status', 'Claimed')
                ->whereMonth('created_at', $month)
                ->sum('copy');
    
            $certificatesCount['certificate_requests'][$month][$year] = CertificateRequest::whereYear('created_at', $year)
                ->where('status', 'Claimed')
                ->whereMonth('created_at', $month)
                ->sum('copy');
    
            $certificatesCount['business_cessation'][$month][$year] = BusinessCessation::whereYear('created_at', $year)
                ->where('status', 'Claimed')
                ->whereMonth('created_at', $month)
                ->sum('copy');
    
            $certificatesCount['business_permit'][$month][$year] = BusinessPermit::whereYear('created_at', $year)
                ->where('status', 'Claimed')
                ->whereMonth('created_at', $month)
                ->sum('copy');
    
            $certificatesCount['solo_parent_request'][$month][$year] = SoloParentRequest::whereYear('created_at', $year)
                ->where('status', 'Claimed')
                ->whereMonth('created_at', $month)
                ->sum('copy');
        }
    }
    

    // Transform the data for Chart.js
    $chartData = [
        'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        'datasets' => []
    ];

    // Prepare the dataset for each certificate type
    $colors = [
        'indigency_requests' => 'rgba(75, 192, 192, 0.5)',
        'ftj_requests' => 'rgba(255, 99, 132, 0.5)',
        'certificate_requests' => 'rgba(255, 206, 86, 0.5)',
        'business_cessation' => 'rgba(54, 162, 235, 0.5)',
        'business_permit' => 'rgba(153, 102, 255, 0.5)',
        'solo_parent_request' => 'rgba(255, 159, 64, 0.5)'
    ];

    // Add datasets for each certificate type
    foreach ($certificatesCount as $type => $monthsData) {
        $data = [];
        foreach (range(1, 12) as $month) {
            $yearData = [];
            foreach (range($startYear, $endYear) as $year) {
                $yearData[] = $monthsData[$month][$year] ?? 0; // Get count for each year or 0 if not set
            }
            $data[] = array_sum($yearData); // Sum the counts for each month
        }

        $chartData['datasets'][] = [
            'label' => ucwords(str_replace('_', ' ', $type)), // Convert type to a more readable format
            'data' => $data,
            'backgroundColor' => $colors[$type],
            'borderColor' => $colors[$type],
            'borderWidth' => 1
        ];
    }

    return response()->json($chartData);    

}      
}
