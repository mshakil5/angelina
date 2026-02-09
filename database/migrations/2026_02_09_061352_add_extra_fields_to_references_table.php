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
            $table->string('submission_date')->after('confidentiality_no_reasons')->nullable();
            $table->string('employment_details')->after('submission_date')->nullable();
            $table->string('performance_and_conduct')->after('employment_details')->nullable();
            $table->string('further_information')->after('performance_and_conduct')->nullable();
            $table->string('extra1')->after('further_information')->nullable();
            $table->string('extra2')->after('extra1')->nullable();
            $table->string('extra3')->after('extra2')->nullable();
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
