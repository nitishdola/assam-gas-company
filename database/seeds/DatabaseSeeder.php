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
        /*DB::table('admins')->insert(['username' => 'admin', 'password' => bcrypt('mmsAdmin#')]);

        $this->command->info('Admin Added !');*/
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('departments')->insert([
                'name'              => $faker->name,
                'department_code'   => $faker->bankAccountNumber,
                'created_by'        => 1,
            ]);
        }
    }
}
