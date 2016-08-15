<?php

use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Film::class, 50)->create()->each(function($f){
            $f->video()->save(factory(App\Video::class)->make());
            for($i = 0; $i < 10; $i++){
                $f->acteurs()->save(PersonneSeeder::getPersonne());
            }
            $f->realisateurs()->save(PersonneSeeder::getPersonne());
        });
    }
}
