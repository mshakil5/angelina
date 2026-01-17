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
        Schema::table('documents', function (Blueprint $blueprint) {
            // Adding the link column after the description field
            $blueprint->string('link')->nullable()->after('description');
        });
    }

    public function down(): void
    {
        Schema::table('documents', function (Blueprint $blueprint) {
            $blueprint->dropColumn('link');
        });
    }
    
};
