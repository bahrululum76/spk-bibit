<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class NilaiKriteria extends Model
{
    use UuidForKey;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nilai_kriteria';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_nilai_kriteria';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_kategori_rakitan', 
        'id_kriteria_dari', 
        'id_kriterian_tujuan', 
        'nilai'
    ];

    public function category_rakitan()
    {
        return $this->belongsTo(CategoryRakitan::class, 'id_kategori_rakitan');
    }
}
