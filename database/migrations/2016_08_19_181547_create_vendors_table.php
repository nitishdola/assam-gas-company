<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('vendor_code', 50)->unique();
            $table->string('vendor_address', 500);
            $table->string('vendor_phone', 20)->nullable();
            $table->string('vendor_email', 30)->nullable();
            $table->string('vendor_mobile', 10);
            $table->string('contact_person', 50);
            $table->integer('cost_rating');
            $table->integer('quality_rating');
            $table->integer('delivery_rating');
            $table->string('latest_po_awarded')->nullable();
            $table->date('latest_po_date')->nullable();
            $table->integer('created_by', false, true);
            $table->string('remarks', 400)->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::drop('vendors');
    }
}
