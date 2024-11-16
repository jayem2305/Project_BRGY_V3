<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\FTJRequest;
use App\Models\IndigencyRequest;
use App\Models\CertificateRequest;
use App\Models\BusinessPermit;
use App\Models\BusinessCessation;
use App\Models\SoloParentRequest;

class StatisticsController extends Controller
{
    public function getResidentsAndMembers()
    {
        // Fetch resident data with status "Resident"
        $residents = Resident::whereIn('status', ['Resident', 'Restricted'])->get();
        // Fetch member data
        $members = Member::whereIn('status', ['Resident', 'Restricted'])->get();
        // Combine resident and member data into a single array
        $data = [
            'residents' => $residents,
            'members' => $members,
        ];
        Log::info('Retrieved Data:', ['Datas: ' => $data]);

        return response()->json($data);
    }
    public function sumCopies(Request $request)
    {
        $year = $request->input('year');
        
        $data = $this->getMonthlyData(FTJRequest::class, $year)
            ->union($this->getMonthlyData(IndigencyRequest::class, $year))
            ->union($this->getMonthlyData(CertificateRequest::class, $year))
            ->union($this->getMonthlyData(BusinessPermit::class, $year))
            ->union($this->getMonthlyData(BusinessCessation::class, $year))
            ->union($this->getMonthlyData(SoloParentRequest::class, $year))
            ->get();

        $monthlyData = [];

        foreach ($data as $row) {
            $month = $row->month;
            $week = $row->week;
            if (!isset($monthlyData[$month])) {
                $monthlyData[$month] = ['1' => 0, '2' => 0, '3' => 0, '4' => 0];
            }
            if ($week >= 1 && $week <= 4) {
                $monthlyData[$month][$week] += $row->total_copies;
            }
        }

        return response()->json(['monthlyData' => $monthlyData]);
    }

    private function getMonthlyData($model, $year)
    {
        return DB::table((new $model)->getTable())
            ->select(DB::raw('MONTH(created_at) as month, FLOOR((DAY(created_at)-1)/7)+1 as week, SUM(copy) as total_copies'))
            ->whereYear('created_at', $year)
            ->groupBy('month', 'week');
    }
}
