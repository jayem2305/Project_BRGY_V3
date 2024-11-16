<?php

namespace App\Rules;

use App\Models\Resident;
use App\Models\Member;
use Illuminate\Contracts\Validation\Rule;

class UniqueNameCombination implements Rule
{
    public function passes($attribute, $value)
    {
        $lname = request()->input('lname');
        $fname = request()->input('fname');
        $mname = request()->input('mname');
        $ext = request()->input('ext');
    
        $residentQuery = Resident::where('lname', $lname)
            ->where('fname', $fname);
        if ($mname !== null) {
            $residentQuery->where('mname', $mname);
        } else {
            $residentQuery->whereNull('mname');
        }
        if ($ext !== null) {
            $residentQuery->where('ext', $ext);
        } else {
            $residentQuery->whereNull('ext');
        }
    
        $memberQuery = Member::where('lname', $lname)
            ->where('fname', $fname);
        if ($mname !== null) {
            $memberQuery->where('mname', $mname);
        } else {
            $memberQuery->whereNull('mname');
        }
        if ($ext !== null) {
            $memberQuery->where('ext', $ext);
        } else {
            $memberQuery->whereNull('ext');
        }
    
        $residentCount = $residentQuery->count();
        $memberCount = $memberQuery->count();
    
        return ($residentCount + $memberCount) === 0;
    }
    

    public function message()
    {
        return 'The combination of Name is already exists.';
    }
}
