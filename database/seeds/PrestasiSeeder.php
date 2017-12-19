<?php

use Illuminate\Database\Seeder;
use App\Prestasi;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prestasi1 = new Prestasi();
        $prestasi1->judul = "Juara 1 Lomba Taekwondo Jawa Barat";
        $prestasi1->gambar = "prestasi1.jpg";
        $prestasi1->save();

        $prestasi2 = new Prestasi();
        $prestasi2->judul = "Juara 1 Lomba Tari Tradisional Bandung";
        $prestasi2->gambar = "prestasi2.png";
        $prestasi2->save();
    }
}
