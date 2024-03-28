<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExecutingCommunicationProjectAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executing_communication_project_announcements', function (Blueprint $table) {
            $table->id();
            $table->string('deliverable');
            $table->string('description');
            $table->string('delivery_method');
            $table->string('frequency');
            $table->string('owner');
            $table->string('audience');
            $table->date('date_realitation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('executing_communication_project_announcements');
    }
}
