<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessPermit extends Model
{
    
    protected $fillable = [
        'voters',
        'name',
        'copy',
        'bname',
        'baddress',
        'requirements'
    ];
    public function resident()
    {
        return $this->belongsTo(Resident::class, 'reg_num', 'reg_number');
    }
}
