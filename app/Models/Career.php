<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title', 'slug', 'description', 'experience', 'education', 'salary_range',
        'job_type', 'location', 'work_schedule', 'position', 'workweek',
        'application_deadline', 'responsibilities_description', 'responsibilities_points',
        'qualifications_description', 'qualifications_points', 'experience_description',
        'experience_points', 'visibility',
    ];

    protected $casts = [
        'responsibilities_points' => 'array',
        'qualifications_points' => 'array',
        'experience_points' => 'array',
        'application_deadline' => 'date',
        'visibility' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (Career $career) {
            if (! $career->slug) {
                $base = Str::slug($career->job_title);
                $slug = $base;
                $counter = 2;
                while (static::where('slug', $slug)->exists()) {
                    $slug = $base.'-'.$counter++;
                }
                $career->slug = $slug;
            }
        });
    }

    public function applications()
    {
        return $this->hasMany(CareerApplication::class);
    }
}
