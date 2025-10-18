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
        Schema::create('references', function (Blueprint $table) {
            $table->id();

            // Candidate
            $table->string('candidate_first')->nullable();
            $table->string('candidate_last')->nullable();

            // Referee
            $table->string('referee_first')->nullable();
            $table->string('referee_last')->nullable();
            $table->string('referee_email')->nullable();
            $table->string('referee_company')->nullable();

            // Address
            $table->string('org_address')->nullable();
            $table->string('city')->nullable();
            $table->string('county')->nullable();
            $table->string('postcode')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();

            // Relationship
            $table->string('relationship')->nullable();

            // Employment info
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('position')->nullable();
            $table->text('role_responsibilities')->nullable();
            $table->text('reason_leaving')->nullable();
            $table->text('criteria');

            // Additional fields
            $table->string('sick_days')->nullable();
            $table->string('permission_disclose')->nullable();
            $table->string('disciplinary')->nullable();
            $table->string('suitability')->nullable();
            $table->text('suitability_details')->nullable();
            $table->string('re_employ')->nullable();
            $table->string('accuracy')->nullable();
            $table->integer('status')->default(0)->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('references');
    }
};
