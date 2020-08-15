<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->default("---");
            $table->integer('sequence');
            $table->integer('fodor_id')->unique();
            $table->string('name_path')->default("---");
            $table->string('id_path')->default("---");
            $table->string('geo_type')->default("---");
            $table->string('slug');
            $table->string('image_header')->nullable()->default(null);
            $table->string('image_header_thumbnail')->nullable()->default(null);
            $table->string('link_external')->nullable()->default(null);
            $table->boolean('use_t2d')->default(true);
            $table->boolean('use_bd_btn')->default(true);
            $table->boolean('use_hotels')->default(true);
            $table->boolean('use_restaurants')->default(true);
            $table->boolean('use_gallery')->default(true);
            $table->boolean('use_viator_t2d')->default(false);
            $table->boolean('use_xperience_more')->default(true);
            $table->boolean('show_on_parent')->default(false);
            $table->integer('parent_id')->nullable();
        });

        Schema::table('destinations', function (Blueprint $table){
            $table->foreign('parent_id')->references('fodor_id')->on('destinations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('destinations');
    }
}
