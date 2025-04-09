<?php

namespace Database\Seeders;

use App\Models\Komentar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KomentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $komentar = new Komentar();
        $komentar->komentar = "Ovo je prvi komentar na prvoj objavi!";
        $komentar->blog_id = 1; 
        $komentar->save();

        $komentar = new Komentar();
        $komentar->komentar = "Ovo je drugi komentar na prvoj objavi!";
        $komentar->blog_id = 1; 
        $komentar->save();

        $komentar = new Komentar();
        $komentar->komentar = "Ovo je prvi komentar na drugoj objavi!";
        $komentar->blog_id = 2; 
        $komentar->save();

        $komentar = new Komentar();
        $komentar->komentar = "Ovo je drugi komentar na drugoj objavi!";
        $komentar->blog_id = 2; 
        $komentar->save();

        $komentar = new Komentar();
        $komentar->komentar = "Ovo je treci komentar na drugoj objavi!";
        $komentar->blog_id = 2; 
        $komentar->save();
    }
}
