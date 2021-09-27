<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
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
        'category'
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
     * get the publication's user
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     *
     *
     */
    public function articles()
    {
        return $this->morphMany(Article::class, 'publishable');
    }

    /**
     *
     *
     */
    public function videos()
    {
        return $this->morphMany(Video::class, 'publishable');
    }

    /**
     * Get all of the publication's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * get the publication's categories
     */
    public function categories(){
        return $this->belongsToMany(Category::class, 'category_id');
    }

    /**
     * get the publication's categories
     */
    public function sports(){
        return $this->belongsTo(Sports::class, 'sports_id');
    }
}
