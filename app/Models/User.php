<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userSkill(){
        return $this->hasOne(Skill::class, 'user_id');
    }
    public function userExperience(){
        return $this->hasOne(Experience::class, 'user_id');
    }
    public function userQualifcation(){
        return $this->hasOne(Qualifcation::class, 'user_id');
    }
    public function userCourse(){
        return $this->hasOne(Course::class, 'user_id');
    }
}
