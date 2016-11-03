<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnsRequisitions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requisitions', function (Blueprint $table) {
            $table->dropColumn('issued_by');
            $table->dropColumn('issued_date');
            $table->dropColumn('received_in_good_condition_by');
            $table->dropColumn('received_in_good_condition_date');
            $table->dropColumn('posted_in_kardex_by');
            $table->dropColumn('posted_in_kardex_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requisitions', function (Blueprint $table) {
            //
        });
    }
}
