<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('admin.kriteria', compact('kriteria'));
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
        try {
            Kriteria::create([
                'nama' => $request->nama
            ]);
            Toastr::success('Data Berhasil Ditambahkan', 'Kriteria');
            return redirect()->route('kriteria.index');
        } catch (\Exception $e) {
            Toastr::error($e, 'Kriteria');
            return redirect()->route('kriteria.index');
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
        $data = Kriteria::findOrfail($id);
        return response()->json($data);
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
        try {
            Kriteria::find($id)->update([
                'nama' => $request->nama
            ]);
            Toastr::success('Data Berhasil Diubah', 'Kriteria');
            return redirect()->route('kriteria.index');
        } catch (\Exception $e) {
            Toastr::success($e, 'Kriteria');
            return redirect()->route('kriteria.index');
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
        try {
            Kriteria::find($id)->delete();
            Toastr::success('Data Berhasil Dihapus', 'Kriteria');
            return redirect()->route('kriteria.index');
        } catch (\Exception $e) {
            Toastr::success($e, 'Kriteria');
            return redirect()->route('kriteria.index');
        }
    }
}
