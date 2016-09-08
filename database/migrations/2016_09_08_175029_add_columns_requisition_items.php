<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsRequisitionItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requisition_items', function (Blueprint $table) {
            $table->integer('issued_by')->nullable()->after('quantity_issued');
            $table->date('issued_date')->nullable();
            $table->integer('received_in_good_condition_by')->nullable();
            $table->date('received_in_good_condition_date')->nullable();
            $table->integer('posted_in_kardex_by')->nullable();
            $table->date('posted_in_kardex_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requisition_items', function (Blueprint $table) {
            //
        });
    }
}
