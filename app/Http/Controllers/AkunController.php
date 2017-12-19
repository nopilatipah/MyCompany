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
use DB;


class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        
        $akun = DB::table('role_user')
        ->join('roles','roles.id','=','role_user.role_id')
        ->join('users','users.id','=','role_user.user_id')
        ->select('roles.display_name','users.*')
        ->where('users.id','!=',1)->orderBy('users.id','desc')->paginate(5);
            
        return view('backend.akun.index')->with(compact('akun'));
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
            'name'=>'required|max:255',
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

        alert()->success('Akun Berhasil Ditambahkan')->autoclose(3500);
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
        $user = User::find($id);
        $this->validate($request, [
            'name'=>'required|max:255',
            'email'=>'required|unique:users,email,'.$user->id
            ]);

        $user->update($request->only('name','email'));

        
        $memberRole = DB::table('role_user')->where('user_id',$user->id)->first();
        $Role = Role::where('id',$request->role)->first();
        
        $user->roles()->detach($memberRole->role_id);
        $user->roles()->attach($request->role);

        $user->akses = $Role->display_name;
        $user->save();

        alert()->success('Perubahan Tersimpan')->autoclose(3500);
        return redirect()->route('akun.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
            alert()->success('Akun Terhapus')->autoclose(3500);

        return redirect()->route('akun.index');
    }
}
