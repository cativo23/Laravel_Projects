<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBestDestinationTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('best_destination_trip', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('best_id');
            $table->unsignedBigInteger('destination_trip_id');


            $table->foreign('best_id')->references('fodor_id')->on('best_for_types');
            $table->foreign('destination_trip_id')->references('id')->on('destination_trip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('best_destination_trip');
    }
}
