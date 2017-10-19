<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\Artikel;
use DB;
use App\Komentar;

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
        $berita = DB::table('artikels')
                        ->join('kategori_artikels','kategori_artikels.id','=','artikels.kategori_id')
                        ->select('artikels.*', 'kategori_artikels.nama as kategori')->get();
        return view('frontend.berita', compact('berita'));
    }

    public function search(Request $request)
    {
        
        $cari =$request->get('judul');
        $hasil = DB::table('artikels')
            ->join('kategori_artikels','kategori_artikels.id','=','artikels.kategori_id')
            ->select('artikels.*', 'kategori_artikels.nama as kategori')
            ->where('artikels.judul','LIKE','%'.$cari.'%')
            ->get();
        $jml = DB::table('artikels')
            ->join('kategori_artikels','kategori_artikels.id','=','artikels.kategori_id')
            ->select('artikels.*', 'kategori_artikels.nama as kategori')
            ->where('artikels.judul','LIKE','%'.$cari.'%')
            ->count();
        $berita = DB::table('artikels')
                        ->join('kategori_artikels','kategori_artikels.id','=','artikels.kategori_id')
                        ->select('artikels.*', 'kategori_artikels.nama as kategori')->get();
    
        return view('frontend.pencarian', compact('hasil','jml','cari','berita'));
    }

    public function kontak()
    {
    	$vendor = Vendor::find(1);
        return view('frontend.kontak', compact('vendor'));
    }

    public function selengkapnya($id)
    {   
        
        $berita = Artikel::find($id);
        $views = $berita->views + 1;
        $berita->views = $views;
        $berita->save();

        return view('frontend.berita-lengkap', compact('berita'));
    }

    public function kategori($id)
    {   
        
        $berita = DB::table('artikels')
            ->join('kategori_artikels','kategori_artikels.id','=','artikels.kategori_id')
            ->select('artikels.*', 'kategori_artikels.nama as kategori')
            ->where('artikels.kategori_id','=',$id)
            ->get();
        $jml = DB::table('artikels')
            ->join('kategori_artikels','kategori_artikels.id','=','artikels.kategori_id')
            ->select('artikels.*', 'kategori_artikels.nama as kategori')
            ->where('artikels.kategori_id','=',$id)
            ->count();
        $kateg = DB::table('artikels')
            ->join('kategori_artikels','kategori_artikels.id','=','artikels.kategori_id')
            ->select('artikels.*', 'kategori_artikels.nama as kategori')
            ->where('artikels.kategori_id','=',$id)
            ->first();
        
        return view('frontend.kategori', compact('berita','jml','kateg'));
    }

    public function like($id)
    {   
        
        $berita = Artikel::find($id);
        $like = $berita->like + 1;
        $berita->like = $like;
        $berita->save();

        alert()->success('Terimakasih Atas Dukungannya','Anda Menyukai Artikel Ini')->autoclose(3500);
        return view('frontend.berita-lengkap', compact('berita'));
    }

    public function unlike($id)
    {   
        
        $berita = Artikel::find($id);
        $unlike = $berita->unlike + 1;
        $berita->unlike = $unlike;
        $berita->save();

        alert()->success('Maaf, Akan Kami Perbaiki','Anda Tidak Menyukai Artikel Ini')->autoclose(3500);
        return view('frontend.berita-lengkap', compact('berita'));
    }

    public function komentar(Request $request)
    {   
        $berita = Artikel::find($request->id);
        
        $komentar = new Komentar();
        $komentar->artikel_id = $request->id;
        $komentar->nama_depan = $request->nama_depan;
        $komentar->nama_belakang = $request->nama_belakang;
        $komentar->komentar = $request->komentar;
        $komentar->save();

        alert()->success('Komentar Terkirim')->autoclose(3500);
        return view('frontend.berita-lengkap', compact('berita'));
    }
}
