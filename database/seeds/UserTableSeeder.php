<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@luci.dev',
            'password' => 'admin'
        ]);
    }

}