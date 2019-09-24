<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562581245487KehadiranMuridPivotTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('kehadiran_murid')) {
            Schema::create('kehadiran_murid', function (Blueprint $table) {
                $table->unsignedInteger('kehadiran_id');
                $table->foreign('kehadiran_id', 'kehadiran_id_fk_160496')->references('id')->on('kehadirans');
                $table->unsignedInteger('murid_id');
                $table->foreign('murid_id', 'murid_id_fk_160496')->references('id')->on('murids');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('kehadiran_murid');
    }
}
