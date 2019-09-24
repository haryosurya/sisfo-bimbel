<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1562577661453MuridsTable extends Migration
{
    public function up()
    {
        Schema::table('murids', function (Blueprint $table) {
            $table->dropColumn('nama');
            $table->dropColumn('jenis_kelamin');
            $table->dropForeign('status_fk_160042');
            $table->dropColumn('status_id');
            $table->dropColumn('email');
            $table->dropColumn('telp');
            $table->dropColumn('alamat');
            $table->dropColumn('description');
        });
    }

    public function down()
    {
        Schema::table('murids', function (Blueprint $table) {
        });
    }
}
