<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = [
        'specialty',
        'bio',
        'user_id',
        'location',
        'instagram',
        'twitter',
        'behance',
        'dribbble',
        'website'
    ];

    public function getAvatarUrl()
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }
        return 'https://randomuser.me/api/portraits/' . (rand(0, 1) ? 'men' : 'women') . '/' . rand(1, 99) . '.jpg';
    }

    
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


    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' . $search . '%')
            ->orWhere('specialty', 'like', '%' . $search . '%')
            ->orWhere('location', 'like', '%' . $search . '%');
    }
    public function artworks()
    {
        return $this->hasMany(Artwork::class);
    }


    public function user()
{
    return $this->belongsTo(User::class);
}
}
