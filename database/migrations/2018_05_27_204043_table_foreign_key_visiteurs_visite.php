<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableForeignKeyVisiteursVisite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visites', function (Blueprint $table) {
            $table->foreign('visiteur_id')->references('id')->on('visiteurs');
             $table->foreign('hote_id')->references('id')->on('hotes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visites', function (Blueprint $table) {
            //
        });
    }
}
