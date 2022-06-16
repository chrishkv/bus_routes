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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('external_id');
            $table->integer('external_budget_id');
            $table->integer('external_route_id');
            $table->integer('track_id');
            $table->text('name');
            $table->text('notes')->nulleable();
            $table->timestamp('timestamp')->nullable();
            $table->text('arrival_address');
            $table->timestamp('arrival_timestamp')->nullable();
            $table->text('departure_address');
            $table->timestamp('departure_timestamp')->nullable();
            $table->integer('capacity');
            $table->boolean('confirmed_pax_count');
            $table->timestamp('reported_departure_timestamp')->nullable();
            $table->float('reported_departure_kms', 8, 2);
            $table->timestamp('reported_arrival_timestamp')->nullable();
            $table->float('reported_arrival_kms', 8, 2);
            $table->text('reported_vehicle_plate_number')->nulleable();
            $table->integer('status');
            $table->text('status_info');
            $table->boolean('reprocess_status');
            $table->boolean('return');
            $table->boolean('synchronized_downstream')->nulleable();
            $table->boolean('synchronized_upstream')->nulleable();
            $table->integer('province_id');
            $table->boolean('sale_tickets_drivers');
            $table->text('notes_drivers')->nulleable();
            $table->text('itinerary_drivers');
            $table->boolean('cost_if_externalized');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
