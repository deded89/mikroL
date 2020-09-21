<?php

use Illuminate\Database\Seeder;
use App\User;
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
    }
}
