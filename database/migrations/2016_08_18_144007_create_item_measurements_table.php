<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_measurements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_code', 30);
            $table->string('barcode', 30)->nullable();
            $table->string('item_name', 127);
            $table->string('item_description', 500);
            $table->string('part_number', 50);
            $table->string('manufacturer', 150);
            $table->date('expiry_date');
            $table->date('expiry_date');
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
        Schema::drop('item_measurements');
    }
}
