<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Store;
use App\Profile;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        return view('user.account');
    }

    public function getData()
    {
        $user = Auth::User()->load('store', 'profile');
        return response()->json($user);
    }
}
