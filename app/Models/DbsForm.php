<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DbsForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'declaration_name',
        'declaration_dob',
        'declaration_email',
        'declaration_date',
        'declaration_signature',
        'applicant_name',
        'post_title',
        'form_ref_number',
        'eligibility_ref',
        'docs_group1',
        'docs_group2a',
        'docs_group2b',
        'supporting_docs',
        'completed_by',
        'completion_date',
        'completion_signature',
        'verified_by',
        'verification_date',
        'verification_signature',
        'accuracy_confirm',
        'ip_address',
    ];

    protected $casts = [
        'declaration_dob'       => 'date',
        'declaration_date'      => 'date',
        'completion_date'       => 'date',
        'verification_date'     => 'date',
        'docs_group1'           => 'array',
        'docs_group2a'          => 'array',
        'docs_group2b'          => 'array',
        'supporting_docs'       => 'array',
        'accuracy_confirm'      => 'boolean',
    ];
}