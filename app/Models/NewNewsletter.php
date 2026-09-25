<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewNewsletter extends Model
{
    use HasFactory;

    protected $table = 'new_newsletters'; 

    protected $fillable = [
        'email',
    ];

    public $timestamps = true;

    public function deliveries()
    {
        return $this->hasMany(BlogNewsletterDelivery::class, 'newsletter_subscriber_id');
    }

    public function careerDeliveries()
    {
        return $this->hasMany(CareerAlertDelivery::class, 'newsletter_subscriber_id');
    }
}
