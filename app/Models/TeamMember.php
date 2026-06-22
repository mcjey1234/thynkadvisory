<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $table = 'team_members';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'position',
        'bio',
        'image',
        'email',
        'phone',
        'linkedin',
        'twitter',
        'facebook',
        'instagram',
        'is_active',
        'display_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->orderBy('display_order', 'asc');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return null;
    }

    public function getSocialLinksAttribute()
    {
        $links = [];
        if ($this->linkedin) $links['linkedin'] = $this->linkedin;
        if ($this->twitter) $links['twitter'] = $this->twitter;
        if ($this->facebook) $links['facebook'] = $this->facebook;
        if ($this->instagram) $links['instagram'] = $this->instagram;
        return $links;
    }
}