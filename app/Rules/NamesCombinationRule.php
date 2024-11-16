<?php
// app/Rules/NamesCombinationRule.php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Resident;

class NamesCombinationRule implements Rule
{
    public function passes($attribute, $value)
    {
        // Split the names into an array
        $names = explode(' ', $value);

        // Ensure there are at least two names
        if (count($names) < 2) {
            return false;
        }

        // Get the last name and remove it from the array
        $lname = array_pop($names);
        $fname = implode(' ', $names);

        // Check if the combination of names already exists in the database
        $exists = Resident::where('fname', $fname)
                          ->where('lname', $lname);

        // If mname is provided, include it in the query
        if (!empty($names)) {
            $mname = array_pop($names);
            $exists->where('mname', $mname);
        } else {
            // If mname is not provided, check for null or empty mname
            $exists->where(function ($query) {
                $query->whereNull('mname')
                      ->orWhere('mname', '');
            });
        }

        return !$exists->exists();
    }

    public function message()
    {
        return 'The combination of provided names already exists.';
    }
}


?>