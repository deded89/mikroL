<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Store;
use App\Cabang;
use App\Layanan;
use App\Pelanggan;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    public function index()
    {
        return view('user.master');
    }

    public function getData()
    {
        $store_id = Store::UserStore()->first()->id;
        $jmlCabang = Cabang::where('store_id', $store_id)->count();
        $jmlLayanan = Layanan::where('store_id', $store_id)->count();
        $jmlPelanggan = Pelanggan::where('store_id', $store_id)->count();
        return response()->json(['jmlCabang' => $jmlCabang, 'jmlLayanan' => $jmlLayanan, 'jmlPelanggan' => $jmlPelanggan]);
    }
}
