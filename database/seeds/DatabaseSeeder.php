<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ProfilsSeeder::class);
        $this->call(KejuruansSeeder::class);
        $this->call(KategoriFasilitasSeeder::class);
        $this->call(KomponenSeeder::class);
        $this->call(EkskulSeeder::class);
        $this->call(UtamaSeeder::class);
        $this->call(ArtikelSeeder::class);
        $this->call(PrestasiSeeder::class);
        $this->call(FasilitasSeeder::class);
        $this->call(AlumniSeeder::class);
    }
}
