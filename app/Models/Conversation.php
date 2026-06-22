<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $table = 'conversations';
    public $timestamps = true;

    protected $fillable = [
        'contact_id',
        'user_message',
        'ai_response',
        'session_id',
        'ip_address',
        'user_agent',
        'is_read'
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }
}
