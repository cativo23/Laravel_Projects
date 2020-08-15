<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelTipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_tips', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('snippet')->nullable()->default(null);
            $table->text('text')->nullable()->default(null);
            $table->string('fodor_id');
            $table->string('head_id');
            $table->string('head_title');
            $table->integer('destination_id');

            $table->foreign('destination_id')->references('fodor_id')->on('destinations')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travel_tips');
    }
}
