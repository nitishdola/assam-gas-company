<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColIndentidAddColIndentitemid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nits', function (Blueprint $table) {
            //$table->dropColumn('purchase_indent_id');
            //$table->integer('purchase_indent_item_id', false, true)->after('id');
            //$table->foreign('purchase_indent_item_id')->references('id')->on('purchase_indent_items');
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
