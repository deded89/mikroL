<?php

namespace App\Http\Controllers\user;

use App\Cabang;
use App\Http\Controllers\Controller;
use App\Store;
use Illuminate\Http\Request;


class homeController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function getData()
    {
        $store = Store::UserStore()->first();
        $cabang = Cabang::where('store_id', $store->id)->first();

        return response()->json(['cabang' => $cabang, 'store' => $store]);
    }
}
