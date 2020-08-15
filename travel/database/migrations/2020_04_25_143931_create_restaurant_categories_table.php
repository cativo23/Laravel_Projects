<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('alias')->unique();
            $table->string('title');
            $table->string('parent')->nullable()->default(null);
        });

        Schema::table('restaurant_categories', function (Blueprint $table){
            $table->foreign('parent')->references('alias')->on('restaurant_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_categories');
    }
}
