<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class AddIshodToDepartmentUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('department_users', function(Blueprint $table) {
         $table->tinyInteger('is_hod')->default(0)->after('department_id');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('department_users', function(Blueprint $table) {
        $table->dropColumn('is_hod');
    });
    }
}
