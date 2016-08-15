<?php

use App\Personne;
use Illuminate\Database\Seeder;

class PersonneSeeder extends Seeder
{

    private static $number = -1;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Personne::class, 100)->create();
    }

    public static function getPersonne(){
        if(self::$number <= -1){
            self::$number = Personne::all()->count()-1;
        }
        $id = rand(0, self::$number);
        $p = Personne::find($id);
        if(!$p)
            $p = factory(App\Personne::class)->make();
        return $p;
    }

}
