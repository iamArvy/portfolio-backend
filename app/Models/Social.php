<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $table = 'socials';
    protected $fillable = [
        'name',
        'url',
        'handle',
    ];
    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
