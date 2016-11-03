<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropIndentitemAddNitid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('quotation_values', function (Blueprint $table) {
          //$table->dropColumn('purchase_indent_item_id');
          //$table->integer('nit_id', false, true)->after('id');
          //$table->foreign('nit_id')->references('id')->on('nits');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
