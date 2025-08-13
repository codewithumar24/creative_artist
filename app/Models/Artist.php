<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
     protected $fillable = [
        'name',
        'specialty',
        'bio',
        'location',
        'avatar',
        'instagram',
        'twitter',
        'behance',
        'dribbble',
        'website'
    ];

    /**
     * Get the URL to the artist's avatar image.
     */
    public function getAvatarUrl()
    {
        if ($this->avatar) {
            return asset('storage/'.$this->avatar);
        }
        return 'https://randomuser.me/api/portraits/'.(rand(0, 1) ? 'men' : 'women').'/'.rand(1, 99).'.jpg';
    }

    /**
     * Get the artist's social links as an array.
     */
    public function getSocialLinks()
    {
        return [
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'behance' => $this->behance,
            'dribbble' => $this->dribbble,
            'website' => $this->website
        ];
    }

    /**
     * Scope a query to search for artists.
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('specialty', 'like', '%'.$search.'%')
                    ->orWhere('location', 'like', '%'.$search.'%');
    }
}
