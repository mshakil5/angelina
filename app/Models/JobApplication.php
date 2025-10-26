<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'full_name',
        'email',
        'phone',
        'cover_letter',
        'resume',
    ];

    public function job()
    {
        return $this->belongsTo(JobList::class, 'job_id');
    }
}