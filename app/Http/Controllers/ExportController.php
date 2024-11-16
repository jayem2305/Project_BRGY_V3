<?php 
// app/Http/Controllers/ExportController.php
namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Exports\TableExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Date;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
class ExportController extends Controller
{
    public function export(Request $request)
    {
        $filters = [
            'name' => $request->input('name'),
            'minage' => $request->input('minage'),
            'maxage' => $request->input('maxage'),
            'address' => $request->input('address'),
            'voters' => $request->input('voters'),
            'sex' => $request->input('sex'),
            'status' => $request->input('status')
        ];
    
        return Excel::download(new DataExport($filters), 'RECORD OF BARANGAY INHABITANTS.xlsx');
    }
    public function exportExcel(Request $request)
    {
        $tableData = $request->input('tableData');
        
        // Transform the table data array into a format suitable for the export class
        $formattedData = [];
        foreach ($tableData as $rowData) {
            $formattedData[] = [
                'Month' => $rowData[0],
                '1st Week' => $rowData[1],
                '2nd Week' => $rowData[2],
                '3rd Week' => $rowData[3],
                '4th Week' => $rowData[4],
                'Total' => $rowData[5]
            ];
        }
    
        // Create Excel file
        $today = now()->format('Y-m-d');
        $fileName = 'Report_' . $today . '.xlsx';
    
      return Excel::download(new TableExport($formattedData), $fileName);
    }
    
    
public function downloadExcel($filename)
{
    return response()->download(public_path('excel/' . $filename));
}
}
