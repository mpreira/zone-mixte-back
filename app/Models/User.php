<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use App\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'preferences' => 'array',
        'first_logged_in' => 'datetime',
        'last_logged_in' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    /**
     * get the user's roles
     */
    public function roles(){
        return $this->belongsToMany(Role::class, 'user_role');
    }

//    /**
//     * get the user's comments
//     */
//    public function comments(){
//        return $this->hasMany(Comment::class, 'user_comment');
//    }

    /**
     * Hash password when needed.
     * @param  string  $password
     * @return void
     */
//    public function setPasswordAttribute($password)
//    {
//        $this->attributes['password'] = Hash::needsRehash($password)
//            ? Hash::make($password)
//            : $password;
//    }

}
