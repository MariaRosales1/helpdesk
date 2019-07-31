<?php

use Illuminate\Database\Seeder;

class AdministradorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administradors')->insert([
            'consultant_id' => 1,
            'nombre' => 'Maria',
        ]);


    }
}
