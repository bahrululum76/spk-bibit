<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class NilaiSubKriteria extends Model
{
    use UuidForKey;

    protected $table = 'nilai_sub_kriteria';
    protected $primaryKey = 'id_nilai_sub_kriteria';
    protected $fillable = [
        'id_kategori_rakitan',
        'id_kriteria',
        'id_sub_kriteria_dari',
        'id_sub_kriteria_tujuan',
        'nilai'
    ];

    public function category_rakitan()
    {
        return $this->belongsTo(CategoryRakitan::class, 'id_kategori_rakitan');
    }

    public function Kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }

    public function sub_kriteria_dari()
    {
        return $this->belongsTo(SubKriteria::class, 'id_sub_kriteria', 'id_sub_kriteria_dari');
    }

    public function sub_kriteria_tujuan()
    {
        return $this->belongsTo(SubKriteria::class, 'id_sub_kriteria', 'id_sub_kriteria_tujuan');
    }
}
