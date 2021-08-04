<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use UuidForKey;
    
    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';
    protected $fillable = ['nama'];

    public function nilai_alternatifs()
    {
        return $this->hasMany(NilaiAlternatif::class, 'id_nilai');
    }

    public function sub_kriterias()
    {
        return $this->hasMany(SubKriteria::class, 'id_nilai');
    }
}
