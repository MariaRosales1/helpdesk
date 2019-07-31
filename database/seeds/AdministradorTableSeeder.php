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
        DB::table('administrators')->insert([
            'user_id' => 1,
            'fecha_contratacion' => '29/07/2019',
        ]);


    }
}
