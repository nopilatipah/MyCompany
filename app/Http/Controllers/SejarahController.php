<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sejarah;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $sejarah = new Sejarah;
        $sejarah->waktu = $request->waktu;
        $sejarah->judul = $request->judul;
        $sejarah->keterangan = $request->keterangan;
        $sejarah->save();
        alert()->success('Riwayat Tersimpan')->autoclose(3500);
        return redirect('/admin/profil/1/edit');
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
        $sejarah = Sejarah::find($id);
        $sejarah->waktu = $request->waktu;
        $sejarah->judul = $request->judul;
        $sejarah->keterangan = $request->keterangan;
        $sejarah->save();
        alert()->success('Riwayat Tersimpan')->autoclose(3500);
        return redirect('/admin/profil/1/edit');
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
