<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{

    protected $fillable = [
        'nom', 'resume', 'debut'
    ];

    protected $dates = [
        'debut'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function saisons(){
        return $this->hasMany('App\Saison');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function realisateurs(){
        return $this->belongsToMany('App\Personne', 'realisateur_serie', 'serie_id', 'personne_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function acteurs(){
        return $this->belongsToMany('App\Personne', 'acteur_serie', 'serie_id', 'personne_id');
    }

}
