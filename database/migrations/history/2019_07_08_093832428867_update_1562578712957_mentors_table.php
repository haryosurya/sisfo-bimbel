<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562578712957MentorsTable extends Migration
{
    public function up()
    {
        Schema::table('mentors', function (Blueprint $table) {
            $table->unsignedInteger('roles_id');
            $table->foreign('roles_id', 'roles_fk_160186')->references('id')->on('roles');
        });
    }

    public function down()
    {
        Schema::table('mentors', function (Blueprint $table) {
        });
    }
}
