<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurement_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('measurement_code')->unique();
            $table->integer('created_by', false, true);
            $table->tinyInteger('status')->default(1)->comment('Status 1 denotes Department is active and 0 as disabled');
            $table->text('remarks')->nullable();
            $table->timestamps();

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
        Schema::drop('measurement_units');
    }
}
