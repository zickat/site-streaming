<?php

use Illuminate\Database\Seeder;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Serie::class, 10)->create()->each(function($serie){
            $serie->saisons()->saveMany(factory(App\Saison::class, 10)->create()->each(function($saison){
                $saison->episodes()->saveMany(factory(App\Episode::class, 20)->create()->each(function($episode){
                    $episode->video()->save(factory(App\Video::class)->make());
                }));
            }));
        });
    }
}
