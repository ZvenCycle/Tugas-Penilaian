<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    use HasFactory;

    protected $table = 'job_vacancies';

    protected $fillable = [
        'title',
        'description',
        'requirements',
        'location',
        'type', // full-time, part-time, contract, etc.
        'status', // open, closed
        'deadline',
        'photo',
    ];

    protected $casts = [
        'deadline' => 'date',
    ];
}