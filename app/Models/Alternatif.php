<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use UuidForKey;

    protected $table = 'alternatif';
    protected $primaryKey = 'id_alternatif';
    protected $fillable = ['id_data', 'id_kategori', 'total'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function data()
    {
        return $this->belongsTo(Data::class, 'id_data');
    }

    public function nilai_alternatifs()
    {
        return $this->hasMany(NilaiAlternatif::class, 'id_alternatif');
    }

}
