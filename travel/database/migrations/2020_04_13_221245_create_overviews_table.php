<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOverviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overviews', function (Blueprint $table) {
            $table->id();
            $table->text('text')->nullable()->default(null);
            $table->text('snippet')->nullable()->default(null);
            $table->timestamps();

            $table->foreignId('destination_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('overviews');
    }
}
