<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumni;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumni = Alumni::paginate(5);
        return view('backend.alumni.index', compact('alumni'));
    }

    public function alm($id)
    {
        $alumni = Alumni::where('kejuruan',$id)->paginate(5);
        return view('backend.alumni.index', compact('alumni'));
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
            'nama'=>'required|unique:alumnis,nama',
            'kejuruan'=>'required',
            'pekerjaan'=>'required',
            'testimoni'=>'required',
            'foto'=>'image|max:20048']);
        

        $alumni= new Alumni;
        $alumni->nama = $request->nama;
        $alumni->kejuruan = $request->kejuruan;
        $alumni->pekerjaan = $request->pekerjaan;
        $alumni->testimoni = $request->testimoni;
        

        if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $destinationPath = public_path().'/img/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);
        $alumni->foto = $filename;
        }
 
        $alumni->save();
        // dd($alumni);
        alert()->success('Testimoni Tersimpan')->autoclose(3500);
        return redirect()->route('alumni.index');
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
        $alumni = Alumni::find($id);
        $alumni->update($request->all());
        if($request->hasFile('foto'))
        {
            $filename=null;
            $uploaded_foto=$request->file('foto');
            $extension=$uploaded_foto->getClientOriginalExtension();
            $filename=md5(time()).'.'.$extension;
            $destinationPath=public_path().DIRECTORY_SEPARATOR.'img';
            $uploaded_foto->move($destinationPath, $filename);
            if($alumni->foto)
            {
                $old_foto=$alumni->foto;
                $filepath=public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$alumni->foto;
                try {
                    File::delete($filepath);
                } catch(FileNotFoundException $e) {

                }
            }
            $alumni->foto=$filename;
            $alumni->save();
        }
        alert()->success('Perubahan Tersimpan')->autoclose(3500);
        return redirect()->route('alumni.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Alumni::findOrFail($id);
        $user->delete();
            alert()->success('Testimoni Terhapus')->autoclose(3500);

        return redirect()->route('alumni.index');
    }
}
