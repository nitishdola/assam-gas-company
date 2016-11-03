<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseIndentItemRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_indent_item_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('purchase_indent_item_id', false, true);
            $table->decimal('rate', 20,2);
            $table->integer('nit_id')->nullable();
            $table->enum('rate_type', ['previous_rate', 'nit_rate']);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('purchase_indent_item_id')->references('id')->on('purchase_indent_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('purchase_indent_item_rates');
    }
}
