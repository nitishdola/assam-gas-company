<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseIndentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_indents', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('requisition_id', false, true);
            
            $table->string('purchase_indent_number')->unique();
            $table->date('purchase_indent_date');
            $table->string('reference_number')->unique();
            $table->date('reference_date');
            $table->integer('budget_head_id', false, true);

            $table->integer('created_by', false, true);
            $table->date('created_on');

            $table->integer('checked_by', false, true)->nullable();
            $table->date('checked_on')->nullable();

            $table->integer('approval_hod_id', false, true)->nullable();
            $table->date('approval_hod_date')->nullable();

            $table->string('justification_of_the_purchase', 255);
            $table->string('remarks', 500)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('purchase_indents');
    }
}
