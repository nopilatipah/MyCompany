<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ekskul;
use Illuminate\Support\Facades\File;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kejuruans = Ekskul::paginate(5);
        return view('backend.ekskul.index', compact('kejuruans'));
    }

    public function eks($id)
    {
        $kejuruans = Ekskul::where('kategori_id',$id)->paginate(5);
        return view('backend.ekskul.index', compact('kejuruans'));
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
            'nama'=>'required|unique:ekskuls,nama',
            'kategori_id'=>'required',
            'foto'=>'image|max:20048']);
        

        $ekskul= new Ekskul;
        $ekskul->nama = $request->nama;
        $ekskul->kategori_id = $request->kategori_id;

        if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $destinationPath = public_path().'/img/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);
        $ekskul->foto = $filename;
        }
 
        $ekskul->save();
        // dd($ekskul);
        alert()->success('Ekstrakurikuler Tersimpan')->autoclose(3500);
        return redirect()->route('ekskul.index');
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
        if($request->hasFile('foto'))
        {
            $filename=null;
            $uploaded_foto=$request->file('foto');
            $extension=$uploaded_foto->getClientOriginalExtension();
            $filename=md5(time()).'.'.$extension;
            $destinationPath=public_path().DIRECTORY_SEPARATOR.'img';
            $uploaded_foto->move($destinationPath, $filename);
            if($ekskul->foto)
            {
                $old_foto=$ekskul->foto;
                $filepath=public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$ekskul->foto;
                try {
                    File::delete($filepath);
                } catch(FileNotFoundException $e) {

                }
            }
            $ekskul->foto=$filename;
            $ekskul->save();
        }
        alert()->success('Perubahan Tersimpan')->autoclose(3500);
        return redirect()->route('ekskul.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Ekskul::findOrFail($id);
        $user->delete();
            alert()->success('Ekstrakurikuler Terhapus')->autoclose(3500);

        return redirect()->route('ekskul.index');
    }
}
