<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTypesTable extends Migration
{
    public function up()
    {
        Schema::create('task_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 3)->unique();;
            $table->string('name', 25);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('task_types');
    }
}
