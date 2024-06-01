<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;
    protected $table = 'info';
    protected $fillable = [
        'name',
        'nickname',
        'brand',
        'other_nickname',
        'gender',
        'job_desc',
        'origin',
        'currently',
        'phone',
        'cv'
    ];

}
