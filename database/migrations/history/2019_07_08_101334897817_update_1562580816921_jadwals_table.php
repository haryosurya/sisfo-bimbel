<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562580816921JadwalsTable extends Migration
{
    public function up()
    {
        Schema::table('jadwals', function (Blueprint $table) {
            $table->dropForeign('mapel_fk_160465');
            $table->dropColumn('mapel_id');
        });
        Schema::table('jadwals', function (Blueprint $table) {
            $table->string('mapel');
        });
    }

    public function down()
    {
        Schema::table('jadwals', function (Blueprint $table) {
        });
    }
}
