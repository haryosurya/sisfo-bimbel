<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKehadiranMuridPivotTable extends Migration
{
    public function up()
    {
        Schema::create('kehadiran_murid', function (Blueprint $table) {
            $table->unsignedInteger('kehadiran_id');
            $table->foreign('kehadiran_id', 'kehadiran_id_fk_160496')->references('id')->on('kehadirans');
            $table->unsignedInteger('murid_id');
            $table->foreign('murid_id', 'murid_id_fk_160496')->references('id')->on('murids');
        });
    }
}
