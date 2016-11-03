<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_heads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('budget_head_code', 50)->unique();
            $table->string('name', 127);
            $table->integer('department_id', false, true);
            $table->integer('section_id', false, true);
            $table->integer('created_by', false, true);
            $table->tinyInteger('status')->default(1)->comment('Status 1 denotes Budget Head is active and 0 as disabled');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('accounts_users');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('section_id')->references('id')->on('sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('budget_heads');
    }
}
