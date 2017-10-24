<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;
use App\Vendor;
use App\Komponen;
use App\Kontak;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class UtamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor = Vendor::find(1);
        $komponen = Komponen::find(1);
        $fb = Kontak::find(1);
        $tw = Kontak::find(2);
        $fx = Kontak::find(3);
        $yt = Kontak::find(4);
        $ig = Kontak::find(5);
        $wa = Kontak::find(6);
        $email = Kontak::find(7);
        $tlp = Kontak::find(8);
        return view('backend.utama.index', compact('vendor','komponen','fb','tw','fx','yt','ig','wa','email','tlp'));
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
        $komponen = Komponen::find($id);
        $komponen->update($request->all());
        if($request->hasFile('logo'))
        {
            $filename=null;
            $uploaded_logo=$request->file('logo');
            $extension=$uploaded_logo->getClientOriginalExtension();
            $filename=md5(time()).'.'.$extension;
            $destinationPath=public_path().DIRECTORY_SEPARATOR.'img';
            $uploaded_logo->move($destinationPath, $filename);
            if($komponen->logo)
            {
                $old_logo=$komponen->logo;
                $filepath=public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$komponen->logo;
                try {
                    File::delete($filepath);
                } catch(FileNotFoundException $e) {

                }
            }
            $komponen->logo=$filename;
            $komponen->save();
        }

        if($request->hasFile('foto_utama'))
        {
            $filename=null;
            $uploaded_logo=$request->file('foto_utama');
            $extension=$uploaded_logo->getClientOriginalExtension();
            $filename=md5(time()).'.'.$extension;
            $destinationPath=public_path().DIRECTORY_SEPARATOR.'img';
            $uploaded_logo->move($destinationPath, $filename);
            if($komponen->foto_utama)
            {
                $old_logo=$komponen->foto_utama;
                $filepath=public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$komponen->foto_utama;
                try {
                    File::delete($filepath);
                } catch(FileNotFoundException $e) {

                }
            }
            $komponen->foto_utama=$filename;
            $komponen->save();
        }

        alert()->success('Perubahan Berhasil Disimpan')->autoclose(3500);
        return redirect()->route('utama.index');
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
