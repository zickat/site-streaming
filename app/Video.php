<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $fillable = [
        'nom', 'duree', 'resume', 'sortie'
    ];

    protected $dates = [
        'sortie'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function film(){
        return $this->hasOne('App\Film');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function episode(){
        return $this->hasOne('App\Episode');
    }

}
