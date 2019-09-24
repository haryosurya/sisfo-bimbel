<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1562578269181MentorsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('mentors')) {
            Schema::create('mentors', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('password');
                $table->string('email');
                $table->string('jenis_kelamin');
                $table->string('alamat');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('mentors');
    }
}
