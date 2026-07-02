<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name', 'client_role', 'client_company', 'testimonial_text',
        'avatar_initials', 'avatar_image', 'rating', 'project_type',
        'is_featured', 'is_published', 'display_order'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function getAvatarAttribute()
    {
        if ($this->avatar_image) {
            return asset('storage/' . $this->avatar_image);
        }
        return $this->avatar_initials ?? substr($this->client_name, 0, 2);
    }

    public function getStarsAttribute()
    {
        return str_repeat('★', $this->rating) . str_repeat('☆', 5 - $this->rating);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc');
    }
}
