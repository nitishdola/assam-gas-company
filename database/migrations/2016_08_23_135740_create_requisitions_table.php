<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id', false,true);
            $table->string('requisition_number');
            $table->date('issue_date');
            $table->string('job_number');
            $table->string('name_of_work');
            $table->integer('chargeable_account_id', false,true);
            $table->string('financial_year', 10);
            $table->date('receive_date');
            $table->integer('raised_by', false,true);
            $table->dateTime('hod_approve_date')->nullable();
            $table->integer('authorised_by', false,true)->nullable();
            $table->dateTime('authorised_date')->nullable();
            $table->integer('issued_by', false,true)->nullable();
            $table->dateTime('issued_date')->nullable();
            $table->integer('received_in_good_condition_by', false,true)->nullable();
            $table->dateTime('received_in_good_condition_date')->nullable();
            $table->integer('posted_in_kardex_by', false,true)->nullable();
            $table->dateTime('posted_in_kardex_date')->nullable();
            $table->string('remarks', 500)->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::drop('requisitions');
    }
}
