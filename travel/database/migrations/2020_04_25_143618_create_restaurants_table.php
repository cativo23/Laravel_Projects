<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('alias')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('image_url')->nullable()->default(null);
            $table->string('is_closed')->nullable()->default(null);
            $table->string('url')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('display_phone')->nullable()->default(null);
            $table->string('review_count')->nullable()->default(null);
            $table->string('rating')->nullable()->default(null);
            $table->string('address1')->nullable()->default(null);
            $table->string('address2')->nullable()->default(null);
            $table->string('address3')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('state')->nullable()->default(null);
            $table->string('zip')->nullable()->default(null);
            $table->string('country')->nullable()->default(null);
            $table->string('display_address')->nullable()->default(null);
            $table->string('cross_streets')->nullable()->default(null);
            $table->string('price')->nullable()->default(null);
            $table->string('transactions', 1000)->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
