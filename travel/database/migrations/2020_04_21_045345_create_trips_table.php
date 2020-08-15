<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('fodor_id')->unique();
            $table->string('title');
            $table->string('short_intro');
            $table->text('main_intro');
            $table->text('fri_text');
            $table->text('sat_text');
            $table->text('sun_text');
            $table->string('url_slug');
            $table->string('latitude');
            $table->string('longitude');
            $table->text('did_you_know');
            $table->text('where_to_stay');
            $table->text('when_to_go');
            $table->text('how_to_get_there');
            $table->string('image_url')->nullable();
            $table->string('caption')->nullable();
            $table->string('credit')->nullable();
            $table->string('copyright')->nullable();
            $table->string('usage_rights')->nullable()->default(null);
            $table->string('keyword_list')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
