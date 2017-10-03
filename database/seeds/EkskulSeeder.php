<?php

use Illuminate\Database\Seeder;
use App\KategoriEkskul;

class EkskulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori1 = new KategoriEkskul();
        $kategori1->nama = "Olahraga";
        $kategori1->save();

        $kategori2 = new KategoriEkskul();
        $kategori2->nama = "Kesenian";
        $kategori2->save();

        $kategori3 = new KategoriEkskul();
        $kategori3->nama = "Keagamaan";
        $kategori3->save();

        $kategori4 = new KategoriEkskul();
        $kategori4->nama = "Multimedia";
        $kategori4->save();
    }
}
