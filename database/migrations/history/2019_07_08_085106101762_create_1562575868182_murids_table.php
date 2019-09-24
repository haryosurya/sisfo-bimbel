<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562575868182MuridsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('murids')) {
            Schema::create('murids', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nama')->nullable();
                $table->string('jenis_kelamin');
                $table->unsignedInteger('status_id')->nullable();
                $table->foreign('status_id', 'status_fk_160042')->references('id')->on('crm_statuses');
                $table->string('email')->nullable();
                $table->integer('telp')->nullable();
                $table->string('alamat');
                $table->string('tempat_lahir');
                $table->date('tanggal_lahir');
                $table->longText('description')->nullable();
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
