<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lawincome extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'lawofincome';

    // Specify the fillable properties for mass assignment
    protected $fillable = [
        'email',
        'reg_num',
        'type',
        'voters',
        'name',
        'copy',
        'requirements',
        'purpose',
        'age',
        'address',
        'cnum',
        'status',
    ];

    // Define relationships
    public function resident()
    {
        return $this->belongsTo(Resident::class, 'reg_num', 'reg_number');
    }
}
