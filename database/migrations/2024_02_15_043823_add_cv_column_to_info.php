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
        Schema::table('info', function (Blueprint $table) {
            $table->string('cv')->nullable();
        });
        Schema::table('stacks', function (Blueprint $table) {
            $table->integer('level')->default(80);
            $table->dropColumn('img');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('info', function (Blueprint $table) {
            $table->dropColumn('cv');
        });
        Schema::table('stacks', function (Blueprint $table) {
            $table->dropColumn('level');
            $table->string('img');
        });
    }
};
