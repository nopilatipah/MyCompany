<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\Artikel;
use DB;
use App\Komentar;
use App\KategoriArtikel;
use App\Komponen;
use App\Profil;
use App\Kontak;
use App\Kejuruan;

class FrontController extends Controller
{
    public function index()
    {
        $komponen = Komponen::find(1);
        $sambutan = Profil::find(1);
        $lokasi = Vendor::find(1);
        return view('frontend.index',compact('komponen','sambutan','lokasi'));
    }

    public function profil()
    {
        $profil = Profil::find(1);
        $komponen = Komponen::find(1);
        $lokasi = Vendor::find(1);
        return view('frontend.profil',compact('profil','komponen','lokasi'));
    }

    public function kejuruan()
    {
        $komponen = Komponen::find(1);
        $kejuruan = Kejuruan::all();
        return view('frontend.kejuruan', compact('komponen','kejuruan'));
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

    public function galeri()
    {
        $link = Kontak::find(5);
        $items = [];

        
        $client = new \GuzzleHttp\Client;

        $url = sprintf('https://www.instagram.com/smkassalaam/media');

        $response = $client->get($url);

        $items = json_decode((string) $response->getBody(), true)['items'];


        return view('frontend.galeri',compact('items'));
    }

    public function berita()
    {
        $berita = DB::table('artikels')
                        ->join('kategori_artikels','kategori_artikels.id','=','artikels.kategori_id')
                        ->select('artikels.*', 'kategori_artikels.nama as kategori')
                        ->orderBy('artikels.id','desc')->paginate(2);
        return view('frontend.berita', ['berita' => $berita]);
    }

    public function search(Request $request)
    {
        
        $cari =$request->get('judul');
        $hasil = DB::table('artikels')
            ->join('kategori_artikels','kategori_artikels.id','=','artikels.kategori_id')
            ->select('artikels.*', 'kategori_artikels.nama as kategori')
            ->where('artikels.judul','LIKE','%'.$cari.'%')
            ->orderBy('artikels.id','desc')->paginate(2);
        $jml = DB::table('artikels')
            ->join('kategori_artikels','kategori_artikels.id','=','artikels.kategori_id')
            ->select('artikels.*', 'kategori_artikels.nama as kategori')
            ->where('artikels.judul','LIKE','%'.$cari.'%')
            ->count();
        $berita = DB::table('artikels')
                        ->join('kategori_artikels','kategori_artikels.id','=','artikels.kategori_id')
                        ->select('artikels.*', 'kategori_artikels.nama as kategori')
                        ->orderBy('artikels.id','desc')->paginate(2);
    
        return view('frontend.pencarian', compact('hasil','jml','cari','berita'));
    }

    public function kontak()
    {
    	$vendor = Vendor::find(1);
        $komponen = Komponen::find(1);
        return view('frontend.kontak', compact('vendor','komponen'));
    }

    public function selengkapnya($id)
    {   
        
        $berita = Artikel::find($id);
        $views = $berita->views + 1;
        $berita->views = $views;
        $berita->save();

        return view('frontend.berita-lengkap', compact('berita'));
    }

    public function detailkejuruan($id)
    {   
        
        $kejuruan = Kejuruan::find($id);
        $komponen = Komponen::find(1);

        return view('frontend.detailkejuruan', compact('kejuruan','komponen'));
    }

    public function kategori($id)
    {   
        
        $berita = DB::table('artikels')
            ->join('kategori_artikels','kategori_artikels.id','=','artikels.kategori_id')
            ->select('artikels.*', 'kategori_artikels.nama as kategori')
            ->where('artikels.kategori_id','=',$id)
            ->orderBy('artikels.id','desc')->paginate(2);
        $bb = DB::table('artikels')
            ->join('kategori_artikels','kategori_artikels.id','=','artikels.kategori_id')
            ->select('artikels.*', 'kategori_artikels.nama as kategori')
            ->orderBy('artikels.id','desc')->paginate(2);
        $jml = DB::table('artikels')
            ->join('kategori_artikels','kategori_artikels.id','=','artikels.kategori_id')
            ->select('artikels.*', 'kategori_artikels.nama as kategori')
            ->where('artikels.kategori_id','=',$id)
            ->count();
        $kateg = KategoriArtikel::find($id);
        
        return view('frontend.kategori', compact('berita','jml','kateg','bb'));
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
