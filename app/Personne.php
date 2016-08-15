<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{

    use Sluggable;

    protected $fillable = [
        'nom', 'prenom', 'slug', 'dateDeNaissance', 'biographie'
    ];

    protected $dates = [
        'dateDeNaissance'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nom'
            ]
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function joueFilm(){
        return $this->belongsToMany('App\Film', 'acteur_film', 'personne_id', 'film_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function joueSerie(){
        return $this->belongsToMany('App\Serie', 'acteur_serie', 'personne_id', 'serie_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function realiseFilm(){
        return $this->belongsToMany('App\Film', 'realisateur_film', 'personne_id', 'film_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function realiseSerie(){
        return $this->belongsToMany('App\Serie', 'realisateur_serie', 'personne_id', 'serie_id');
    }

}
