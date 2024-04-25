<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as Faker;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) { // Generating 10 fake customers
            Customer::create([
                'username' => $faker->userName,
                'password' => bcrypt('123456'),
                'fname' => $faker->firstName,
                'lname' => $faker->lastName,
                'address' => $faker->address,
                'email' => $faker->email
            ]);
        }
    }
}
