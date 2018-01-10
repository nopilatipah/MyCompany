<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\User;
use App\Role;
use App\Ekskul;
use App\Komponen;
use App\Profil;
use App\Vendor;
use App\Bintang;
use App\Pengunjung;
use App\Artikel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chart = Charts::database(Pengunjung::all(), 'bar', 'highcharts')
        ->title('Statistika Pengunjung')
        ->elementLabel("Total")
        ->responsive(false)
        ->groupByMonth('2018', true);

        $charts = Charts::database(Artikel::all(), 'pie', 'highcharts')
        ->title('Statistika Artikel')
        ->elementLabel("Total")
        ->responsive(false)
        ->groupByMonth();

        return view('backend.index', ['chart' => $chart, 'charts' => $charts]);
    }

    public function bintang()
    {
        $komponen = Komponen::find(1);
        $sambutan = Profil::find(1);
        $lokasi = Vendor::find(1);
        $bb = new Bintang;
        $bb->jumlah = 1;
        $bb->save();

        alert()->success('Terimakasih Atas Dukungan Anda')->autoclose(3500);

        return redirect('/');
    }
}
