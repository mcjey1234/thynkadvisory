<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $table = 'milestones';
    public $timestamps = true;

    protected $fillable = [
        'year',
        'month',
        'day',
        'title',
        'description',
        'icon',
        'image',
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

    public function getFullDateAttribute()
    {
        $date = $this->year;
        if ($this->month) {
            $date .= ' ' . $this->month;
        }
        if ($this->day) {
            $date .= ' ' . $this->day;
        }
        return $date;
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return null;
    }
}