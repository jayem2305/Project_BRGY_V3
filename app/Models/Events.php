<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'start_time',
        'end_time',
        'Type_of_event',
        'status',
        // Add any other fillable fields here
    ];
}
