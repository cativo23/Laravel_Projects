<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_class', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('class_fodor_id');
            $table->unsignedBigInteger('point_of_interest_id');

            $table->foreign('class_fodor_id')->references('id')->on('class_fodors');
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
        Schema::dropIfExists('point_class');
    }
}
