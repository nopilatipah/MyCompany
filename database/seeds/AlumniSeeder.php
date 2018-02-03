<?php

use Illuminate\Database\Seeder;
use App\Alumni;
use App\Agenda;
use App\Info;
use App\Pesan;
use App\Pengunjung;
use App\Bintang;
use App\Komentar;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $al1 = new Alumni();
        $al1->nama = "Nopi Latipah";
        $al1->kejuruan = "Teknik Sepeda Motor";
        $al1->pekerjaan = "Mekanik";
        $al1->testimoni = "Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te,nostrud Ne eam errem semper.";
        $al1->foto = "1.jpg";
        $al1->save();

        $al2 = new Alumni();
        $al2->nama = "John Corner";
        $al2->kejuruan = "Teknik Kendaraan Ringan";
        $al2->pekerjaan = "Mekanik";
        $al2->testimoni = "Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te,nostrud Ne eam errem semper.";
        $al2->foto = "2.jpg";
        $al2->save();

        $al3 = new Alumni();
        $al3->nama = "Erlangga Saputra";
        $al3->kejuruan = "Teknik Sepeda Motor";
        $al3->pekerjaan = "Mekanik";
        $al3->testimoni = "Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te,nostrud Ne eam errem semper. ";
        $al3->foto = "4.jpg";
        $al3->save();

        $al4 = new Alumni();
        $al4->nama = "Rina Putri";
        $al4->kejuruan = "Teknik Kendaraan Ringan";
        $al4->pekerjaan = "Mekanik";
        $al4->testimoni = "Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te,nostrud Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te";
        $al4->foto = "3.jpg";
        $al4->save();

        $agenda = new Agenda();
        $agenda->tanggal = "2018-01-11";
        $agenda->kegiatan = "Pra Uji Kompentensi 2018";
        $agenda->save();

        $agenda2 = new Agenda();
        $agenda2->tanggal = "2018-02-11";
        $agenda2->kegiatan = "Uji Kompentensi 2018";
        $agenda2->save();

        $agenda3 = new Agenda();
        $agenda3->tanggal = "2018-02-25";
        $agenda3->kegiatan = "Ujian Sekolah 2018";
        $agenda3->save();

        $agenda4 = new Agenda();
        $agenda4->tanggal = "2018-04-05";
        $agenda4->kegiatan = "Try Out";
        $agenda4->save();

        $agenda5 = new Agenda();
        $agenda5->tanggal = "2018-04-10";
        $agenda5->kegiatan = "Ujian Nasional";
        $agenda5->save();

        $gggg = new Agenda();
        $gggg->tanggal = "2018-03-11";
        $gggg->kegiatan = "Kelulusan";
        $gggg->save();

        $hhhh = new Agenda();
        $hhhh->tanggal = "2018-01-11";
        $hhhh->kegiatan = "Praujikom";
        $hhhh->save();

        $daftar = new Info();
        $daftar->tgl_daftar = "02 Juni - 10 Juli 2018";
        $daftar->waktu = "08.00 - 15.00 WIB";
        $daftar->lokasi = "Kampus SMK Assalaam Bandung";
        $daftar->syarat = "Membawa fotokopi IJAZAH dan SKHUN";
        $daftar->save();

        $pesan = new Pesan();
        $pesan->nama_depan = "Dudung";
        $pesan->nama_belakang = "Sudirman";
        $pesan->email = "dudung@gmail.com";
        $pesan->subjek = "Fasilitas";
        $pesan->pesan = "Fasilitas SMK Assalaam Sangat Lengkap";
        $pesan->status = "1";
        $pesan->save();

        $aa = new Pesan();
        $aa->nama_depan = "Jajang";
        $aa->nama_belakang = "Hermawan";
        $aa->email = "jajang@gmail.com";
        $aa->subjek = "Kejuruan TKR";
        $aa->pesan = "Saya suka jurusan TKR di SMK Assalaam";
        $aa->status = "1";
        $aa->save();

        $bb = new Pesan();
        $bb->nama_depan = "Udin";
        $bb->nama_belakang = "Rohmat";
        $bb->email = "udin@gmail.com";
        $bb->subjek = "Ekstrakurikuler";
        $bb->pesan = "Tambahin Ekskul Paskibra dong di Assalaam";
        $bb->status = "0";
        $bb->save();

        $p = new Pengunjung();
        $p->address = "192.168.0.1";
        $p->save();

        $pp = new Pengunjung();
        $pp->address = "192.168.0.2";
        $pp->save();

        $ppp = new Pengunjung();
        $ppp->address = "192.168.0.2";
        $ppp->save();

        $bbb = new Bintang();
        $bbb->jumlah = 10;
        $bbb->save();

        $kom = new Komentar();
        $kom->artikel_id = 1;
        $kom->status = 0;
        $kom->nama_depan = "Rina";
        $kom->nama_belakang = "Syanti";
        $kom->komentar = "Artikel yang bagus !!! ";
        $kom->save();

        $km = new Komentar();
        $km->artikel_id = 1;
        $km->status = 1;
        $km->nama_depan = "Rissa";
        $km->nama_belakang = "Veliana";
        $km->komentar = "Waah Assalaam Keren !!! ";
        $km->save();
    }
}
