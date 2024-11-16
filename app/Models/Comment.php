<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'id_form', 'name','profile'];

    public function forum()
    {
        return $this->belongsTo(Forum::class, 'id');
    }

    // Define relationships if any
}
