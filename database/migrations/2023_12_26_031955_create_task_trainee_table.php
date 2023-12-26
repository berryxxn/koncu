<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_trainee', function (Blueprint $table) {
            $table->id();
            $table->uuid('trainee_uuid');
            $table->foreign('trainee_uuid')->references('uuid')->on('trainees');
            $table->uuid('task_uuid');
            $table->foreign('task_uuid')->references('uuid')->on('tasks');
            $table->integer('score')->default(0);
            // Add other pivot table columns as needed
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
