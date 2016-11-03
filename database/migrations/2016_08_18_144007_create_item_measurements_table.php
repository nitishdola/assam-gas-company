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
            $table->integer('item_group_id', false, true);
            $table->integer('item_sub_group_id', false, true);
            $table->integer('measurement_unit_id', false, true);
            $table->enum('asset_type', ['capital', 'revenue']);
            $table->enum('insured', ['yes', 'no']);
            $table->enum('review', ['yes', 'no']);
            $table->enum('product_preference', ['vital', 'essential', 'desirable']);
            $table->float('minimum_stock_level');
            $table->float('maximum_stock_level');
            $table->float('reorder_stock_level');
            $table->enum('abc', ['1', '0']);
            $table->enum('xyz', ['1', '0']);
            $table->enum('fsn', ['1', '0']);
            $table->integer('location_id', false, true);
            $table->integer('rack_id', false, true);
            $table->string('bin_number', 50);
            $table->string('kardex_number', 50);
            $table->string('store_code', 50);
            $table->decimal('latest_rate', 10, 2);
            $table->decimal('weighted_average_rate', 10, 2);
            $table->integer('opening_stock');
            $table->date('wef');
            $table->integer('stock_in_hand');
            $table->integer('created_by', false, true);
            $table->tinyInteger('status')->default(1)->comment('Status 1 denotes item is active and 0 as disabled');
            $table->timestamps();

            $table->foreign('item_group_id')->references('id')->on('item_groups');
            $table->foreign('item_sub_group_id')->references('id')->on('item_sub_groups');
            $table->foreign('measurement_unit_id')->references('id')->on('measurement_units');
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('rack_id')->references('id')->on('racks');
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
        Schema::drop('item_measurements');
    }
}
