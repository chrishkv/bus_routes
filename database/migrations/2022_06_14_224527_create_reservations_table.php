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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_plan_id');
            $table->integer('route_id');
            $table->integer('track_id')->nulleable();
            $table->timestamp('reservation_start')->nullable();
            $table->timestamp('reservation_end')->nullable();
            $table->integer('route_stop_origin_id');
            $table->integer('route_stop_destination_id');
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
        Schema::dropIfExists('reservations');
    }
};
