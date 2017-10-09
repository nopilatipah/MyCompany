<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;

class FrontController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function profil()
    {
        return view('frontend.profil');
    }

    public function kejuruan()
    {
        return view('frontend.kejuruan');
    }

    public function fasilitas()
    {
        return view('frontend.fasilitas');
    }

    public function ekskul()
    {
        return view('frontend.ekskul');
    }

    public function prestasi()
    {
        return view('frontend.prestasi');
    }

    public function berita()
    {
        return view('frontend.berita');
    }

    public function kontak()
    {
    	$vendor = Vendor::find(1);
        return view('frontend.kontak', compact('vendor'));
    }
}
