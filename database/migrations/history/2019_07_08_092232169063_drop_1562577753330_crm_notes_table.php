<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drop1562577753330CrmNotesTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('crm_notes');
    }
}
