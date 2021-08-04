<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use UuidForKey;

    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $fillable = ['nama'];

    public function nilai_sub_kriterias()
    {
        return $this->hasMany(NilaiSubKriteria::class, 'id_kriteria');
    }

    public function nilai_alternatif()
    {
        return $this->hasMany(NilaiAlternatif::class, 'id_kriteria');
    }

    public function sub_kriterias()
    {
        return $this->hasMany(SubKriteria::class, 'id_kriteria');
    }

    public function hasil_sub_kriterias()
    {
        return $this->hasMany(HasilSubKriteria::class, 'id_kriteria');
    }
}
