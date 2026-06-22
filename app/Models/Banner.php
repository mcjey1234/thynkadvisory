<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    protected $table = 'banners';
    public $timestamps = true;

    protected $fillable = [
        'image',
        'title',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return null;
    }

    public function getImageDimensionsAttribute()
    {
        if ($this->image) {
            $path = storage_path('app/public/' . $this->image);
            if (file_exists($path)) {
                $size = getimagesize($path);
                if ($size) {
                    return [
                        'width' => $size[0],
                        'height' => $size[1],
                    ];
                }
            }
        }
        return null;
    }

    public function getQualityRatingAttribute()
    {
        $dimensions = $this->image_dimensions;
        if (!$dimensions) return 'Unknown';
        
        $width = $dimensions['width'];
        if ($width >= 1920) return 'Excellent';
        if ($width >= 1080) return 'Good';
        return 'Low';
    }
}