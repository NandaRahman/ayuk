<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "limagangsal",
            'email' => "mail.limagangsal@gmail.com",
            'password' => Hash::make("limagngsal123!!!"),
        ]);
        $user->attachRole(Role::find(1));
        $user->save();
    }
}
