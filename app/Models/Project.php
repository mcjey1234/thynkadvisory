<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'category', 'thumbnail', 'client_name',
        'industry', 'url', 'github_url', 'playstore_url', 'appstore_url',
        'is_featured', 'is_published', 'published_at', 'views'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function getThumbnailUrlAttribute()
    {
        return $this->thumbnail ? asset('storage/' . $this->thumbnail) : null;
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function getCategoryLabelAttribute()
    {
        return match($this->category) {
            'mobile' => '📱 Mobile App',
            'web' => '🌐 Web App',
            'design' => '🎨 Design',
            default => '📦 Other',
        };
    }

    public function getCategoryIconAttribute()
    {
        return match($this->category) {
            'mobile' => '📱',
            'web' => '🌐',
            'design' => '🎨',
            default => '📦',
        };
    }
}
