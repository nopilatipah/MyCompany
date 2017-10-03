<?php

use Illuminate\Database\Seeder;
use App\Komponen;

class KomponenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $komponen = new Komponen();
        $komponen->logo="logo.png";
        $komponen->nama_sekolah="SMK ASSALAAM BANDUNG";
        $komponen->tentang="Anda dapat mengikuti berbagai macam kegiatan dan informasi mengenai SMK Assalaam Bandung melalui media sosial. Ataupun anda dapat berkomunikasi langsung dengan kami melalui kontak yang tersedia di website ini. Kunjungi SMK Assalaam, Lihat dan Bandingkan !!";
        $komponen->alamat="JL Situtarate Terusan Cibaduyut - Bandung";
        $komponen->akreditasi="A";
        $komponen->save();
    }
}
