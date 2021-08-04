<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class HasilSubKriteria extends Model
{
    use UuidForKey;

    protected $table = 'hasil_sub_kriteria';
    protected $primaryKey = 'id_hasil_sub_kriteria';
    protected $fillable = [
        'id_kategori_rakitan', 
        'id_sub_kriteria', 
        'id_kriteria',
        'prioritas'
    ];

    public function category_rakitan()
    {
        return $this->belongsTo(CategoryRakitan::class, 'id_kategori_rakitan');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }  
    public function sub_kriteria()
    {
        return $this->belongsTo(SubKriteria::class, 'id_sub_kriteria');
    }
}
