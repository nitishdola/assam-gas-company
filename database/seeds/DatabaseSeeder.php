<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // DB::table('admins')->insert(['username' => 'admin', 'password' => bcrypt('mmsAdmin#')]);
        //$this->command->info('Admin Added !');

        // $faker = Faker::create();
        // foreach (range(1,10) as $index) {
        //     DB::table('locations')->insert([
        //         'name'              => $faker->name,
        //     ]);
        // }

        // foreach (range(1,10) as $index) {
        //     DB::table('racks')->insert([
        //         'name'              => $faker->name,
        //     ]);
        // }
        //DB::table('accounts_users')->insert(['name' => 'Manoj Changmai', 'username' => 'manoj', 'password' => bcrypt('password#'), 'created_by' => 1]);

        // DB::table('measurement_units')->insert(array(
        //     ['name' => 'NOS', 'measurement_code' => 'NOS', 'created_by' => 1],
        //     ['name' => 'TIN', 'measurement_code' => 'TIN', 'created_by' => 1],
        //     ['name' => 'BAG', 'measurement_code' => 'BAG', 'created_by' => 1],
        //     ['name' => 'PKT', 'measurement_code' => 'PKT', 'created_by' => 1],
        //     ['name' => 'KGS', 'measurement_code' => 'KGS', 'created_by' => 1],
        //
        //     ['name' => 'ROLL', 'measurement_code' => 'ROLL', 'created_by' => 1],
        //     ['name' => 'MTR', 'measurement_code' => 'MTR', 'created_by' => 1],
        //     ['name' => 'SQM', 'measurement_code' => 'SQM', 'created_by' => 1],
        //     ['name' => 'COIL', 'measurement_code' => 'COIL', 'created_by' => 1],
        //     ['name' => 'SET', 'measurement_code' => 'SET', 'created_by' => 1],
        //
        //     ['name' => 'REM', 'measurement_code' => 'REM', 'created_by' => 1],
        //     ['name' => 'BOT', 'measurement_code' => 'BOT', 'created_by' => 1],
        //     ['name' => 'LTR', 'measurement_code' => 'LTR', 'created_by' => 1],
        //     ['name' => 'PRS', 'measurement_code' => 'PRS', 'created_by' => 1])
        // );
        // $this->command->info('Measurement Units Seedeing Completed !');
    }
}
