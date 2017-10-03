<?php

use Illuminate\Database\Seeder;
use App\Vendor;

class UtamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $map = new Vendor();
        $map->lokasi = "Jl Situtarate, Terusan Cibaduyut Bandung";
        $map->lat = "-6.9659120000";
        $map->lng = "107.5929320000";
        $map->save();
    }
}
