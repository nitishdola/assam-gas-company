<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('section_id', false, true);

            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by', false, true);
            $table->timestamps();
            
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
        Schema::drop('material_users');
    }
}
