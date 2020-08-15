<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('fodor_id')->unique();
            $table->string('phone_string')->nullable()->default(null);
            $table->string('phone_desc')->nullable()->default(null);
            $table->string('phone_seq')->nullable()->default(null);
            $table->string('country_code')->nullable()->default(null);
            $table->string('area_code')->nullable()->default(null);
            $table->string('number')->nullable()->default(null);
            $table->string('extension')->nullable()->default(null);
            $table->text('phone_txt')->nullable()->default(null);

            $table->foreignId('point_of_interest_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phones');
    }
}
