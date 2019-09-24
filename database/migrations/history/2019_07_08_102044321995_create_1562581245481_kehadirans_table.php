<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562581245481KehadiransTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('kehadirans')) {
            Schema::create('kehadirans', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('jadwal_id');
                $table->foreign('jadwal_id', 'jadwal_fk_160495')->references('id')->on('jadwals');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('kehadirans');
    }
}
