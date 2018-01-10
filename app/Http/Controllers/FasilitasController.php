<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fasilitas;
use Illuminate\Support\Facades\File;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas = Fasilitas::paginate(5);
        return view('backend.fasilitas.index', compact('fasilitas'));
    }

    public function fas($id)
    {
        $fasilitas = Fasilitas::where('kategori','=',$id)->paginate(5);
        return view('backend.fasilitas.index', compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'judul'=>'required|unique:fasilitas,judul',
            'kategori'=>'required',
            'foto'=>'image|max:20048']);
        

        $fasilitas= new Fasilitas;
        $fasilitas->judul = $request->judul;
        $fasilitas->kategori = $request->kategori;
        if ($request->has('keterangan')){
        $fasilitas->keterangan = $request->keterangan;
        }

        if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $destinationPath = public_path().'/img/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);
        $fasilitas->foto = $filename;
        }
 
        $fasilitas->save();
        // dd($fasilitas);
        alert()->success('Fasilitas Tersimpan')->autoclose(3500);
        return redirect()->route('fasilitas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $fasilitas = Fasilitas::find($id);
        $fasilitas->update($request->all());
        if ($request->has('keterangan')){
        $fasilitas->keterangan = $request->keterangan;
        }
        if($request->hasFile('foto'))
        {
            $filename=null;
            $uploaded_foto=$request->file('foto');
            $extension=$uploaded_foto->getClientOriginalExtension();
            $filename=md5(time()).'.'.$extension;
            $destinationPath=public_path().DIRECTORY_SEPARATOR.'img';
            $uploaded_foto->move($destinationPath, $filename);
            if($fasilitas->foto)
            {
                $old_foto=$fasilitas->foto;
                $filepath=public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$fasilitas->foto;
                try {
                    File::delete($filepath);
                } catch(FileNotFoundException $e) {

                }
            }
            $fasilitas->foto=$filename;
            $fasilitas->save();
        }
        alert()->success('Perubahan Tersimpan')->autoclose(3500);
        return redirect()->route('fasilitas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Fasilitas::findOrFail($id);
        $user->delete();
            alert()->success('Fasilitas Terhapus')->autoclose(3500);

        return redirect()->route('fasilitas.index');
    }
}
