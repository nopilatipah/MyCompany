<?php

use Illuminate\Database\Seeder;
use App\Alumni;

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
        $al1->testimoni = "Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te,nostrud Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te";
        $al1->foto = "1.jpg";
        $al1->save();

        $al2 = new Alumni();
        $al2->nama = "John Corner";
        $al2->kejuruan = "Teknik Kendaraan Ringan";
        $al2->pekerjaan = "Mekanik";
        $al2->testimoni = "Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te,nostrud Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te";
        $al2->foto = "2.jpg";
        $al2->save();

        $al3 = new Alumni();
        $al3->nama = "Erlangga Saputra";
        $al3->kejuruan = "Teknik Sepeda Motor";
        $al3->pekerjaan = "Mekanik";
        $al3->testimoni = "Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te,nostrud Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te";
        $al3->foto = "4.jpg";
        $al3->save();

        $al4 = new Alumni();
        $al4->nama = "Rina Putri";
        $al4->kejuruan = "Teknik Kendaraan Ringan";
        $al4->pekerjaan = "Mekanik";
        $al4->testimoni = "Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te,nostrud Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te, nostrud Ne eam errem semper. Laudem detracto phaedrum cu vim, pri cu errem fierent fabellas. Quis magna in ius, pro vidit nonumy te";
        $al4->foto = "3.jpg";
        $al4->save();
    }
}
