<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogNewsletterDelivery extends Model
{
    protected $fillable = [
        'blog_id',
        'newsletter_subscriber_id',
        'email',
        'status',
        'sent_at',
        'opened_at',
        'last_opened_at',
        'open_count',
        'viewed_at',
        'last_viewed_at',
        'view_count',
        'resend_enabled',
        'failure_message',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
        'opened_at' => 'datetime',
        'last_opened_at' => 'datetime',
        'viewed_at' => 'datetime',
        'last_viewed_at' => 'datetime',
        'open_count' => 'integer',
        'view_count' => 'integer',
        'resend_enabled' => 'boolean',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function subscriber()
    {
        return $this->belongsTo(NewNewsletter::class, 'newsletter_subscriber_id');
    }

    public function scopeSent($query)
    {
        return $query->where('status', 'sent');
    }

    public function scopeOpened($query)
    {
        return $query->whereNotNull('opened_at');
    }

    public function scopeViewed($query)
    {
        return $query->whereNotNull('viewed_at');
    }
}
