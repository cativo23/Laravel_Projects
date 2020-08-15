<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination_trip', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('dist_from_dest');
            $table->string('time_to_visit');
            $table->integer('destination_id');
            $table->integer('trip_id');

            $table->foreign('destination_id')->references('fodor_id')->on('destinations');
            $table->foreign('trip_id')->references('fodor_id')->on('trips');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destination_trip');
    }
}
