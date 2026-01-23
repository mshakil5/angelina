<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('references', function (Blueprint $table) {
            // Relationship
            $table->string('relationship_type')->nullable()->after('relationship');
            $table->string('duration_acquaintance')->nullable();
            $table->string('relationship_capacity')->nullable();

            // Employment Extra
            $table->string('final_salary')->nullable();
            $table->text('performance_conduct')->nullable();
            $table->string('timekeeping_standard')->nullable();
            $table->string('attendance_standard')->nullable();

            // Colleague Track
            $table->text('character_assessment')->nullable();
            $table->text('qualities_characteristics')->nullable();
            $table->text('suitability_for_role')->nullable();
            $table->text('overall_recommendation')->nullable();

            // Safeguarding
            $table->string('confidentiality_maintenance')->nullable();
            $table->text('confidentiality_reasons')->nullable();
            $table->text('disciplinary_details')->nullable();
            $table->string('suitability_early_years')->nullable();
            $table->text('re_employ_reasons')->nullable();

            // Signature
            $table->boolean('digital_signature_ticked')->default(false);
            $table->string('signature_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('references', function (Blueprint $table) {
            //
        });
    }
};
