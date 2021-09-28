<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'content',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'published_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     *
     *
     */
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     *
     *
     */
    public function category(){
        return $this->hasOne(Category::class);
    }

    /**
     *
     *
     */
    public function sport(){
        return $this->hasOne(Sports::class);
    }

    /**
     *
     *
     */
    public function user(){
        return $this->hasOne(User::class);
    }
}
