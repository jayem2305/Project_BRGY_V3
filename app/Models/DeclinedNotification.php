<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeclinedNotification extends Model
{
    protected $fillable = [
        'resident_id', 'name', 'comment'
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
