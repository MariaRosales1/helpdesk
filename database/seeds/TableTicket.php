<?php

use Illuminate\Database\Seeder;

class TableTicket extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets')->insert([
            'code' =>'a1244',
            'state' => 'abierto',
            'opening_date' => '2019-08-22 21:38:09',
            'closing_date' => '2019-08-27 21:38:09',
            'consultant_id' => '1',
            'note' =>' ',
            'comment' =>' ',
        ]);
    }
}
