<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function info(){
        if($this->hasOne(Info::class)){
            return $this->hasOne(Info::class);
        }
    }
    public function certifications(){
        if($this->hasMany(Certification::class)){
            return $this->hasMany(Certification::class);
        }
    }
    public function projects(){
        return $this->hasMany(Project::class);
    }
    public function stacks(){
        if($this->hasMany(Stack::class)){
            return $this->hasMany(Stack::class);
        }
    }
    public function messages(){
        if($this->hasMany(Message::class)){
            return $this->hasMany(Message::class);
        }
    }
    public function socials(){
        if($this->hasMany(Social::class)){
            return $this->hasMany(Social::class);
        }
    }
    public function experience(){
        if($this->hasMany(Experience::class)){
            return $this->hasMany(Experience::class);
        }
    }
}
