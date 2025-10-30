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
            $table->string('title')->nullable()->after('id');
            $table->string('surname')->nullable()->after('name');
            $table->string('sign')->nullable()->after('feature_image');
            $table->string('dob')->nullable()->after('sign');
            $table->string('position')->nullable()->after('dob');
            $table->longText('address')->nullable()->after('position');
            $table->string('emergency_name')->nullable()->after('address');
            $table->string('emergency_email')->nullable()->after('emergency_name');
            $table->string('emergency_phone')->nullable()->after('emergency_email');
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
