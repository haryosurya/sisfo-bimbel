<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562579118921PaketsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('pakets')) {
            Schema::create('pakets', function (Blueprint $table) {
                $table->increments('id');
                $table->string('nama_paket')->nullable();
                $table->string('level_paket')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('pakets');
    }
}
