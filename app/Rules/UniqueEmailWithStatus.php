<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Resident;

class UniqueEmailWithStatus implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        // Check if there is any resident with the given email and status 'Resident' or 'Pending'
        $count = Resident::where('email', $value)
                        ->whereIn('status', ['Resident', 'Pending'])
                        ->count();

        return $count === 0;
    }

    public function message()
    {
        return 'The email has already been taken.';
    }
}
