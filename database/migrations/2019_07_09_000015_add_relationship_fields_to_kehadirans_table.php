<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToKehadiransTable extends Migration
{
    public function up()
    {
        Schema::table('kehadirans', function (Blueprint $table) {
            $table->unsignedInteger('jadwal_id');
            $table->foreign('jadwal_id', 'jadwal_fk_160495')->references('id')->on('jadwals');
        });
    }
}
