<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserAdminSeeder extends Seeder
{

    public function run()
    {
        $adminEmail = 'admin@unal.edu.co';

        $adminUser = DB::table('users')
            ->where('email', $adminEmail)
            ->first();

        if (!$adminUser) {
            DB::table('users')->insert([
                'identification' => '314151618',
                'name' => 'admin',
                'email' => 'admin@unal.edu.co',
                'password' => Hash::make('123456789'),
                'rol' => 'admin'
            ]);
        }
    }
}
