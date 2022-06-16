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
        Schema::create('user_plans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('currency_id');
            $table->integer('next_user_plan_id')->nulleable();
            $table->timestamp('start_timestamp')->nulleable();
            $table->timestamp('end_timestamp')->useCurrent()->nulleable();
            $table->timestamp('renewal_timestamp')->useCurrent()->nulleable();
            $table->float('renewal_price', 10, 2);
            $table->boolean('requires_invoice');
            $table->integer('status');
            $table->boolean('financiation');
            $table->integer('status_financiation');
            $table->text('language');
            $table->text('nif');
            $table->text('business_name');
            $table->boolean('pending_payment');
            $table->timestamp('date_max_payment')->useCurrent()->nulleable();
            $table->timestamp('proxim_start_timestamp')->useCurrent()->nulleable();
            $table->timestamp('proxim_end_timestamp')->useCurrent()->nulleable();
            $table->timestamp('proxim_renewal_timestamp')->useCurrent()->nulleable();
            $table->float('proxim_renewal_price', 8, 2)->nulleable();
            $table->float('credits_return', 8, 2);
            $table->integer('company_id');
            $table->boolean('cancel_employee');
            $table->boolean('force_renovation');
            $table->timestamp('date_canceled')->useCurrent()->nulleable();
            $table->float('amount_confirm_canceled', 8, 2);
            $table->float('credit_confirm_canceled', 8, 2);
            $table->integer('cost_center_id');
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
        Schema::dropIfExists('user_plans');
    }
};
