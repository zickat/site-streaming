<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{

    protected $fillable = [
        'video_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function video(){
        return $this->hasOne('App\Video');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function realisateurs(){
        return $this->belongsToMany('App\Personne', 'realisateur_film', 'film_id', 'personne_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function acteurs(){
        return $this->belongsToMany('App\Personne', 'acteur_film', 'film_id', 'personne_id');
    }

}
