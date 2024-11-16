<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckAtLeastOneCheckbox implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if at least one checkbox is checked
        return is_array($value) && count($value) > 0;
    }

    public function message()
    {
        return 'At least one checkbox must be checked.';
    }
}

