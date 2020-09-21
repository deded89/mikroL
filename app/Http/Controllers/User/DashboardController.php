<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Store;
use App\Cabang;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $store = Store::UserStore()->first();
        $cabang = Cabang::where('store_id', $store->id)->first();
        return view('user.dashboard', compact('store', 'cabang'));
    }
}
