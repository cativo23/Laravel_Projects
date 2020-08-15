<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassOverviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_overviews', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('fodor_id');
            $table->text('text')->nullable()->default(null);
            $table->text('snippet')->nullable()->default(null);
            $table->integer('destination_id');
            $table->integer('class_fodor_id')->nullable()->default(null);

            $table->foreign('destination_id')->references('fodor_id')->on('destinations')->cascadeOnDelete();
            $table->foreign('class_fodor_id')->references('fodor_id')->on('class_fodors')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_overviews');
    }
}
