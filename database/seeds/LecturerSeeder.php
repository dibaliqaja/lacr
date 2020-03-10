<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

    	for($i = 1; $i <= 10; $i++){
    		DB::table('lecturers')->insert([
    			'name' => $faker->name,
    			'address' => $faker->address,
            ]);
        }
    }
}
