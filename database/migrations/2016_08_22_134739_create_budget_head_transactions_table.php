<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetHeadTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_head_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('budget_head_id', false, true);
            $table->integer('department_id', false, true);
            $table->integer('section_id', false, true);
            $table->integer('created_by', false, true);
            $table->decimal('budget_head_amount', 20,2);
            $table->decimal('budget_head_reserve_amount', 20,2);
            $table->decimal('budget_head_utilized_amount', 20,2);
            $table->string('financial_year',7);
            $table->tinyInteger('status')->default(1)->comment('Status 1 denotes Section is active and 0 as disabled');
            $table->timestamps();

            $table->foreign('budget_head_id')->references('id')->on('budget_heads');
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
        Schema::drop('budget_head_transactions');
    }
}
