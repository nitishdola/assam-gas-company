<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChargeableAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chargeable_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('chargeable_accounting_code')->unique();
            $table->integer('department_id', false, true);
            $table->integer('section_id', false, true);
            $table->integer('created_by', false, true);
            $table->tinyInteger('status')->default(1)->comment('Status 1 denotes Section is active and 0 as disabled');
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
        Schema::drop('chargeable_accounts');
    }
}
