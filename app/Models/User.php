<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $guarded = [];

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'dob', 'is_type', 'status',
        'emergency_name', 'emergency_email', 'emergency_phone',
        'emergency_name2', 'emergency_email2', 'emergency_phone2',
        'start_date', 'end_date', 'hourly_rate', 'ni_number', 
        'p45_provided', 'position', 'contractual_hour', 
        'holiday_hour_taken', 'holiday_amount_paid', 
        'holiday_remaining', 'holiday_entitle', 'other_comments'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["1", "2", "3"][$value],
        );
    }

    public function documents()
    {
        return $this->hasMany(UserDocumentCompletion::class);
    }
}
