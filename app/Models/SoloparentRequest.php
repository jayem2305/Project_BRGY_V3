<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoloParentRequest extends Model
{
    use HasFactory;
    protected $table = 'solo_parent_requests';

    protected $fillable = [
        'reg_num',
        'type',
        'voters',
        'name',
        'copy',
        'requirements',
        'children',
        // Add other fillable attributes here
    ];
    public function resident()
    {
        return $this->belongsTo(Resident::class, 'reg_num', 'reg_number');
    }
    // Define any relationships or custom methods here
}
