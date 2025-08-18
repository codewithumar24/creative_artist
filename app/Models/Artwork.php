<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    protected $fillable = [
        'title',
        'description',
        'medium',
        'image',
        'artist_name',
        'artist_image',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
 
    public function artist()
{
    return $this->belongsTo(User::class);
}
}
