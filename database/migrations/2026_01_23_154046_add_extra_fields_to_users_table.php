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
        Schema::table('users', function (Blueprint $table) {
            $table->date('start_date')->after('emergency_phone2')->nullable();
            $table->date('end_date')->after('start_date')->nullable();
            $table->decimal('hourly_rate', 8, 2)->after('end_date')->nullable();
            $table->string('ni_number')->after('hourly_rate')->nullable();
            $table->boolean('p45_provided')->after('ni_number')->default(0);
            $table->string('position')->after('p45_provided')->nullable();
            $table->integer('contractual_hour')->after('position')->nullable();
            $table->integer('holiday_hour_taken')->after('contractual_hour')->default(0);
            $table->decimal('holiday_amount_paid', 8, 2)->after('holiday_hour_taken')->default(0);
            $table->integer('holiday_remaining')->after('holiday_amount_paid')->default(0);
            $table->integer('holiday_entitle')->after('holiday_remaining')->default(0);
            $table->text('other_comments')->after('holiday_entitle')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
