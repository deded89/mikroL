<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    protected $fillable = ['nama_cabang', 'is_open', 'alamat', 'telepon', 'store_id'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
