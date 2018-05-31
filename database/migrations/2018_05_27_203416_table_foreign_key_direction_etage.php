<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableForeignKeyDirectionEtage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('direction_etage', function (Blueprint $table) {
            $table->foreign('etage_id')->references('id')->on('etages')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('direction_id')->references('id')->on('directions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('direction_etage', function (Blueprint $table) {
            //
        });
    }
}
