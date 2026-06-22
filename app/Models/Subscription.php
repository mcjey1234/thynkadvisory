<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';
    public $timestamps = true;

    protected $fillable = [
        'email',
        'name',
        'source',
        'status',
        'ip_address',
        'user_agent',
        'subscribed_at',
        'unsubscribed_at',
    ];

    protected $casts = [
        'subscribed_at' => 'datetime',
        'unsubscribed_at' => 'datetime',
    ];

    /**
     * Scope for active subscriptions
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope for unsubscribed
     */
    public function scopeUnsubscribed($query)
    {
        return $query->where('status', 'unsubscribed');
    }

    /**
     * Scope by source
     */
    public function scopeSource($query, $source)
    {
        return $query->where('source', $source);
    }

    /**
     * Mark as unsubscribed
     */
    public function unsubscribe()
    {
        $this->status = 'unsubscribed';
        $this->unsubscribed_at = now();
        $this->save();
    }

    /**
     * Mark as active
     */
    public function reactivate()
    {
        $this->status = 'active';
        $this->unsubscribed_at = null;
        $this->save();
    }
}