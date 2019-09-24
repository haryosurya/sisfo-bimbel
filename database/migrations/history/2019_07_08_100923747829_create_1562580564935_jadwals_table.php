<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562580564935JadwalsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('jadwals')) {
            Schema::create('jadwals', function (Blueprint $table) {
                $table->increments('id');
                $table->date('hari');
                $table->time('jam_mulai');
                $table->time('jam_selesai');
                $table->unsignedInteger('mapel_id');
                $table->foreign('mapel_id', 'mapel_fk_160465')->references('id')->on('mapels');
                $table->unsignedInteger('level_paket_id');
                $table->foreign('level_paket_id', 'level_paket_fk_160466')->references('id')->on('pakets');
                $table->unsignedInteger('mentor_id');
                $table->foreign('mentor_id', 'mentor_fk_160467')->references('id')->on('mentors');
                $table->string('ruangan');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('jadwals');
    }
}
