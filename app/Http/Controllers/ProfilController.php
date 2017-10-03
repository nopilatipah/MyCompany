<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profil;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        //
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
        $profils=Profil::find($id);
        return view('backend.profil.index')->with(compact('profils'));
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
        $profils = Profil::find($id);
        $profils->update($request->all());
        if($request->hasFile('lokasi'))
        {
            $filename=null;
            $uploaded_lokasi=$request->file('lokasi');
            $extension=$uploaded_lokasi->getClientOriginalExtension();
            $filename=md5(time()).'.'.$extension;
            $destinationPath=public_path().DIRECTORY_SEPARATOR.'img';
            $uploaded_lokasi->move($destinationPath, $filename);
            if($profils->lokasi)
            {
                $old_lokasi=$profils->lokasi;
                $filepath=public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$profils->lokasi;
                try {
                    File::delete($filepath);
                } catch(FileNotFoundException $e) {

                }
            }
            $profils->lokasi=$filename;
            $profils->save();
        }

        if($request->hasFile('foto'))
        {
            $filename=null;
            $uploaded_foto=$request->file('foto');
            $extension=$uploaded_foto->getClientOriginalExtension();
            $filename=md5(time()).'.'.$extension;
            $destinationPath=public_path().DIRECTORY_SEPARATOR.'img';
            $uploaded_foto->move($destinationPath, $filename);
            if($profils->foto)
            {
                $old_foto=$profils->foto;
                $filepath=public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$profils->foto;
                try {
                    File::delete($filepath);
                } catch(FileNotFoundException $e) {

                }
            }
            $profils->foto=$filename;
            $profils->save();
        }


        alert()->success('Perubahan Berhasil Disimpan')->autoclose(3500);
        return redirect()->route('profil.edit',1)->with(compact('profils'));;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
