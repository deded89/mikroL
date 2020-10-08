<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ["nama", "prefix", "alamat", "telepon", "image", "user_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
