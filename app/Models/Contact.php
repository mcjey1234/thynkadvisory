<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
        'ip_address',
        'user_agent',
        'is_read',
        'session_id', 
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship with conversations
     */
    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    /**
     * Scope for unread contacts
     */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /**
     * Scope for read contacts
     */
    public function scopeRead($query)
    {
        return $query->where('is_read', true);
    }

    /**
     * Scope for status-based filtering
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Mark as read
     */
    public function markAsRead()
    {
        $this->is_read = true;
        $this->status = 'read';
        $this->save();
    }

    /**
     * Mark as unread
     */
    public function markAsUnread()
    {
        $this->is_read = false;
        $this->status = 'unread';
        $this->save();
    }

    /**
     * Mark as replied
     */
    public function markAsReplied()
    {
        $this->is_read = true;
        $this->status = 'replied';
        $this->save();
    }

    /**
     * Check if contact has been read
     */
    public function getIsReadAttribute($value)
    {
        return (bool) $value;
    }

    /**
     * Get the full name with email
     */
    public function getFullInfoAttribute()
    {
        return $this->name . ' (' . $this->email . ')';
    }

    /**
     * Get status badge color
     */
    public function getStatusColorAttribute()
    {
        return match ($this->status) {
            'unread' => 'danger',
            'read' => 'warning',
            'replied' => 'success',
            default => 'gray',
        };
    }

    /**
     * Get status label
     */
    public function getStatusLabelAttribute()
    {
        return ucfirst($this->status);
    }
}