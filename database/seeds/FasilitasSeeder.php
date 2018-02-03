<?php

use Illuminate\Database\Seeder;
use App\Fasilitas;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new Fasilitas();
        $a->judul = "Ruang Kelas";
        $a->kategori = "1";
        $a->foto = "f1.jpg";
        $a->save();

        $b = new Fasilitas();
        $b->judul = "Ruang Kelas";
        $b->kategori = "1";
        $b->foto = "f2.jpg";
        $b->save();

        $c = new Fasilitas();
        $c->judul = "Bengkel TKR";
        $c->kategori = "2";
        $c->foto = "f3.jpg";
        $c->save();

        $d = new Fasilitas();
        $d->judul = "Bengkel TKR";
        $d->kategori = "2";
        $d->foto = "f4.jpg";
        $d->save();

        $e = new Fasilitas();
        $e->judul = "Lab RPL";
        $e->kategori = "2";
        $e->foto = "f5.jpg";
        $e->save();

        $f = new Fasilitas();
        $f->judul = "Lab RPL";
        $f->kategori = "2";
        $f->foto = "f6.jpg";
        $f->save();

        $g = new Fasilitas();
        $g->judul = "Bengkel TSM";
        $g->kategori = "2";
        $g->foto = "f7.jpg";
        $g->save();

        $h = new Fasilitas();
        $h->judul = "Bengkel TSM";
        $h->kategori = "2";
        $h->foto = "f8.jpg";
        $h->save();

        $i = new Fasilitas();
        $i->judul = "Perpustakaan";
        $i->kategori = "3";
        $i->foto = "f9.jpg";
        $i->save();

        $j = new Fasilitas();
        $j->judul = "Gedung";
        $j->kategori = "3";
        $j->foto = "f10.jpg";
        $j->save();

        $k = new Fasilitas();
        $k->judul = "UP Otomotif";
        $k->kategori = "4";
        $k->foto = "f11.jpg";
        $k->save();

        $l = new Fasilitas();
        $l->judul = "UP RPL";
        $l->kategori = "4";
        $l->foto = "f12.jpg";
        $l->save();
    }
}
