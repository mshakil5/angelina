<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    use HasFactory;



    protected $fillable = [
        'candidate_first','candidate_last',
        'referee_first','referee_last','referee_email','referee_company','org_address','street','city','state_region','zip_code','country','phone',
        'relationship_type','how_known','acquaintance_duration','relationship_capacity',
        'start_date','end_date','position','final_salary','roles_responsibilities','reason_for_leaving','timekeeping_standard','attendance_standard','sick_days','job_criteria',
        'character_assessment','qualities_characteristics','examples_evidence','suitability_role','overall_recommendation','further_info_willingness','referee_signature','printed_name',
        'confidentiality_maintenance','confidentiality_no_reasons','disciplinary_procedures','disciplinary_details','suitability_early_years','suitability_children','suitability_details','not_work_early_years','not_work_details','re_employ','re_employ_no_reasons','permission_disclose','accuracy_confirmation','submission_date','employment_details','further_information', 'performance_and_conduct', 'extra1', 'extra2', 'extra3',
        'sig_tick', 'status'
    ];

}

