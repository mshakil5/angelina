<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('central_records', function (Blueprint $table) {
            $table->id();
            
            // Identity
            $table->string('name');
            $table->text('address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('date_address_id_seen')->nullable();
            $table->date('date_photo_id_seen')->nullable();
            
            // Recruitment & Induction
            $table->enum('application_pack_completed', ['Yes', 'No', 'N/A'])->default('No');
            $table->date('induction_completed_date')->nullable();
            
            // Employment
            $table->date('date_started_with_ey_provider')->nullable();
            $table->string('job_title')->nullable();
            $table->string('employment_status')->nullable();
            
            // Qualifications & Registration
            $table->enum('qualifications_required', ['Yes', 'No', 'N/A'])->default('No');
            $table->enum('qualifications_evidenced', ['Yes', 'No', 'N/A'])->default('No');
            $table->date('date_qualifications_seen')->nullable();
            $table->text('qualification_level_and_date')->nullable();
            $table->enum('counts_in_ratios', ['Yes', 'No', 'N/A'])->default('No');
            
            // DBS / Suitability
            $table->date('date_dbs_evidenced_and_checked')->nullable();
            $table->string('dbs_disclosure_number')->nullable();
            $table->date('dbs_issue_date')->nullable();
            $table->enum('dbs_certificate_seen', ['Yes', 'No', 'N/A'])->default('No');
            $table->string('on_dbs_update_service')->default('N/A');
            $table->string('overseas_police_check_required')->default('N/A');
            $table->string('overseas_dbs_checks_completed')->default('N/A');
            
            // Right to Work in the UK
            $table->string('evidence_seen_rtw')->nullable();
            $table->string('visa_work_permit_expiry_date')->default('N/A');
            $table->string('most_recent_rtw_check_date')->default('N/A');
            
            // Medical
            $table->enum('health_declaration_form_completed', ['Yes', 'No', 'N/A'])->default('No');
            
            // References
            $table->enum('reference_one_satisfactory', ['Yes', 'No', 'N/A'])->default('No');
            $table->date('date_reference_one_completed')->nullable();
            $table->enum('reference_two_satisfactory', ['Yes', 'No', 'N/A'])->default('No');
            $table->date('date_reference_two_completed')->nullable();
            
            // Verification
            $table->string('evidence_checked_by')->nullable();
            $table->string('manager_signature')->nullable();
            $table->date('date_verified')->nullable();
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('central_records');
    }
};
