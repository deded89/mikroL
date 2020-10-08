<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Cabang;
use App\Store;
use App\Profile;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = "admin";
        $user->email = "admin@admin.com";
        $user->password = Hash::make("rahasiaku");
        $user->save();

        $user = User::where('username', 'admin')->first();
        $user->assignRole('admin');

        $user = new User();
        $user->username = "tesowner";
        $user->email = "owner@tes.com";
        $user->password = Hash::make("rahasiaku");
        $user->save();

        $user = User::where('username', 'tesowner')->first();
        $user->assignRole('owner');

        $profile = new Profile();
        $profile->nama = 'nama tesOwner';
        $profile->prefix = 'bapak';
        $profile->user_id = $user->id;
        $profile->save();

        $store = new Store();
        $store->nama_toko = $user->username . ' Laundry';
        $store->user_id = $user->id;
        $store->save();

        $cabang = new Cabang();
        $cabang->nama_cabang = 'Utama';
        $cabang->is_open = 'true';
        $cabang->alamat = '-';
        $cabang->telepon = '-';
        $cabang->store_id = $store->id;
        $cabang->save();
    }
}
