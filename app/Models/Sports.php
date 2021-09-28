<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sports extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'color',
    ];

    /**
     * get the sports' publications
     */
    public function articles(){
        return $this->hasMany(Article::class);
    }

    /**
     * get the sports' publications
     */
    public function videos(){
        return $this->hasMany(Video::class);
    }
}
