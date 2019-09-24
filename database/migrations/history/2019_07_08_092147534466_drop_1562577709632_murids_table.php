<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1562577709632MuridsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('murids');
    }
}
