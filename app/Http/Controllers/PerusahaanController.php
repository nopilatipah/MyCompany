<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perusahaan;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perusahaan = Perusahaan::orderBy('kejuruan_id')->paginate(4);
        return view('backend.perusahaan.index', compact('perusahaan'));
    }

    public function pers($id)
    {
        $perusahaan = Perusahaan::where('kejuruan_id','=',$id)->paginate(4);
        return view('backend.perusahaan.index', compact('perusahaan'));
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
            'nama'=>'required|unique:perusahaans,nama',
            'kejuruan_id'=>'required',
            'logo'=>'image|max:20048']);
        

        $perusahaan= new Perusahaan;
        $perusahaan->nama = $request->nama;
        $perusahaan->kejuruan_id = $request->kejuruan_id;

        if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $destinationPath = public_path().'/img/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);
        $perusahaan->logo = $filename;
        }
 
        $perusahaan->save();
        // dd($perusahaan);
        alert()->success('Perusahaan Tersimpan')->autoclose(3500);
        return redirect()->route('perusahaan.index');
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
        $perusahaan = Perusahaan::find($id);
        $perusahaan->update($request->all());
        if($request->hasFile('logo'))
        {
            $filename=null;
            $uploaded_logo=$request->file('logo');
            $extension=$uploaded_logo->getClientOriginalExtension();
            $filename=md5(time()).'.'.$extension;
            $destinationPath=public_path().DIRECTORY_SEPARATOR.'img';
            $uploaded_logo->move($destinationPath, $filename);
            if($perusahaan->logo)
            {
                $old_logo=$perusahaan->logo;
                $filepath=public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$perusahaan->logo;
                try {
                    File::delete($filepath);
                } catch(FileNotFoundException $e) {

                }
            }
            $perusahaan->logo=$filename;
            $perusahaan->save();
        }

        alert()->success('Perubahan Tersimpan')->autoclose(3500);
        return redirect()->route('perusahaan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Perusahaan::findOrFail($id);
        $user->delete();
            alert()->success('Perusahaan Terhapus')->autoclose(3500);

        return redirect()->route('perusahaan.index');
    }
}
