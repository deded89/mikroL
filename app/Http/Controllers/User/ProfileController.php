<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('user.profile.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $id = Auth::User()->profile->id;
        $profile = Profile::find($id);
        $profile->update([
            'nama' => $request->nama_user,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);
        return response()->json($request->all);
    }
}
