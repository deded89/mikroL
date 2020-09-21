<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Store;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        $store = $this->getDataToko();
        if (!$store) {
            $store = new Store();
        }
        return view('user.account', compact('store'));
    }

    private function getDataToko()
    {
        $id = Auth::User()->id;
        $store = Store::where('user_id', $id)->first();
        return $store;
    }
}
