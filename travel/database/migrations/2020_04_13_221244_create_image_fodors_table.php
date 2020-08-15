<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageFodorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_fodors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('fodor_id');
            $table->integer('sequence');
            $table->string('image_url');
            $table->string('caption')->nullable()->default(null);
            $table->string('copyright')->nullable()->default(null);
            $table->string('usage_rights')->nullable()->default(null);
            $table->string('credit')->nullable()->default(null);
            $table->text('keyword_list')->nullable()->default(null);
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
        Schema::dropIfExists('image_fodors');
    }
}
