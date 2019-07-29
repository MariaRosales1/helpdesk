<?php

use Illuminate\Database\Seeder;

class ConsultantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consultants')->insert([
            'identification' => 12347888997,
            'name' => 'Maria',
            'email' => 'the@gmail.com',
            'password' => bcrypt('secret'),
            'rol' => 'asesor',
        ]);
    }
}
