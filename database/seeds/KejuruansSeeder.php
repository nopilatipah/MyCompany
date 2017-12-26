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
        $kejuruan->profil="possimus numquam fuga. Dicta, nostrum nemo soluta sapiente sit dolor quae voluptas quidem doloribus recusandae facere magni ullam suscipit sunt atque rerum eaque iusto facilis esse nam veniam incidunt officia perspiciatis at voluptatibus. Libero, aliquid illum possimus numquam fuga. Dicta, nostrum nemo soluta sapiente sit dolor quae voluptas quidem doloribus recusandae facere magni ullam suscipit sunt atque rerum eaque iusto facilis esse nam veniam incidunt officia perspiciatis at voluptatibus.";

        $kejuruan->program="possimus numquam fuga. Dicta, nostrum nemo soluta sapiente sit dolor quae voluptas quidem doloribus recusandae facere magni ullam suscipit sunt atque rerum eaque iusto facilis esse nam veniam incidunt officia perspiciatis at voluptatibus. Libero, aliquid illum possimus numquam fuga. Dicta, nostrum nemo soluta sapiente sit dolor quae voluptas quidem doloribus recusandae facere magni ullam suscipit sunt atque rerum eaque iusto facilis esse nam veniam incidunt officia perspiciatis at voluptatibus. Libero, aliquid illum possimus numquam fuga. Dicta, nostrum nemo soluta sapiente sit dolor quae voluptas quidem doloribus recusandae facere magni ullam suscipit sunt atque rerum eaque iusto facilis esse nam veniam incidunt officia perspiciatis at voluptatibus. Libero, aliquid illum possimus numquam fuga.";

        $kejuruan->nama="Teknik Kendaraan Ringan";

        $kejuruan->ruangan="1.jpg";

        $kejuruan->siswa="t1.png";
        $kejuruan->save();

        $jj = new Kejuruan();
        $jj->profil="possimus numquam fuga. Dicta, nostrum nemo soluta sapiente sit dolor quae voluptas quidem doloribus recusandae facere magni ullam suscipit sunt atque rerum eaque iusto facilis esse nam veniam incidunt officia perspiciatis at voluptatibus. Libero, aliquid illum possimus numquam fuga. Dicta, nostrum nemo soluta sapiente sit dolor quae voluptas quidem doloribus recusandae facere magni ullam suscipit sunt atque rerum eaque iusto facilis esse nam veniam incidunt officia perspiciatis at voluptatibus.";

        $jj->program="possimus numquam fuga. Dicta, nostrum nemo soluta sapiente sit dolor quae voluptas quidem doloribus recusandae facere magni ullam suscipit sunt atque rerum eaque iusto facilis esse nam veniam incidunt officia perspiciatis at voluptatibus. Libero, aliquid illum possimus numquam fuga. Dicta, nostrum nemo soluta sapiente sit dolor quae voluptas quidem doloribus recusandae facere magni ullam suscipit sunt atque rerum eaque iusto facilis esse nam veniam incidunt officia perspiciatis at voluptatibus. Libero, aliquid illum possimus numquam fuga. Dicta, nostrum nemo soluta sapiente sit dolor quae voluptas quidem doloribus recusandae facere magni ullam suscipit sunt atque rerum eaque iusto facilis esse nam veniam incidunt officia perspiciatis at voluptatibus. Libero, aliquid illum possimus numquam fuga.";

        $jj->nama="Teknik Sepeda Motor";

        $jj->ruangan="1.jpg";

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
