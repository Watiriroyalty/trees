<?php

use Illuminate\Database\Seeder;
//using the admin model
use App\Models\Admin;
//adding faker to generate dummy names
use Faker\Factory as Faker;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //creating a new instance of the faker library by calling its create method
    	$faker = Faker::create();
        //creating a new admin entry
        Admin::create([
            'name'      =>  $faker->name,
            'email'     =>  'admin@admin.com',
            'password'  =>  bcrypt('password'),
        ]);

    }
}
