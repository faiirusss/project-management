<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutingProcurementSubkonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executing_procurement_subkons', function (Blueprint $table) {
            $table->id();
            $table->string('procurement_subkon');
            $table->string('vendor_subkon');
            $table->string('description_service_subkon');
            $table->integer('volume_subkon');
            $table->string('units_subkon');
            $table->string('total_subkon');
            $table->date('start_toOrder_subkon');
            $table->date('finish_toOrder_subkon');
            $table->unsignedBigInteger('project_definition_id');
            $table->timestamps();

            $table->foreign('project_definition_id')->references('id')->on('initiating__project_definitions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('executing_procurement_subkons');
    }
}
