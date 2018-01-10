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
use App\Ekskul;
use App\Fasilitas;
use App\Notifications\NotifyPostOwner;
use App\User;
use App\Prestasi;
use App\Pengunjung;
use Vinkla\Instagram\Instagram;

class FrontController extends Controller
{
    public function index()
    {
        
        $komponen = Komponen::find(1);
        $sambutan = Profil::find(1);
        $lokasi = Vendor::find(1);
        $ss = Pengunjung::where('address','=', \Request::getClientIp())->get();
        if ($ss->count() == 0)
        {
            $pp = new Pengunjung;
            $pp->address = \Request::getClientIp();
            $pp->save();
        }
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
        $komponen = Komponen::find(1);
        $fasilitas = Fasilitas::all();
        return view('frontend.fasilitas',compact('fasilitas','komponen'));
    }

    public function fasilitasfilter($id)
    {
        $komponen = Komponen::find(1);
        $fasilitas = Fasilitas::where('kategori','=',$id)->get();
        return view('frontend.fasilitas',compact('fasilitas','komponen'));
    }

    public function ekskul()
    {
        $komponen = Komponen::find(1);
        $ekskul = Ekskul::all();
        $prestasi = Prestasi::all();
        return view('frontend.ekskul',compact('ekskul','komponen','prestasi'));
    }

    public function ekskulfilter($id)
    {
        $prestasi = Prestasi::all();
        $komponen = Komponen::find(1);
        $ekskul = Ekskul::where('kategori_id','=',$id)->get();
        return view('frontend.ekskul',compact('ekskul','komponen','prestasi'));
    }

    public function prestasi()
    {
        return view('frontend.prestasi');
    }

    public function galeri()
    {
        $instagram = new Instagram('6754770736.1677ed0.a6499dbf6f3e40279017182e324b98ad');
        $instagram->get();
        // dd($instagram);
        return view('frontend.galeri',compact('instagram'));
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

        $artikel = Artikel::find($request->id);
        // User::find(1)->notify(new NotifyPostOwner($artikel));

        alert()->success('Komentar Terkirim')->autoclose(3500);
        return view('frontend.berita-lengkap', compact('berita'));
    }
}
