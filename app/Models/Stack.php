<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stack extends Model
{
    use HasFactory;
    protected $table = 'stacks';
    protected $fillable = [
        'name',
        'level',
    ];

}
