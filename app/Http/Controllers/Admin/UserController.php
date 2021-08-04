<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user', compact('user'));
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
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'email'   => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'c_password' => 'required|same:password|min:6'
        ]);
        if($validasi->fails()){
            return redirect()->route('user.index')->with('errors', $validasi->errors());
        }
        $user = [
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ];
        $create_user = User::create($user);

        if($create_user){
            return redirect()->route('user.index')->with('success', 'User berhasil disimpan');
        }else{
            return redirect()->route('user.index')->with('error', 'Oops!, Terjadi suatu kesalahan');
        }

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
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'email'   => 'required|email',
            'password' => 'required|min:6',
            'c_password' => 'required|same:password|min:6'
        ]);
        if($validasi->fails()){
            return redirect()->route('user.index')->with('errors', $validasi->errors());
        }
        $data = User::findOrfail($id);

        $updated =  $data->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        if($updated){
            return redirect()->route('user.index')->with('success', 'User berhasil diubah');
        }else{
            return redirect()->route('user.index')->with('error', 'Oops!, Terjadi suatu kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrfail($id);
        if ($data) {
            $delete = $data->delete();
            if($delete){
                return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
            }else{
                return redirect()->route('user.index')->with('error', 'Oops, Terjadi suatu kesalahan');
            }
        }
    }
}
