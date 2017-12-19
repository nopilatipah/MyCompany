<?php

use Illuminate\Database\Seeder;
use App\Fasilitas;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fasilitas = new Fasilitas();
        $fasilitas->judul = "Perpustakaan Lengkap";
        $fasilitas->kategori = "1";
        $fasilitas->foto = "lib.jpg";
        $fasilitas->save();
    }
}
