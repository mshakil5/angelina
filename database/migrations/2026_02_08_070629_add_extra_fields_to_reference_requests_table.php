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
        Schema::table('references', function (Blueprint $table) {
            // Address Expansion
            if (!Schema::hasColumn('references', 'street')) $table->string('street')->nullable();
            if (!Schema::hasColumn('references', 'state_region')) $table->string('state_region')->nullable();
            if (!Schema::hasColumn('references', 'zip_code')) $table->string('zip_code')->nullable();
            
            // Relationship & Acquaintance
            if (!Schema::hasColumn('references', 'how_known')) $table->string('how_known')->nullable();
            if (!Schema::hasColumn('references', 'acquaintance_duration')) $table->string('acquaintance_duration')->nullable();
            
            // Employment Details
            if (!Schema::hasColumn('references', 'roles_responsibilities')) $table->text('roles_responsibilities')->nullable();
            if (!Schema::hasColumn('references', 'reason_for_leaving')) $table->string('reason_for_leaving')->nullable();
            if (!Schema::hasColumn('references', 'job_criteria')) $table->text('job_criteria')->nullable();
            if (!Schema::hasColumn('references', 'final_salary')) $table->string('final_salary')->nullable();
            
            // Colleague / Assessment
            if (!Schema::hasColumn('references', 'examples_evidence')) $table->text('examples_evidence')->nullable();
            if (!Schema::hasColumn('references', 'suitability_role')) $table->text('suitability_role')->nullable();
            if (!Schema::hasColumn('references', 'further_info_willingness')) $table->string('further_info_willingness')->nullable();
            if (!Schema::hasColumn('references', 'printed_name')) $table->string('printed_name')->nullable();

            // Safeguarding Details
            if (!Schema::hasColumn('references', 'confidentiality_no_reasons')) $table->text('confidentiality_no_reasons')->nullable();
            if (!Schema::hasColumn('references', 'disciplinary_procedures')) $table->string('disciplinary_procedures')->nullable();
            if (!Schema::hasColumn('references', 'not_work_early_years')) $table->string('not_work_early_years')->nullable();
            if (!Schema::hasColumn('references', 'not_work_details')) $table->text('not_work_details')->nullable();
            if (!Schema::hasColumn('references', 're_employ_no_reasons')) $table->text('re_employ_no_reasons')->nullable();
            if (!Schema::hasColumn('references', 'accuracy_confirmation')) $table->string('accuracy_confirmation')->nullable();
            if (!Schema::hasColumn('references', 'suitability_children')) $table->string('suitability_children')->nullable();
            if (!Schema::hasColumn('references', 'referee_signature')) $table->string('referee_signature')->nullable();
        });
    }

    public function down()
    {
        Schema::table('references', function (Blueprint $table) {
            $table->dropColumn([
                'street', 'state_region', 'zip_code', 'how_known', 'acquaintance_duration', 
                'roles_responsibilities', 'reason_for_leaving', 'job_criteria', 'final_salary', 
                'examples_evidence', 'suitability_role', 'further_info_willingness', 
                'printed_name', 'confidentiality_no_reasons', 'disciplinary_procedures', 
                'not_work_early_years', 'not_work_details', 're_employ_no_reasons', 'accuracy_confirmation','suitability_children','referee_signature'
            ]);
        });
    }
};
