<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('fodor_id');
            $table->string('title')->nullable()->default(null);
            $table->text('text')->nullable()->default(null);
            $table->string('snippet')->nullable()->default(null);
            $table->string('web_class_id')->nullable()->default(null);
            $table->integer('class_id')->nullable()->default(null);
            $table->string('class')->nullable()->default(null);
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
        Schema::dropIfExists('features');
    }
}
