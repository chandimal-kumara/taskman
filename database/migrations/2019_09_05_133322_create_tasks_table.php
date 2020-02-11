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
            $table->string('task_code')->nullable()->unique();
            $table->string('title');
            $table->unsignedbigInteger('department')->nullable();
            $table->string('catagory');
            $table->string('priority');
            $table->longText('description');
            $table->integer('estimated_hours');
            $table->unsignedbigInteger('created')->nullable();
            $table->unsignedbigInteger('assign')->nullable();
            $table->unsignedbigInteger('task_lead')->default(1);
            $table->string('task_status')->default('created');
            $table->timestamps();
            $table->foreign('created')->references('id')->on('users');
            $table->foreign('assign')->references('id')->on('users');
            $table->foreign('task_lead')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
