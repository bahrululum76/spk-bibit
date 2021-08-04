<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use UuidForKey;

    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['nama'];

    public function alternatif_rakitans()
    {
        return $this->hasMany(AlternatifRakitan::class, 'id_kategori');
    }

    public function nilai_kriterias()
    {
        return $this->hasMany(NilaiKriteria::class , 'id_kategori');
    }

    public function nilai_sub_kriterias()
    {
        return $this->hasMany(NilaiSubKriteria::class, 'id_kategori');
    }

    public function hasil_sub_kriterias()
    {
        return $this->hasMany(HasilSubKriteria::class, 'id_kategori');
    }
}
