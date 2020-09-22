<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Store extends Model
{
    protected $fillable = ['nama_toko', 'user_id'];


    // REALTIONSHIP
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cabangs()
    {
        return $this->hasMany(Cabang::class);
    }

    public function layanans()
    {
        return $this->hasMany(layanan::class);
    }


    // SCOPE
    public function scopeUserStore($query)
    {
        $user_id = Auth::User()->id;
        $store = $query->where('user_id', $user_id);
        return $store;
    }
}
