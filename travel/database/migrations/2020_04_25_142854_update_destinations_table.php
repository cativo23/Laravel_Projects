<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDestinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('destinations', function (Blueprint $table) {
           $table->string('logo', 1000)->nullable()->default(null);
           $table->string('logo_sticky', 1000)->nullable()->default(null);
           $table->string('hero_video', 1000)->nullable()->default(null);
           $table->string('email')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('destinations', function (Blueprint $table) {
            $table->dropColumn(['logo']);
            $table->dropColumn(['logo_sticky']);
            $table->dropColumn(['hero_video']);
            $table->dropColumn(['email']);
        });
    }
}
