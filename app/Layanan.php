<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = ['nama_layanan', 'harga', 'satuan', 'store_id'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
