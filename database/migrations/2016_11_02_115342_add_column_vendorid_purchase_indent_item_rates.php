<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnVendoridPurchaseIndentItemRates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_indent_item_rates', function (Blueprint $table) {
            $table->integer('vendor_id', false, true)->after('purchase_indent_item_id');
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
        Schema::table('purchase_indent_item_rates', function (Blueprint $table) {
            //
        });
    }
}
