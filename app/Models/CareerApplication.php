<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{
    protected $fillable = [
        'career_id', 'submission_token', 'first_name', 'last_name', 'email', 'phone', 'linkedin_url',
        'github_url', 'current_workplace', 'current_position', 'years_experience',
        'current_salary', 'expected_salary', 'address', 'country', 'state', 'city',
        'postal_code', 'resume_path', 'resume_name', 'cover_letter_path',
        'cover_letter_name', 'ip_address',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
