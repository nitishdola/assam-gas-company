<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('designation_id', false, true);
            $table->integer('department_id', false, true);
            $table->integer('section_id', false, true);
            $table->string('username');
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by', false, true);
            $table->timestamps();

            $table->foreign('designation_id')->references('id')->on('designations');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('created_by')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('department_users');
    }
}
