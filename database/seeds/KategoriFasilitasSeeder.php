<?php

use Illuminate\Database\Seeder;
use App\KategoriFasilitas;

class KategoriFasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fasilitas1 = new KategoriFasilitas();
        $fasilitas1->nama="Ruang Kelas";
        $fasilitas1->save();

        $fasilitas2 = new KategoriFasilitas();
        $fasilitas2->nama="Lingkungan";
        $fasilitas2->save();

        $fasilitas3 = new KategoriFasilitas();
        $fasilitas3->nama="Ekstrakurikuler";
        $fasilitas3->save();

        $fasilitas4 = new KategoriFasilitas();
        $fasilitas4->nama="Bangunan";
        $fasilitas4->save();
    }
}
