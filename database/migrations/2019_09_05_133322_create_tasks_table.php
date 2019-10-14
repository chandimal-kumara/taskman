<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) 
        {
            $table->bigIncrements('id');
            $table->string('task_code')->nullable();
            $table->string('title');
            $table->string('type');
            $table->string('priority');
            $table->longText('description');
            $table->longText('content');
            $table->integer('estimated_hours');
            $table->unsignedbigInteger('created')->nullable();
            $table->unsignedbigInteger('assign')->nullable();
            $table->string('task_status')->default('created');
            $table->timestamps();
            $table->foreign('created')->references('id')->on('users');
            $table->foreign('assign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
