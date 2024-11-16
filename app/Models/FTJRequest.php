<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FTJRequest extends Model
{
    protected $table = 'ftj_requests';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'reg_num',
        'type',
        'voters',
        'name',
        'copy',
        'number_day',
        'requirements',
        'parentrequirements',
        'pname',
        'paddress',
        'page',
    ];
    public function residents()
    {
        return $this->belongsTo(Resident::class, 'reg_num', 'reg_number');
    }
    // You can define relationships or additional methods here
}
