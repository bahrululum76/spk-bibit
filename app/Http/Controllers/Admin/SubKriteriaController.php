<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\Nilai;
use App\Models\SubKriteria;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{

    public function get_sub_kriteria($id_kriteria)
    {
        $kriteria = Kriteria::where('id_kriteria', $id_kriteria)->first();
        $data     = SubKriteria::where('id_kriteria', $id_kriteria)->get();
        $nilai    = Nilai::all();
        return view('admin.sub-kriteria', compact('data', 'kriteria', 'nilai'));
    }
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
            SubKriteria::create([
                'id_nilai'      => $request->id_nilai,
                'id_kriteria'   => $request->id_kriteria,
                'nama'          => $request->nama,
                'ukuran_min'    => $request->ukuran_min,
                'ukuran_maks'   => $request->ukuran_maks,
                'satuan'        => $request->satuan
            ]);
            Toastr::success('Data Berhasil Disimpan', 'Sub Kriteria');
            return redirect()->route('admin.sub-kriteria', $request->id_kriteria);
        } catch (\Exception $e) {
            Toastr::error($e, 'Sub Kriteria');
            return redirect()->route('admin.sub-kriteria', $request->id_kriteria);
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
        try {
            $data = SubKriteria::findOrFail($id);
            SubKriteria::find($id)->update([
                'id_nilai'      => $request->id_nilai,
                'nama'          => $request->nama,
                'ukuran_min'    => $request->ukuran_min,
                'ukuran_maks'   => $request->ukuran_maks,
                'satuan'        => $request->satuan
            ]);
            Toastr::success('Data Berhasil Diubah', 'Sub Kriteria');
            return redirect()->route('admin.sub-kriteria', $data->id_kriteria);
        } catch (\Exception $e) {
            Toastr::error($e, 'Sub Kriteria');
            return redirect()->route('admin.sub-kriteria', $data->id_kriteria);
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
            $data = SubKriteria::findOrfail($id);
            Toastr::success('Data Berhasil Dihapus', 'Sub Kriteria');
            SubKriteria::find($id)->delete();
            return redirect()->route('admin.sub-kriteria', $data->id_kriteria);
        } catch (\Exception $e) {
            Toastr::error($e, 'Sub Kriteria');
            return redirect()->route('admin.sub-kriteria', $data->id_kriteria);
        }
    }
}
