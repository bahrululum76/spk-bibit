<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class NilaiAlternatif extends Model
{
    use UuidForKey;

    protected $table = 'nilai_alternatif';
    protected $primaryKey = 'id_nilai_alternatif';
    protected $fillable = ['id_nilai', 'id_kriteria', 'id_alternatif'];

    public function alternatif_rakitan()
    {
        return $this->belongsTo(AlternatifRakitan::class, 'id_alternatif');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }

    public function nilai()
    {
        return $this->belongsTo(Nilai::class, 'id_nilai');
    }
}
