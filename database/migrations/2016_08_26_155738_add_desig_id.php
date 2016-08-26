<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDesigId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('department_users', function (Blueprint $table) {
            $table-> unsignedInteger ('designation_id')->after('name');
            $table->foreign('designation_id')
            ->references('id')->on('designations')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('department_users', function (Blueprint $table) {
            $table->dropColumn('designation_id');
            //
        });
    }
}
