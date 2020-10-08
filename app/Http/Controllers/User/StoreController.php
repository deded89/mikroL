<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Store;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required|min:6',
        ]);
        $user_id = Auth::User()->id;
        Store::updateOrCreate(
            ['user_id' => $user_id],
            ['nama_toko' => $request->nama_toko, $user_id => $user_id]
        );
        return response()->json(['sukses' => 'Nama Usaha Diupdate']);
    }
}
