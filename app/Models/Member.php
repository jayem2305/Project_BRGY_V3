<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'lname_member',
        'fname_member',
        'mname_member',
        'ext_member',
        'household_member',
        'birth_member',
        'bday_member',
        'age_member',
        'gender_member',
        'civil_member',
        'citizenship_member',
        'occupation_member',
        'indicate_if_member',
        'valid_id_member',
        'image_member',
        'voters_member',
        // Add other fillable fields here as needed
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
