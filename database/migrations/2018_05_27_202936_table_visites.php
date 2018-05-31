<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableVisites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visites', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_visite')->nullable();
            $table->time('heure_entre')->nullable();
            $table->time('heure_sortie')->nullable();
            $table->integer('visiteur_id')->unsigned()->nullable();
            $table->integer('hote_id')->unsigned()->nullable();
            $table->string('nom_hotesse')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visites');
    }
}
