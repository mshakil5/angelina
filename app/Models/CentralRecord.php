<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentralRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'date_of_birth', 'date_address_id_seen', 'date_photo_id_seen',
        'application_pack_completed', 'induction_completed_date',
        'date_started_with_ey_provider', 'job_title', 'employment_status',
        'qualifications_required', 'qualifications_evidenced', 'date_qualifications_seen', 'qualification_level_and_date', 'counts_in_ratios',
        'date_dbs_evidenced_and_checked', 'dbs_disclosure_number', 'dbs_issue_date', 'dbs_certificate_seen', 'on_dbs_update_service', 'overseas_police_check_required', 'overseas_dbs_checks_completed',
        'evidence_seen_rtw', 'visa_work_permit_expiry_date', 'most_recent_rtw_check_date',
        'health_declaration_form_completed',
        'reference_one_satisfactory', 'date_reference_one_completed', 'reference_two_satisfactory', 'date_reference_two_completed',
        'evidence_checked_by', 'manager_signature', 'date_verified',
    ];
}