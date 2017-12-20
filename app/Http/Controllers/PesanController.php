<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesan;
use DB;
use App\Komponen;
use Mail;
use App\Balasan;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesan = DB::table('pesans')->select('pesans.*')->where('status',0)->paginate(10);
        $dulu = DB::table('pesans')->select('pesans.*')->where('status',1)->paginate(10);
        return view('backend.pesan.index', compact('pesan','dulu'));
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
        $pesan = Pesan::create($request->all());
        $komponen = Komponen::find(1);
        alert()->success('Terimakasih Anda Telah Menghubungi Kami','Pesan Terkirim')->autoclose(3500);
        return view('frontend.kontak', compact('komponen'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesan = Pesan::find($id);
        $pesan->status = 1;
        $pesan->save();

        $pesans = DB::table('pesans')->select('pesans.*')->where('status',0)->paginate(10);

        return view('backend.pesan.balas', compact('pesan','pesans'));
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
        $pesan = Pesan::find($id);
        $balas = new Balasan;
        $balas->pesan_id = $id;
        $balas->balasan = $request->balasan;
        $balas->save();

        Mail::raw($request->balasan, function($message)
        {
            $message->subject('Terimakasih Anda Telah Menghubungi Kami');
            $message->from('smkassalaambandung@gmail.com', 'SMK Assalaam Bandung');
            $message->to('nopilatipah.nola@gmail.com');
        });

        alert()->success('Balasan Terkirim')->autoclose(3500);
        return redirect()->route('pesan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Pesan::findOrFail($id);
        $user->delete();
            alert()->success('Pesan Terhapus')->autoclose(3500);

        return redirect()->route('pesan.index');
    }

    public function kirim(Request $request, $id)
    {
        $pesan = Pesan::find($id);
        $balas = new Balas;
        $balas->pesan_id = $id;
        $balas->balasan = $request->balasan;
        $balas->save();

        Mail::raw($request->balasan, function($message)
        {
            $message->subject('Terimakasih Anda Telah Menghubungi Kami');
            $message->from('smkassalaambandung@gmail.com', 'SMK Assalaam Bandung');
            $message->to($pesan->email);
        });
    }
}
