<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToNitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nits', function (Blueprint $table) {
            $table->integer('purchase_indent_id', false, true);
            $table->string('nit_number', 50);
            $table->string('subject', 127);
            $table->string('description', 500);
            $table->date('nit_date');
            $table->dateTime('sale_period_from');
            $table->dateTime('sale_period_to');
            $table->date('nit_opening_date');
            $table->date('nit_closing_date');
            $table->date('nit_pre_bid_date');
            $table->decimal('estimate_cost', 15,2);
            $table->decimal('tender_cost', 15,2);
            $table->decimal('emd_cost', 15,2);
            $table->string('currency', 127);
            $table->string('tender_details', 255);
            $table->string('tender_type',127);
            $table->integer('created_by', false, true);
            $table->date('checked_on')->nullable();
            $table->integer('checked_by', false, true)->nullable();
            $table->date('approved_on')->nullable();
            $table->integer('approved_by', false, true)->nullable();
            $table->tinyInteger('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nits', function (Blueprint $table) {
            //
        });
    }
}
