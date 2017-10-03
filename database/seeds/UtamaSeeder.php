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
        $map->lat = "27.718708332130223";
        $map->lng = "85.35781131744386";
        $map->save();
    }
}
