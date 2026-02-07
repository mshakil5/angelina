<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $fillable = [
        // Candidate
        'candidate_first',
        'candidate_last',

        // Referee
        'referee_first',
        'referee_last',
        'referee_email',
        'referee_company',

        // Address
        'org_address',
        'city',
        'county',
        'postcode',
        'country',
        'phone',

        // Relationship
        'relationship',
        'relationship_type',
        'duration_acquaintance',
        'relationship_capacity',

        // Employment info
        'start_date',
        'end_date',
        'position',
        'role_responsibilities',
        'reason_leaving',
        'criteria',
        'final_salary',
        'performance_conduct',
        'timekeeping_standard',
        'attendance_standard',

        // Additional fields
        'sick_days',
        'permission_disclose',
        'disciplinary',
        'disciplinary_details',
        'suitability',
        'suitability_details',
        'suitability_for_role',
        'suitability_early_years',
        're_employ',
        're_employ_reasons',
        'accuracy',

        // Colleague / Character
        'character_assessment',
        'qualities_characteristics',
        'overall_recommendation',

        // Safeguarding
        'confidentiality_maintenance',
        'confidentiality_reasons',

        // Signature
        'digital_signature_ticked',
        'signature_name',

        // System
        'status',
    ];
}

