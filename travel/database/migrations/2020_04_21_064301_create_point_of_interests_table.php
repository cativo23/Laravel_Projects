<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointOfInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_of_interests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable()->default(null);
            $table->string('latitude')->nullable()->default(null);
            $table->string('longitude')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->string('web')->nullable()->default(null);
            $table->text('review')->nullable()->default(null);
            $table->text('review_snippet')->nullable()->default(null);
            $table->string('admission', 1000)->nullable()->default(null);
            $table->string('card_policy', 1000)->nullable()->default(null);
            $table->string('open_hours', 1000)->nullable()->default(null);
            $table->string('closed_hours', 1000)->nullable()->default(null);
            $table->string('res_policy', 1000)->nullable()->default(null);
            $table->string('rooms', 1000)->nullable()->default(null);
            $table->string('meal_plans', 1000)->nullable()->default(null);
            $table->string('miscellaneous',1000)->nullable()->default(null);
            $table->integer('fodor_id')->unique()->nullable()->default(null);
            $table->string('slug')->nullable()->default(null);
            $table->string('state')->nullable()->default(null);
            $table->string('zip')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
            $table->string('metro', 1000)->nullable()->default(null);
            $table->string('directions',1000)->nullable()->default(null);
            $table->string('address_string', 1000)->nullable()->default(null);
            $table->string('prefix',1000)->nullable()->default(null);
            $table->string('street_address')->nullable()->default(null);
            $table->string('suffix')->nullable()->default(null);
            $table->string('neighborhood')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('point_of_interests');
    }
}
