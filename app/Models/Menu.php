<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    public $timestamps = true;

    protected $fillable = [
        'name', 
        'label', 
        'url', 
        'icon', 
        'parent_id', 
        'position', 
        'is_active', 
        'display_order', 
        'menu_type', 
        'target'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'parent_id' => 'integer',
    ];

    // Parent menu relationship
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    // Child menus relationship
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')
            ->where('is_active', true)
            ->orderBy('display_order', 'asc');
    }

    // Get all children recursively
    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    // Scope for active menus
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for top-level menus
    public function scopeTopLevel($query)
    {
        return $query->where('parent_id', 0);
    }

    // Scope for header menus
    public function scopeHeader($query)
    {
        return $query->where('position', 'header');
    }

    // Scope for footer menus
    public function scopeFooter($query)
    {
        return $query->where('position', 'footer');
    }

    // Scope for main menus
    public function scopeMain($query)
    {
        return $query->where('menu_type', 'main');
    }

    // Scope for sub menus
    public function scopeSub($query)
    {
        return $query->where('menu_type', 'sub');
    }

    // Accessor for full URL
    public function getFullUrlAttribute()
    {
        if ($this->url) {
            return url($this->url);
        }
        return '#';
    }

    // Check if menu has children
    public function hasChildren()
    {
        return $this->children()->count() > 0;
    }
    // Scope for social menus
public function scopeSocial($query)
{
    return $query->where('menu_type', 'social');
}

}