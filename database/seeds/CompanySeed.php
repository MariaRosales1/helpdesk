<?php

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countCompanies = Company::all()->count();

        if ($countCompanies == 0) {
            Company::create([
                'nit' => '123456789',
                'name' => 'HelpDesk Corporation',
            ]);
        }
    }
}
