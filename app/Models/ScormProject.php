<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScormProject extends Model
{
    protected $fillable = [
        'title', 'description', 'scorm_file_path', 'thumbnail', 'url',
        'client_name', 'industry', 'is_published', 'published_at',
        'views', 'completions', 'extracted_path', 'launch_file'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function getScormUrlAttribute()
    {
        if ($this->extracted_path && $this->launch_file) {
            return asset('storage/scorm-courses/' . $this->extracted_path . '/' . $this->launch_file);
        }
        return $this->url ?? null;
    }

    public function getThumbnailUrlAttribute()
    {
        return $this->thumbnail ? asset('storage/' . $this->thumbnail) : null;
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}
