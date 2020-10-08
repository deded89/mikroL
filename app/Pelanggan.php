<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = ['nama_pelanggan', 'alamat', 'telepon', 'image', 'deposit', 'store_id'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
