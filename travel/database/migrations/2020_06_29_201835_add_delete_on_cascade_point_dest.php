<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeleteOnCascadePointDest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('point_dest', function (Blueprint $table) {
            $table->dropForeign('point_dest_destination_id_foreign');
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('point_dest', function (Blueprint $table) {
            //
        });
    }
}
