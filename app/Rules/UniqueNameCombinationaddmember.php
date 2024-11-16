<?php

namespace App\Rules;

use App\Models\Resident;
use App\Models\Member;
use Illuminate\Contracts\Validation\Rule;

class UniqueNameCombinationaddmember implements Rule
{
    public function passes($attribute, $value)
{
    $lname = request()->input('lname_editmember');
    $fname = request()->input('fname_editmember');
    $mname = request()->input('mname_editmember');
    $ext = request()->input('ext_editmember');
    $reg_number = request()->input('id_editmember');

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
