<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutingSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executing_schedules', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('finish_date');
            $table->string('description_task');
            $table->string('assign_to');
            $table->string('status_task');
            $table->unsignedBigInteger('project_definition_id');
            $table->timestamps();

            $table->foreign('project_definition_id')->references('id')->on('initiating__project_definitions')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('executing_schedules');
    }
}
