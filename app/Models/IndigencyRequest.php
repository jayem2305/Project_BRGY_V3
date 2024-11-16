<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndigencyRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'reg_num',
        'indigency',
        'voters',
        'name',
        'copy',
        'requirements',
        'purpose',
        'otherpurpose',
        'status',
    ];

    // Define the relationship with the Resident model
    public function resident()
    {
        return $this->belongsTo(Resident::class, 'reg_num', 'reg_number');
    }
}
