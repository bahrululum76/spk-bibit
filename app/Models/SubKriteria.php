<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use UuidForKey;

    protected $table = 'sub_kriteria';
    protected $primaryKey = 'id_sub_kriteria';
    protected $fillable = [
        'id_nilai',
        'id_kriteria',
        'nama',
        'ukuran_min',
        'ukuran_maks',
        'satuan'
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }

    public function nilai()
    {
        return $this->belongsTo(Nilai::class, 'id_nilai');
    }

    public function hasil_sub_kriteria()
    {
        return $this->hasMany(HasilSubKriteria::class, 'id_sub_kriteria');
    }
}
