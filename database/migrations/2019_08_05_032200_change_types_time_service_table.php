<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypesTimeServiceTable extends Migration
{

    public function up()
    {
        DB::statement('ALTER TABLE time_services MODIFY COLUMN start_time TIME NOT NULL');
        DB::statement('ALTER TABLE time_services MODIFY COLUMN final_time TIME NOT NULL');
    }

    public function down()
    {
        DB::statement('ALTER TABLE time_services MODIFY COLUMN start_time VARCHAR(191)');
        DB::statement('ALTER TABLE time_services MODIFY COLUMN final_time VARCHAR(191)');
    }
}
