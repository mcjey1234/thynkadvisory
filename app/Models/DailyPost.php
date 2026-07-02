<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyPost extends Model
{
    protected $fillable = [
        'title', 'content', 'type', 'icon', 'image',
        'is_published', 'post_date', 'scheduled_at', 'posted_at'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'post_date' => 'date',
        'scheduled_at' => 'datetime',
        'posted_at' => 'datetime',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeToday($query)
    {
        return $query->whereDate('post_date', today());
    }
}
