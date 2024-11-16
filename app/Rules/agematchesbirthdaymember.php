<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class agematchesbirthdaymember implements Rule
{
    public function passes($attribute, $value)
    {
        // Get the birthday value from the input
        $birthday_member = request()->input('bday_member');

        // Calculate age from birthday
        $age_member = Carbon::parse($birthday_member)->age;

        // Check if the provided age matches the calculated age
        return $age_member == $value;
    }

    public function message()
    {
        return 'The provided age does not match the calculated age from the birthday.';
    }
}
