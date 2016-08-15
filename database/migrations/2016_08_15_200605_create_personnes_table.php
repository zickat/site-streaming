<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('slug')->unique();
            $table->date('dateDeNaissance');
            $table->longText('biographie');
            $table->timestamps();
        });

        Schema::create('realisateur_film', function(Blueprint $table){
            $table->increments('id');
            $table->integer('film_id')->index();
            $table->integer('personne_id')->index();
            $table->timestamps();
        });

        Schema::create('acteur_film', function(Blueprint $table){
            $table->increments('id');
            $table->integer('film_id')->index();
            $table->integer('personne_id')->index();
            $table->timestamps();
        });

        Schema::create('realisateur_serie', function(Blueprint $table){
            $table->increments('id');
            $table->integer('serie_id')->index();
            $table->integer('personne_id')->index();
            $table->timestamps();
        });

        Schema::create('acteur_serie', function(Blueprint $table){
            $table->increments('id');
            $table->integer('serie_id')->index();
            $table->integer('personne_id')->index();
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
        Schema::drop('personnes');
        Schema::drop('realisateur_film');
        Schema::drop('acteur_film');
        Schema::drop('realisateur_serie');
        Schema::drop('acteur_serie');
    }
}
