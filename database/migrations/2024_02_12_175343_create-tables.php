<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->string('location');
            $table->string('details');
            $table->boolean('certified')->default(false);
            $table->year('date');
            $table->timestamps();
        });
        Schema::create('stacks', function(Blueprint $table){
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->string('img');
        });
        Schema::create('info', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->string('nickname');
            $table->string('brand');
            $table->string('other_nickname');
            $table->string('gender');
            $table->string('job_desc');
            $table->string('origin');
            $table->string('currently');
            $table->string('phone');
            $table->string('spotifyid');
            $table->string('spotifykey');
            $table->string('key');
            $table->timestamps();
        });
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->string('img');
            $table->string('about');
            $table->string('type');
            $table->string('url');
            $table->timestamps();
        });
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->string('url');
            $table->string('handle');
            $table->timestamps();
        });
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->string('message');
            $table->timestamps();
        });
        Schema::create('experience', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name');
            $table->string('location');
            $table->string('post');
            $table->year('start');
            $table->year('end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certifications');
        Schema::dropIfExists('stacks');
        Schema::dropIfExists('info');
        Schema::dropIfExists('experience');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('socials');
    }
};
