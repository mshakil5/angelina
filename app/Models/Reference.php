<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_first', 'candidate_last',
        'referee_first', 'referee_last', 'referee_email', 'referee_company',
        'org_address', 'city', 'county', 'postcode', 'country', 'phone',
        'relationship', 'start_date', 'end_date', 'position',
        'role_responsibilities', 'reason_leaving', 'criteria',
        'sick_days', 'permission_disclose', 'disciplinary',
        'suitability', 'suitability_details', 're_employ', 'accuracy'
    ];

}
