<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function index()
    {

        $datas = User::latest()->get();
        return view('pages.admin.user-akun.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user-akun.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nama_lengkap' => 'required',
            'role' => 'required',
            'alamat' => 'required',
           
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' =>bcrypt($request->password),
            'nama_lengkap' => $request->nama_lengkap,
            'role' => $request->role,
            'alamat' => $request->alamat,
           
        ]);

        return redirect()->route('user-akun.index')->with('sukses', "Berhasil tambah data");
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
    function edit($id)
    {
        $data = User::where('id', $id)->first();
        return view('pages.admin.user-akun.edit', compact('data'));
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
    function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('user-akun.index')->with("success", "Berhasil hapus data");
    }
}
