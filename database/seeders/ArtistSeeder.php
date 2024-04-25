<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Artist;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       
            $faker = Faker::create();
    
            for ($i = 0; $i < 10; $i++) { // Generating 5 fake artists
                Artist::create([
                    'Fname' => $faker->firstName,
                    'Lname' => $faker->lastName,
                    'gender' => $faker->randomElement(['male', 'female']),
                    'country' => $faker->country
                ]);
            }
    }}
