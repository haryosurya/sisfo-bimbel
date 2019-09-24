<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJadwalsTable extends Migration
{
    public function up()
    {
        Schema::table('jadwals', function (Blueprint $table) {
            $table->unsignedInteger('level_paket_id');
            $table->foreign('level_paket_id', 'level_paket_fk_160466')->references('id')->on('pakets');
            $table->unsignedInteger('mentor_id');
            $table->foreign('mentor_id', 'mentor_fk_160467')->references('id')->on('mentors');
        });
    }
}
