<?php

use Illuminate\Database\Seeder;
use App\Profil;

class ProfilsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profil = new Profil();
        $profil->profil="<p>SMK Assalaam merupakan sekolah kejuruan dengan kompetensi keahlian teknik kendaraan ringan (roda empat) plus sepeda motor dalam proses pendidikan pelatihan. Peka terhadap perubahan perkembangan teknologi baru dan tuntutan kebutuhan pasar kerja, agar lulusannya siap menghadapi perubahan. SMK Assalaam dengan penuh kesadaran berani melakukan perubahan dengan berbagai inovasi dan improvisasi, mencari terobosan untuk meraih keberhasilan bagi peserta didiknya. Tekad tersebut sebagai wujud nyata dari SMK Assalaam didukung oleh sarana praktek yang lengkap UP TO DATE, waktu praktek memadai dan praktek berstandar industri dengan pelayanan prima. Keunggulan Program pembelajaran disusun berdasarkan standar Nasional dan dikembangkan berdasarkan kebutuhan industri serta bekerjasama dengan DU/DI (Dunia Usaha/Dunia Industri) Menghasilkan lulusan yang siap bekerja,memiliki mentalitas kerja yang tangguh, dan memiliki keterampilan ganda (jurusan otomotif : Mobil + Motor, jurusan RPL : programer + teknisi) Tenaga pendidik berasal dari lulusan perguruan-perguruan tinggi terkemuka, dan pelaku Industri Setiap pelajaran praktek/paket keahlian dilaksanakan dengan menggunakan sistem blok, dengan 3 guru pengajar. Ujian Kompetensi diselenggarakan secara mandiri, menggunakan kendaraan dan alat yang mutakhir . Pengembangan karakter dibentuk atas dasar ajaran ISLAM sebagai fondasi utama dalam berbagai aktivitas siswa. Dibukanya layanan Bursa Kerja Khusus yang menyediakan pelatihan tambahan siswa untuk siap bekerja dan penyaluran lulusan ke dunia kerja Memiliki unit produksi SMK Assalaam yang menjadi laboratorium langsung bagi siswa dalam mengembangkan keterampilan kejuruannya. Sarana dan prasarana pembelajaran yang lengkap dan terkini Juara 2 mekanik Honda tingkat international.</p>";

        $profil->sejarah="<p><strong>Pendirian SMK Assalaam</strong></p>

                          <p>SMK Assalaam berdiri dan diresmikan pada tanggal 2 Mei tahun 2009. Pada tahun tersebut SMK ini baru membuka satu kompetensi keahlian, yaitu Teknik Kendaraan Ringan. Pada tahun 2013 SMK Assalaam membuka kompetensi keahlian Rekayasa Perangkat Lunak. Dan tahun 2014 SMK Assalaam membuka kompetensi keahlian Teknik Sepeda Motor. SMK Assalaam telah terakreditasi oleh Badan Akreditasi Nasional dengan predikat A (Amat Baik).</p>";

        $profil->misi="<ul>
    <li>Intelek dalam melaksanakan proses pembelajaran</li>
    <li>Disiplin dalam segala aspek kehidupan</li>
    <li>Amanah dalam melaksanakan tugas</li>
    <li>Maju dan menang untuk kepentingan bersama</li>
    <li>Aktif dalam merespon perkembangan</li>
    <li>Norma islam sebagai landasan dalam beraktifitas</li>
    </ul>";

        $profil->visi="<p>Menjadikan SMK Assalaam sebagai sekolah <strong>IDAMAN</strong></p>";

        $profil->sambutan="<p><strong>Assalamualaikum Wr, Wb. </strong></p>

<p>SMK Assalaam adalah Sekolah Menengah Kejuruan yang memiliki kelompok kompetensi keahlian Teknik Kendaraan Ringan, Teknik Sepeda Motor, dan Rekayasa Perangkat Lunak. Dengan dukungan dunia usaha dan dunia industri program pembelajaran disusun berdasarkan kolaborasi dari kurikulum dinas pendidikan dan kebutuhan kompetensi dunia industri, sehingga lulusan SMK Assalaam siap menghadapi tantangan industri masa depan.SMK Assalaam berupaya untuk terus menerus mensinkronisasikan kurikulumnya dengan kurikulum di negara-negara maju dan mensikronisasikan dengan Dunia Usaha/Dunia Industri. Sarana dan prasarana yang ada di SMK Assalaam juga disinkronisasikan dengan Dunia Usaha/Dunia Industri sehingga pembelajaran yang ada dapat mendekati Dunia Usaha/Dunia Industri.Lulusannya telah tersebar di berbagai Dunia Usaha/Dunia Industri. Kesempatan untuk melanjutkan studi dan bekerja sangat terbuka luas bagi lulusannya. Bagi siswa yang ingin bekerja &amp; berprestasi didukung langsung oleh Dunia Industri sesuai dengan kualifikasi yang di persyaratkan oleh perusahaan.</p>

<p>&nbsp;</p>

<p>Kepala Sekolah SMK Assalaam</p>

<p>H. Muhammad Luthfi Almanfaluthi, S.T.</p>";

        $profil->foto="ms6.png";
        $profil->save();
    }
}
