<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisition_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('requisition_id', false,true);
            $table->integer('item_measurement_id', false,true);
            $table->string('store_description',500);
            $table->integer('measurement_unit_id', false,true);
            $table->integer('quantity_demanded');
            $table->integer('quantity_issued')->default(0);
            $table->decimal('rate', 20,0);
            $table->decimal('value', 20,0)->nullable();
            $table->string('remarks',500)->nullable();
            $table->integer('status')->default(1);
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
        Schema::drop('requisition_items');
    }
}
