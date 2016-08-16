<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemSubGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_sub_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('item_sub_group_code')->unique();
            $table->integer('item_group_id', false, true);
            $table->integer('created_by', false, true);
            $table->tinyInteger('status')->default(1)->comment('Status 1 denotes Section is active and 0 as disabled');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('admins');
            $table->foreign('item_group_id')->references('id')->on('item_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('item_sub_groups');
    }
}
