<?php

namespace App\Rules;

use App\Models\Resident;
use App\Models\Member;
use Illuminate\Contracts\Validation\Rule;

class UniqueNameCombinationupdate implements Rule
{
    public function passes($attribute, $value)
{
    $lname = request()->input('lname');
    $fname = request()->input('fname');
    $mname = request()->input('mname');
    $ext = request()->input('ext');
    $reg_number = request()->input('reg_number');

    // Check in Resident model
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

    $residentQuery->where('reg_number', '!=', $reg_number);

    $residentCount = $residentQuery->count();

    // Check in Member model
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

    $memberCount = $memberQuery->count();

    // If the combination exists in either Resident or Member, return false
    return $residentCount === 0 && $memberCount === 0;
}

    
    public function message()
    {
        return 'The combination of Name is already exists.';
    }
}
