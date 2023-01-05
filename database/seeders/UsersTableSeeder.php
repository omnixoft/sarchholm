<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

//use Database\Seeders\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'f_name' => 'Lion',
            'l_name' => 'Coders',
            'username' => 'lion-admin',
            'type' => 'admin',
            'email' => 'admin@lion-coders.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
