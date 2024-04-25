<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use ArtistSeeder;
use CustomerSeeder;
use Database\Seeders\ArtistSeeder as SeedersArtistSeeder;
use Database\Seeders\CustomerSeeder as SeedersCustomerSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {       
        // User::factory(10)->create();
        $this->call([
           
          //  SongSeeder::class,
            SeedersArtistSeeder::class,
          SeedersCustomerSeeder::class,

            SongSeeder::class,
         //    InvoiceSeeder::class,
         //    OrderSeeder::class,
        ]);
/*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
    }
}
