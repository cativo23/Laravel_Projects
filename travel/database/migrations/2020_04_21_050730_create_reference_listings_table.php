<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenceListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reference_listings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('reference_listing_id');
            $table->string('listing_name');
            $table->string('street_address');
            $table->string('suffix')->nullable()->default(null);
            $table->string('city');
            $table->string('state');
            $table->string('phone');
            $table->string('web');
            $table->string('latitude');
            $table->string('longitude');

            $table->foreignId('trip_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reference_listings');
    }
}
