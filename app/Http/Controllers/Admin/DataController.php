<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Data;
use App\Models\HasilSubKriteria;
use App\Models\Kategori;
use App\Models\Kriteria;
use App\Models\Nilai;
use App\Models\NilaiAlternatif;
use App\Models\NilaiKriteria;
use App\Models\SubKriteria;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::orderBy('created_at', 'asc')->get();
        $kriterias  = Kriteria::with('sub_kriterias')->orderBy('created_at', 'asc')->get();
        // $nilais     = Nilai::orderBy('created_at', 'asc')->get();
        $data   = Data::with('alternatif')->orderby('created_at', 'DESC')->get()->map(function ($cat, $key) {
            $nn = NilaiAlternatif::with('nilai')->where('id_alternatif', $cat->alternatif['id_alternatif'])->get();
            $cat->alternatif['nilai_alternatif'] = $nn;
            return $cat;
        });

        $nilaidb = Nilai::get();
        return view('admin.data', compact('kategori', 'kriterias', 'data', 'nilaidb'));
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
        try{
            $jumkriteria = Kriteria::count();
            $total = 0;
            for ($z = 0; $z < count($request->id_kriteria); $z++) {
                $hasilSk     = SubKriteria::where('id_kriteria', $request->id_kriteria[$z])
                    ->where('id_nilai', $request->id_nilai[$z])
                    ->first();
    
                $hasilhsk     = HasilSubKriteria::where('id_kategori', $request->id_kategori)
                    ->where('id_kriteria', $request->id_kriteria[$z])
                    ->where('id_sub_kriteria', $hasilSk['id_sub_kriteria'])
                    ->first();
    
                $hasilnk  = NilaiKriteria::where('id_kategori', $request->id_kategori)
                    ->where('id_kriteria_tujuan', $request->id_kriteria[$z])
                    ->get()->sum('nilai');
    
                $hasilnkk  = NilaiKriteria::where('id_kategori', $request->id_kategori)
                    ->where('id_kriteria_tujuan', $request->id_kriteria[$z])
                    ->get();
                $jml = 0;
                for ($i = 0; $i < count($hasilnkk); $i++) {
                    $rumus = $hasilnkk[$i]['nilai'] / $hasilnk;
                    $jml = $rumus + $jml;
                }
                $prio = $jml / $jumkriteria;
                // $total = $prio;
    
                $total = ($prio * $hasilhsk['prioritas']) + $total;
            }
    
            $data     = Data::create($request->except('id_kategori', 'id_kriteria', 'id_nilai'));
            $alt = Alternatif::create([
                'id_data'          => $data->id_data,
                'id_kategori' => $request->id_kategori,
                'total'               => $total
            ]);
    
    
            for ($i = 0; $i < count($request->id_nilai); $i++) {
                $nilai[] = [
                    'id_nilai_alternatif' => Uuid::uuid4(),
                    'id_alternatif'       => $alt->id_alternatif,
                    'id_kriteria'         => $request->id_kriteria[$i],
                    'id_nilai'            => $request->id_nilai[$i]
                ];
            }
            NilaiAlternatif::insert($nilai);
            Toastr::success('Data berhasil disimpan', 'Kelola Pakan');
            return redirect()->route('data.index');
        }catch(\Exception $e){
            Toastr::error($e, 'Kelola Pakan');
            return redirect()->route('data.index');
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
        try{
            $jumkriteria = Kriteria::count();
            $total = 0;
            for ($z = 0; $z < count($request->id_kriteria); $z++) {
                $hasilSk     = SubKriteria::where('id_kriteria', $request->id_kriteria[$z])
                    ->where('id_nilai', $request->id_nilai[$z])
                    ->first();
    
                $hasilhsk     = HasilSubKriteria::where('id_kategori', $request->id_kategori)
                    ->where('id_kriteria', $request->id_kriteria[$z])
                    ->where('id_sub_kriteria', $hasilSk['id_sub_kriteria'])
                    ->first();
    
                $hasilnk  = NilaiKriteria::where('id_kategori', $request->id_kategori)
                    ->where('id_kriteria_tujuan', $request->id_kriteria[$z])
                    ->get()->sum('nilai');
    
                $hasilnkk  = NilaiKriteria::where('id_kategori', $request->id_kategori)
                    ->where('id_kriteria_tujuan', $request->id_kriteria[$z])
                    ->get();
                $jml = 0;
                for ($i = 0; $i < count($hasilnkk); $i++) {
                    $rumus = $hasilnkk[$i]['nilai'] / $hasilnk;
                    $jml = $rumus + $jml;
                }
                $prio = $jml / $jumkriteria;
                // $total = $prio;
    
                $total = ($prio * $hasilhsk['prioritas']) + $total;
            }
    
            $data = Data::findORfail($id);
            $data->update($request->except('id_nilai', 'id_kriteria', 'id_kategori'));
            Alternatif::where('id_data', $data->id_data)
                ->update([
                    'id_kategori' => $request->id_kategori,
                    'total'               => $total
                ]);
    
            NilaiAlternatif::where('id_alternatif', $data->alternatif['id_alternatif'])->delete();
    
            for ($i = 0; $i < count($request->id_nilai); $i++) {
                $nilai[] = [
                    'id_nilai_alternatif' => Uuid::uuid4(),
                    'id_alternatif'       => $data->alternatif['id_alternatif'],
                    'id_kriteria'         => $request->id_kriteria[$i],
                    'id_nilai'            => $request->id_nilai[$i]
                ];
            }
    
            NilaiAlternatif::insert($nilai);
    
            Toastr::success('Data berhasil diubah', 'Kelola Pakan');
            return redirect()->route('data.index');
        }catch(\Exception $e){
            Toastr::error($e, 'Kelola Pakan');
            return redirect()->route('data.index');
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
            Data::find($id)->delete();
            Toastr::success('Data berhasil dihapus', 'Kelola Pakan');
            return redirect()->route('data.index');
        } catch (\Exception $e) {
            Toastr::error($e, 'Kelola Pakan');
            return redirect()->route('data.index');
        }
    }
}
