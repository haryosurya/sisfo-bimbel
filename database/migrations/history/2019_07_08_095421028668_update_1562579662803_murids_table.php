<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562579662803MuridsTable extends Migration
{
    public function up()
    {
        Schema::table('murids', function (Blueprint $table) {
            $table->string('sekolah_asal');
        });
    }

    public function down()
    {
        Schema::table('murids', function (Blueprint $table) {
        });
    }
}
