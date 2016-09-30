<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_indent_item_id', false, true);
            $table->integer('vendor_id', false, true);
            $table->decimal('value', 20,2);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('purchase_indent_item_id')->references('id')->on('purchase_indent_items');
            $table->foreign('vendor_id')->references('id')->on('vendors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quotation_values');
    }
}
