<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $table = 'services';
    public $timestamps = true;

    protected $fillable = [
        'title', 'description', 'icon', 'image', 'is_active', 'display_order', 'slug', 'notified_at', 'linkedin_posted'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'notified_at' => 'datetime',
        'linkedin_posted' => 'datetime',
    ];

    // Auto-generate slug from title
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }

    /**
     * Get the image URL attribute
     */
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return null;
    }

    /**
     * Scope a query to only include active services
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to order services by display_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc');
    }
}