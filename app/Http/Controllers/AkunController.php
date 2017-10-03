<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()){
            $books = User::where('id','!=',1)->get();
            return Datatables::of($books)
            ->addColumn('action',function($book){
                return view('datatable._edit', [
                    'model'     => $book,
                    'form_url'  => route('akun.destroy',$book->id),
                    'edit_url'  => route('akun.update',$book->id),
                    'modal'  => $book->id,
                    'confirm_message' => 'Yakin Ingin Menghapus '.$book->name.' ?' ]);
            })->make(true);
        }
        $html = $htmlBuilder
        ->addColumn(['data'=>'name','name'=>'name','title'=>'Nama Pengguna'])
        ->addColumn(['data'=>'email','name'=>'email','title'=>'Email'])
        ->addColumn(['data'=>'akses','name'=>'akses','title'=>'Hak Akses'])
        ->addColumn(['data'=>'action','name'=>'action','title'=>'','orderable'=>false,'searchable'=>false]);
        return view('backend.akun.index')->with(compact('html'));
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
            'name'=>'required|unique:users|max:255',
            'email'=>'required|email|max:255|unique:users'
            ]);
        $password = str_random(6);
        $data = $request->all();
        $memberRole = Role::where('id',$data['role'])->first();
        $data['password']=bcrypt($password);
        $data['is_verified']=1;
        $data['akses']=$memberRole->display_name;
        $member = User::create($data);

        $member->attachRole($memberRole);

        alert()->success('Email '.$data['email'].' Dan Password '.$password,'Tersimpan')->autoclose(3500);
        return redirect()->route('akun.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = User::find($id);
            $member->delete();
            alert()->success('Terhapus')->autoclose(3500);

        return redirect()->route('akun.index');
    }
}
