<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role Admin Utama
        $adminRole = new Role();
        $adminRole->name="admin";
        $adminRole->display_name="Super Admin";
        $adminRole->save();

        //Role Author Fasilitas
        $fasilitasRole = new Role();
        $fasilitasRole->name="fasilitas";
        $fasilitasRole->display_name="Author Fasilitas";
        $fasilitasRole->save();

        //Role Author Artikel
        $artikelRole = new Role();
        $artikelRole->name="artikel";
        $artikelRole->display_name="Author Artikel";
        $artikelRole->save();

        //Role Author Ekskul
        $ekskulRole = new Role();
        $ekskulRole->name="ekskul";
        $ekskulRole->display_name="Author Ekstrakurikuler";
        $ekskulRole->save();

        //Role Author Kejuruan
        $kejuruanRole = new Role();
        $kejuruanRole->name="kejuruan";
        $kejuruanRole->display_name="Author Kejuruan";
        $kejuruanRole->save();

        //Sampel Admin Utama 
        $admin = new User();
        $admin->name="Nopi Latipah";
        $admin->email="admin@gmail.com";
        $admin->password=bcrypt('rahasia');
        $admin->akses="Super Admin";
        $admin->save();
        $admin->attachRole($adminRole);

        //Sampel Author Kejuruan 
        $kejuruan = new User();
        $kejuruan->name="Nopi Latipah";
        $kejuruan->email="kejuruan@gmail.com";
        $kejuruan->password=bcrypt('rahasia');
        $kejuruan->akses="Author Kejuruan";
        $kejuruan->save();
        $kejuruan->attachRole($kejuruanRole);

        //Sampel Author Fasilitas 
        $fasilitas = new User();
        $fasilitas->name="Nopi Latipah";
        $fasilitas->email="fasilitas@gmail.com";
        $fasilitas->password=bcrypt('rahasia');
        $fasilitas->akses="Author Fasilitas";
        $fasilitas->save();
        $fasilitas->attachRole($fasilitasRole);

        //Sampel Author Ekstrakurikuler 
        $ekskul = new User();
        $ekskul->name="Nopi Latipah";
        $ekskul->email="ekskul@gmail.com";
        $ekskul->password=bcrypt('rahasia');
        $ekskul->akses="Author Ekstrakurikuler";
        $ekskul->save();
        $ekskul->attachRole($ekskulRole);

        //Sampel Author Artikel 
        $artikel = new User();
        $artikel->name="Nopi Latipah";
        $artikel->email="artikel@gmail.com";
        $artikel->password=bcrypt('rahasia');
        $artikel->akses="Author Artikel";
        $artikel->save();
        $artikel->attachRole($artikelRole);
    }
}
