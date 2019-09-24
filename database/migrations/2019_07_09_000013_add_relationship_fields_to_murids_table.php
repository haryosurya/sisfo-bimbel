<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMuridsTable extends Migration
{
    public function up()
    {
        Schema::table('murids', function (Blueprint $table) {
            $table->unsignedInteger('roles_id');
            $table->foreign('roles_id', 'roles_fk_160353')->references('id')->on('roles');
            $table->unsignedInteger('paket_id');
            $table->foreign('paket_id', 'paket_fk_160358')->references('id')->on('pakets');
        });
    }
}
