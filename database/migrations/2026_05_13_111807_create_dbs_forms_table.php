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
        Schema::create('dbs_forms', function (Blueprint $table) {
            $table->id();
            $table->string('declaration_name');
            $table->date('declaration_dob');
            $table->string('declaration_email');
            $table->date('declaration_date');
            $table->string('declaration_signature');

            $table->string('applicant_name');
            $table->string('post_title');
            $table->string('form_ref_number')->nullable();
            $table->string('eligibility_ref')->nullable();

            $table->json('docs_group1')->nullable();
            $table->json('docs_group2a')->nullable();
            $table->json('docs_group2b')->nullable();
            $table->json('supporting_docs')->nullable();

            $table->string('completed_by')->nullable();
            $table->date('completion_date')->nullable();
            $table->string('completion_signature')->nullable();
            $table->string('verified_by')->nullable();
            $table->date('verification_date')->nullable();
            $table->string('verification_signature')->nullable();

            $table->boolean('accuracy_confirm')->default(false);

            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dbs_forms');
    }
};
