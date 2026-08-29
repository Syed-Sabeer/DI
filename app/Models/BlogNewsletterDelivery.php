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
        'failure_message',
    ];

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function subscriber()
    {
        return $this->belongsTo(NewNewsletter::class, 'newsletter_subscriber_id');
    }
}
