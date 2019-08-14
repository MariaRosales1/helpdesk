<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypesTimeServiceTable extends Migration
{

    public function up()
    {
        DB::statement('ALTER TABLE time_services MODIFY COLUMN horaInicio TIME NOT NULL');
        DB::statement('ALTER TABLE time_services MODIFY COLUMN horaFin TIME NOT NULL');
    }

    public function down()
    {
        DB::statement('ALTER TABLE time_services MODIFY COLUMN horaInicio VARCHAR(191)');
        DB::statement('ALTER TABLE time_services MODIFY COLUMN horaFin VARCHAR(191)');
    }
}
