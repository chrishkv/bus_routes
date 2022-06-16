<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->text('first_name');
            $table->text('last_name');
            $table->text('phone_number');
            $table->text('picture')->nulleable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamp('last_online')->nullable();
            $table->text('verification_code')->nullable();
            $table->string('new_email')->unique();
            $table->integer('status');
            $table->boolean('first');
            $table->timestamp('last_accept_date')->nullable();
            $table->text('company_contact')->nulleable();
            $table->float('credits', 8,2);
            $table->boolean('first_trip');
            $table->boolean('incomplete_profile');
            $table->boolean('phone_verify');
            $table->boolean('token_auto_login')->nulleable();
            $table->boolean('user_vertical')->nulleable();
            $table->integer('language_id');
            $table->boolean('no_registered');
            $table->timestamps();
            $table->softDeletes('deleted_at', 0);	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
