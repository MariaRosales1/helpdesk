<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'identification' => '123456789',
            'name' => 'admin',
            'email' => 'admin@unal.edu.co',
            'password' => Hash::make('123456789'),
            'rol' => 'admin',
        ]);
    }
}
