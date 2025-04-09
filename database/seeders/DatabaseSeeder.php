<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ovde je vrlo bitan redosled kojim pozivamo seedere
        // jer zelimo da prvo sacuvamo blogove u bazi a da tek onda dodajemo komentare nad tim blogovima
        $this->call([
            BlogSeeder::class,
            KomentarSeeder::class,
        ]);
    }
}
