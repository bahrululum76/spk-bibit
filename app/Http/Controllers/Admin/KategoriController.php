<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Kriteria;
use App\Models\Nilai;
use App\Models\NilaiSubKriteria;
use App\Models\SubKriteria;
use App\Models\NilaiKriteria;
use App\Models\HasilSubKriteria;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kategori::with('nilai_kriterias', 'nilai_sub_kriterias', 'hasil_sub_kriterias')->get()->map(function ($cat, $key) {
            for ($i = 0; $i < count($cat->nilai_sub_kriterias); $i++) {
                $fdari = SubKriteria::find($cat->nilai_sub_kriterias[$i]['id_sub_kriteria_dari']);
                $ftujuan = SubKriteria::find($cat->nilai_sub_kriterias[$i]['id_sub_kriteria_tujuan']);
                $cat->nilai_sub_kriterias[$i]['sub_kriteria_dari'] = $fdari;
                $cat->nilai_sub_kriterias[$i]['sub_kriteria_tujuan'] = $ftujuan;
            }
            return $cat;
        });

        // $data = Kategori::with('nilai_kriterias','nilai_sub_kriterias','hasil_sub_kriterias')->whereHas('nilai_sub_kriterias', 
        //             function ($query) {
        //                 return $query->with('sub_kriteria_dari','sub_kriteria_tujuan');
        //             }
        //         )->get();


        $kriteria = Kriteria::get();
        $irdata = array(
            1 => 0.00,
            2 => 0.00,
            3 => 0.58,
            4 => 0.90,
            5 => 1.12,
            6 => 1.24,
            7 => 1.32,
            8 => 1.41,
            9 => 1.45,
            10 => 1.49,
            11 => 1.51,
            12 => 1.48,
            13 => 1.56,
            14 => 1.57,
            15 => 1.59,
        );
        $nkdata = array(
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            0.500,
            0.333,
            0.250,
            0.200,
            0.166,
            0.142,
            0.125,
            0.111
        );
        $jumlah = count($kriteria);
        $nilaidb = Nilai::get();
        return view('admin.kategori', compact('kriteria', 'data', 'irdata', 'nkdata', 'jumlah', 'nilaidb'));
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
        // return $request->data['nama'];
        $data = $request->data;
        $save = Kategori::create([
            'nama' => $request->data['nama']
        ]);

        foreach ($data['nilai_kriteria'] as $key => $value) {
            $savenk = new NilaiKriteria;
            $savenk->id_kategori = $save->id_kategori;
            $savenk->id_kriteria_dari = $value['id_kriteria_dari'];
            $savenk->id_kriteria_tujuan = $value['id_kriteria_tujuan'];
            $savenk->nilai = $value['nilai'];
            $savenk->save();
        }

        foreach ($data['nilai_sub_kriteria'] as $key => $value) {
            foreach ($value['data'] as $x => $y) {
                $fdari = SubKriteria::where('id_nilai', $y['id_nilai_dari'])->where('id_kriteria', $value['id_kriteria'])->first();
                $ftujuan = SubKriteria::where('id_nilai', $y['id_nilai_tujuan'])->where('id_kriteria', $value['id_kriteria'])->first();
                if ($fdari && $ftujuan) {
                    $savensk = new NilaiSubKriteria;
                    $savensk->id_kategori = $save->id_kategori;
                    $savensk->id_kriteria = $value['id_kriteria'];
                    $savensk->id_sub_kriteria_dari = $fdari['id_sub_kriteria'];
                    $savensk->id_sub_kriteria_tujuan = $ftujuan['id_sub_kriteria'];
                    $savensk->nilai = $y['nilai'];
                    $savensk->save();
                }
            }
        }

        foreach ($data['hasil_sub_kriteria'] as $key => $value) {
            foreach ($value['data'] as $x => $y) {
                $fsub = SubKriteria::where('id_nilai', $y['id_nilai'])->where('id_kriteria', $value['id_kriteria'])->first();
                if ($fsub) {
                    $savehsk = new HasilSubKriteria;
                    $savehsk->id_kategori = $save->id_kategori;
                    $savehsk->id_kriteria = $value['id_kriteria'];
                    $savehsk->id_sub_kriteria = $fsub['id_sub_kriteria'];
                    $savehsk->prioritas = $y['prioritas'];
                    $savehsk->save();
                }
            }
        }

        if ($save) {
            $sts = [
                'status' => 'berhasil'
            ];
            return $sts;
        } else {
            $sts = [
                'status' => 'gagal'
            ];
            return $sts;
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
    public function edit()
    {
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
        $data = $request->data;
        $cat = Kategori::find($id);
        $cat->update([
            'nama' => $request->data['nama']
        ]);

        $findnk = NilaiKriteria::where('id_kategori', $id)->get();
        foreach ($findnk as $key => $value) {
            foreach ($data['nilai_kriteria'] as $k => $v) {
                if ($value['id_kriteria_dari'] == $v['id_kriteria_dari'] && $value['id_kriteria_tujuan'] == $v['id_kriteria_tujuan']) {
                    $savenk = NilaiKriteria::find($value['id_nilai_kriteria']);
                    $savenk->update([
                        'nilai' => $v['nilai']
                    ]);
                }
            }
        }

        $findnsk = NilaiSubKriteria::where('id_kategori', $id)->get();
        foreach ($findnsk as $key => $value) {
            foreach ($data['nilai_sub_kriteria'] as $k => $v) {
                foreach ($v['data'] as $x => $y) {
                    $fdari = SubKriteria::where('id_nilai', $y['id_nilai_dari'])->where('id_kriteria', $v['id_kriteria'])->first();
                    $ftujuan = SubKriteria::where('id_nilai', $y['id_nilai_tujuan'])->where('id_kriteria', $v['id_kriteria'])->first();
                    if ($fdari['id_sub_kriteria'] == $value['id_sub_kriteria_dari'] && $ftujuan['id_sub_kriteria'] == $value['id_sub_kriteria_tujuan']) {
                        $savensk = NilaiSubKriteria::find($value['id_nilai_sub_kriteria']);
                        $savensk->update([
                            'nilai' => $y['nilai']
                        ]);
                    }
                }
            }
        }

        $findhsk = HasilSubKriteria::where('id_kategori', $id)->get();
        foreach ($findhsk as $kk => $vv) {
            foreach ($data['hasil_sub_kriteria'] as $key => $value) {
                foreach ($value['data'] as $x => $y) {
                    $fsub = SubKriteria::where('id_nilai', $y['id_nilai'])->where('id_kriteria', $value['id_kriteria'])->first();
                    if ($fsub['id_sub_kriteria'] == $vv['id_sub_kriteria']) {
                        $savehsk = HasilSubKriteria::find($vv['id_hasil_sub_kriteria']);
                        $savehsk->update([
                            'prioritas' => $y['prioritas']
                        ]);
                    }
                }
            }
        }

        if ($cat) {
            $sts = [
                'status' => 'berhasil'
            ];
            return $sts;
        } else {
            $sts = [
                'status' => 'gagal'
            ];
            return $sts;
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
        $data   = Kategori::findOrFail($id);
        $delete = $data->delete();
        if ($delete) {
            return redirect()->route('kategori.index')->with('success', 'Kategori Pakan berhasil dihapus');
        } else {
            return redirect()->route('kategori.index')->with('error', 'Oops!, Terjadi suatu kesalahan');
        }
    }
}
