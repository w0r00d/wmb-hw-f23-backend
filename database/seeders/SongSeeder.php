<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Song;
class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) { // Generating 20 fake songs
            Song::create([
                'Title' => $faker->sentence,
                'Type' => $faker->randomElement(['Pop', 'Rock', 'Jazz', 'Hip Hop']),
                'Price' => $faker->randomFloat(2, 0, 100),
                'ArtistId' => $faker->numberBetween(1, 10) // Assuming there are 5 artists seeded
            ]);
        }
    }
}
