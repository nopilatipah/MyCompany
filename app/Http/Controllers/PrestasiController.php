<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestasi;
use Illuminate\Support\Facades\File;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kejuruans = Prestasi::paginate(5);
        return view('backend.prestasi.index', compact('kejuruans'));
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
            'judul'=>'required',
            'gambar'=>'image|max:20048']);
        

        $prestasi= new Prestasi;
        $prestasi->judul = $request->judul;
        $prestasi->keterangan = $request->keterangan;

        if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $destinationPath = public_path().'/img/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);
        $prestasi->gambar = $filename;
        }
 
        $prestasi->save();
        // dd($prestasi);
        alert()->success('Prestasi Tersimpan')->autoclose(3500);
        return redirect()->route('prestasi.index');
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
        $ekskul = Ekskul::find($id);
        $ekskul->update($request->all());
        if ($request->has('keterangan')){
        $ekskul->keterangan = $request->keterangan;
        }
        if($request->hasFile('gambar'))
        {
            $filename=null;
            $uploaded_gambar=$request->file('gambar');
            $extension=$uploaded_gambar->getClientOriginalExtension();
            $filename=md5(time()).'.'.$extension;
            $destinationPath=public_path().DIRECTORY_SEPARATOR.'img';
            $uploaded_gambar->move($destinationPath, $filename);
            if($ekskul->gambar)
            {
                $old_gambar=$ekskul->gambar;
                $filepath=public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$ekskul->gambar;
                try {
                    File::delete($filepath);
                } catch(FileNotFoundException $e) {

                }
            }
            $ekskul->gambar=$filename;
            $ekskul->save();
        }
        alert()->success('Perubahan Tersimpan')->autoclose(3500);
        return redirect()->route('prestasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Prestasi::findOrFail($id);
        $user->delete();
            alert()->success('Prestasi Terhapus')->autoclose(3500);

        return redirect()->route('prestasi.index');
    }
}
