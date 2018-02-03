<?php

use Illuminate\Database\Seeder;
use App\Kejuruan;
use App\Perusahaan;

class KejuruansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kejuruan = new Kejuruan();
        $kejuruan->profil="Pilihan bermutu bagi generasi maju. Sekolah terpilih pelaksanaan Kurikulum Berbasis Industri yang siap mencetak calon-calon mekanik handal dan berkualitas. Siswa yang kompeten didalam keterampilan, pengetahuan, mental, dan sikap berakhlakul karimah adalah modal utama kami untuk melahirkan mekanik Otomotif dan Service Advancer yang siap terjun dan bersaing dalam menjawab kebutuhan Industri.";

        $kejuruan->program="<ul>
    <li>
    <p><strong>KELAS X : Engine dan Tune Up Konvensional</strong></p>
    </li>
    <li>
    <p><strong>KELAS XI : Chasis dan Power Traint</strong></p>
    </li>
    <li>
    <p><strong>KELAS XII : Service Berkala 40.000 KM</strong></p>
    </li>
</ul>";

        $kejuruan->nama="Teknik Kendaraan Ringan";

        $kejuruan->ruangan="ruangantkr.jpg";

        $kejuruan->siswa="t1.png";
        $kejuruan->save();

        $kjk = new Kejuruan();
        $kjk->profil="Pilihan berkualitas untuk generasi cerdas. Program pembelajaran berbasis Teknologi Informasi, siap menjadi bekal keahlian membentuk programmer handal yang mampu mengembangkan kemampuan diri sesuai dengan tuntutan kemajuan zaman, menjawab peluang kerja berbasis teknologi Komputer di berbagai sektor.";

        $kjk->program="<ul>
    <li><strong>KELAS X : </strong></li>
</ul>

<ol>
    <li><strong>Siswa mampu membuat aplikasi sederhana.</strong></li>
    <li><strong>Siswa mampu membuat dan menerapkan Database.</strong></li>
    <li><strong>Siswa mampu membuat aplikasi yang terintegrasi dengan Database.</strong></li>
    <li><strong>Siswa mampu membuat Web berbasis HTML.</strong></li>
</ol>

<ul>
    <li><strong>KELAS XI&nbsp;:</strong></li>
</ul>

<ol>
    <li><strong>Siswa mampu membuat Web berbasis PHP.</strong></li>
    <li><strong>Siswa mampu membuat aplikasi dinamis menggunakan framework.</strong></li>
    <li><strong>Siswa mampu membuat aplikasi sederhana.</strong></li>
    <li><strong>Siswa mampu membuat aplikasi dinamis berbasis mobile.</strong></li>
</ol>

<ul>
    <li><strong>KELAS XII :</strong></li>
</ul>

<ol>
    <li><strong>Siswa mampu menganalisis dari permasalahan lingkungan untuk kemudian dibuat sistem atau aplikasi.</strong></li>
</ol>";

        $kjk->nama="Rekayasa Perangkat Lunak";

        $kjk->ruangan="ruanganrpl.jpg";

        $kjk->siswa="t3.png";
        $kjk->save();

        $jj = new Kejuruan();
        $jj->profil="Pilihan tepat untuk mekanik hebat. Pembelajaran praktik yang inovatif, siap melatih siswa agar mampu menerapkan pengetahuan secara logis, kritis, dan kreatif. Pemahaman konsep disertai praktik menjadi modal dasar para calon mekanik handal sehingga mampu mengaplikasikan dasar operasional komponen dan unit sistem pada otomotif. lulusan TSM kami, siap tempur ditengah serbuan produksi Sepeda Motor yang kian canggih dan menjamur.";

        $jj->program="<ul>
    <li><strong>KELAS X : Tune Up Konvensional 4000 KM</strong></li>
    <li><strong>KELAS XI : Overhaul Engine, Electrical Body dan Chassis</strong></li>
    <li><strong>KELAS XII : Trauble Shooting Konvensional dan PGM-FI</strong></li>
</ul>";

        $jj->nama="Teknik Sepeda Motor";

        $jj->ruangan="ruangantsm.jpg";

        $jj->siswa="t2.png";
        $jj->save();

        $pers = new Perusahaan();
        $pers->nama = "PT. Honda";
        $pers->kejuruan_id = "1";
        $pers->logo = "logo2.png";
        $pers->save();

        $pers2 = new Perusahaan();
        $pers2->nama = "PT. Belogix";
        $pers2->kejuruan_id = "2";
        $pers2->logo = "logo1.png";
        $pers2->save();

        $pers3 = new Perusahaan();
        $pers3->nama = "PT. Len";
        $pers3->kejuruan_id = "2";
        $pers3->logo = "logo3.png";
        $pers3->save();

        $pers5 = new Perusahaan();
        $pers5->nama = "PT. Mitsubishi";
        $pers5->kejuruan_id = "2";
        $pers5->logo = "mitsubishi.png";
        $pers5->save();
    }
}
