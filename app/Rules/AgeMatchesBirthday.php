<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class AgeMatchesBirthday implements Rule
{
    public function passes($attribute, $value)
    {
        // Get the birthday value from the input
        $birthday = request()->input('birthday');

        // Calculate age from birthday
        $age = Carbon::parse($birthday)->age;

        // Check if the provided age matches the calculated age
        return $age == $value;
    }

    public function message()
    {
        return 'The provided age does not match the calculated age from the birthday.';
    }
}
?>