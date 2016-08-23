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
        DB::table('admins')->insert(['username' => 'admin', 'password' => bcrypt('mmsAdmin#')]);

        $this->command->info('Admin Added !');
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
        DB::table('accounts_users')->insert(['name' => 'Manoj Changmai', 'username' => 'manoj', 'password' => bcrypt('password#'), 'created_by' => 1]);
    }
}
