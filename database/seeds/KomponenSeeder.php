<?php

use Illuminate\Database\Seeder;
use App\Komponen;
use App\Kontak;

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
        $komponen->logo="logo-1.png";
        $komponen->nama_sekolah="SMK ASSALAAM BANDUNG";
        $komponen->deskripsi="Industries Education Based";
        $komponen->tentang="Anda dapat mengikuti berbagai macam kegiatan dan informasi mengenai SMK Assalaam Bandung melalui media sosial. Ataupun anda dapat berkomunikasi langsung dengan kami melalui kontak yang tersedia di website ini. Kunjungi SMK Assalaam, Lihat dan Bandingkan !!";
        $komponen->akreditasi="A";
        $komponen->motto="SEKOLAH IDAMAN";
        $komponen->foto_utama="student-home.png";
        $komponen->save();

        $facebook = new Kontak();
        $facebook->jenis="Facebook";
        $facebook->kontak="SMK Assalaam Bandung";
        $facebook->link="www.facebook.com";
        $facebook->save();

        $twitter = new Kontak();
        $twitter->jenis="Twitter";
        $twitter->kontak="@Smkassalaambandung";
        $twitter->link="www.twitter.com";
        $twitter->save();

        $fax = new Kontak();
        $fax->jenis="Fax";
        $fax->kontak="1213435453";
        $fax->link="www.fax.com";
        $fax->save();

        $youtube = new Kontak();
        $youtube->jenis="Youtube";
        $youtube->kontak="SMK Assalaam Bandung";
        $youtube->link="www.youtube.com";
        $youtube->save();

        $ig = new Kontak();
        $ig->jenis="Instagram";
        $ig->kontak="@Smkassalaam";
        $ig->link="www.instagram.com";
        $ig->save();

        $wa = new Kontak();
        $wa->jenis="Whatsapp";
        $wa->kontak="+62 8217-7667-1248";
        $wa->save();

        $email = new Kontak();
        $email->jenis="Email";
        $email->kontak="Smk@smkassalaambandung.sch.id";
        $email->save();

        $tlp = new Kontak();
        $tlp->jenis="Telepon";
        $tlp->kontak="022-656211";
        $tlp->save();

    }
}
