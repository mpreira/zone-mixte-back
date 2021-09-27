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
        'image'
    ];

    /**
     * get the sports' publications
     */
    public function publication(){
        return $this->hasMany(Publication::class, 'publication_id');
    }
}
