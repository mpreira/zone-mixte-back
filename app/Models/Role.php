<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $fillable = [
        'name',
        'display_name'
    ];

    /**
     * get the role's users
     */
    public function users(){
        return $this->belongsToMany(User::class, 'role_user');
    }
}
