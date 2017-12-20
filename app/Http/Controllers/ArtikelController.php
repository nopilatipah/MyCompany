<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use Illuminate\Support\Facades\Auth;
use DB;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikels = DB::table('artikels')->join('kategori_artikels','artikels.kategori_id','=','kategori_artikels.id')
                            ->select('artikels.*','kategori_artikels.nama as kategori')->orderBy('artikels.id','desc')->paginate(5);
        return view('backend.artikel.index', compact('artikels'));
    }

    public function art($id)
    {
        $artikels = DB::table('artikels')->join('kategori_artikels','artikels.kategori_id','=','kategori_artikels.id')
                            ->select('artikels.*','kategori_artikels.nama as kategori')->where('kategori_id',$id)->orderBy('artikels.id','desc')->paginate(5);
        return view('backend.artikel.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul'=>'required|unique:artikels,judul',
            'konten'=>'required',
            'tgl_kegiatan'=>'required',
            'kategori_id'=>'required',
            'foto'=>'image|max:20048']);
        
        $author = Auth::user()->name;
        $artikel= new Artikel;
        $artikel->author = $author;
        $artikel->judul = $request->judul;
        $artikel->konten = $request->konten;
        $artikel->tgl_kegiatan = $request->tgl_kegiatan;
        $artikel->kategori_id = $request->kategori_id;



        if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $destinationPath = public_path().'/img/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);
        $artikel->foto = $filename;
        }

        $artikel->save();
        
        
        // dd($artikel);
        alert()->success('Artikel Tersimpan')->autoclose(3500);
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = DB::table('artikels')->join('kategori_artikels','artikels.kategori_id','=','kategori_artikels.id')
                            ->select('artikels.*','kategori_artikels.nama as kategori')->orderBy('artikels.id','desc')
                            ->where('artikels.id','=',$id)
                            ->get();
        return view('backend.artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::find($id);
        return view('backend.artikel.edit',compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul'=>'required',
            'konten'=>'required',
            'tgl_kegiatan'=>'required',
            'kategori_id'=>'required',
            'foto'=>'image|max:20048']);
        $artikel = Artikel::find($id);
        $author = Auth::user()->name;
        $artikel->author = $author;
        $artikel->judul = $request->judul;
        $artikel->konten = $request->konten;
        $artikel->tgl_kegiatan = $request->tgl_kegiatan;
        $artikel->kategori_id = $request->kategori_id;

        if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $destinationPath = public_path().'/img/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);
        $artikel->foto = $filename;
        }

        $artikel->save();
        // dd($artikel);
        alert()->success('Perubahan Tersimpan')->autoclose(3500);
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Artikel::find($id);
            $member->delete();
            alert()->success('Artikel Terhapus')->autoclose(3500);

        return redirect()->route('artikel.index');
    }
}
