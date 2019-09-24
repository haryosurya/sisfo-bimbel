<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562579548440MuridsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('murids')) {
            Schema::create('murids', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('email');
                $table->string('password');
                $table->unsignedInteger('roles_id');
                $table->foreign('roles_id', 'roles_fk_160353')->references('id')->on('roles');
                $table->string('jenis_kelamin');
                $table->string('alamat');
                $table->string('tempat_lahir');
                $table->date('tanggal_lahir');
                $table->unsignedInteger('paket_id');
                $table->foreign('paket_id', 'paket_fk_160358')->references('id')->on('pakets');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('murids');
    }
}
