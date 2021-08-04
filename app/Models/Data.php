<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use UuidForKey;

    protected $table = 'data';
    protected $primaryKey = 'id_data';
    protected $fillable = [
        'nama_data',
        'harga',
        'protein',
        'lemak',
        'air'
    ];

    public function alternatif()
    {
        return $this->hasOne(Alternatif::class, 'id_data');
    }
}
