<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterItem extends Model
{
    protected $table = 'footer_items';
    public $timestamps = true;

    protected $fillable = [
        'type',
        'label',
        'url',
        'icon',
        'platform',
        'content',
        'is_active',
        'display_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeMenus($query)
    {
        return $query->where('type', 'menu')
            ->orderBy('display_order', 'asc');
    }

    public function scopeSocial($query)
    {
        return $query->where('type', 'social')
            ->orderBy('display_order', 'asc');
    }

    public function scopeCopyright($query)
    {
        return $query->where('type', 'copyright');
    }

    // Get formatted data
    public function getFormattedDataAttribute()
    {
        $data = [
            'id' => $this->id,
            'type' => $this->type,
            'is_active' => $this->is_active,
        ];

        switch ($this->type) {
            case 'menu':
                $data['label'] = $this->label;
                $data['url'] = $this->url;
                break;
            case 'social':
                $data['label'] = $this->label;
                $data['url'] = $this->url;
                $data['icon'] = $this->icon;
                $data['platform'] = $this->platform;
                break;
            case 'copyright':
                $data['content'] = $this->content;
                break;
        }

        return $data;
    }
}