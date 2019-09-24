<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562579829367MapelsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('mapels')) {
            Schema::create('mapels', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nama_mapel');
                $table->longText('deskripsi');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('mapels');
    }
}
