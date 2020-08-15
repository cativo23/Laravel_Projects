<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointDestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_dest', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('destination_id');
            $table->unsignedBigInteger('point_of_interest_id');

            $table->foreign('destination_id')->references('id')->on('destinations');
            $table->foreign('point_of_interest_id')->references('id')->on('point_of_interests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('point_dest');
    }
}
