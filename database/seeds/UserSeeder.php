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
        $user->email = "admin";
        $user->password = Hash::make("rahasiaku");
        $user->save();

        $user = User::where('username', 'admin')->first();
        $user->assignRole('admin');
    }
}
