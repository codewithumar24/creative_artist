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

    // Relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
