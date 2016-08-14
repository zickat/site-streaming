<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saison extends Model
{

    protected $fillable = [
        'numero', 'resume', 'debut', 'serie_id'
    ];

    protected $dates = [
        'debut'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function serie(){
        return $this->belongsTo('App\Serie');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function episodes(){
        return $this->hasMany('App\Episode');
    }

}
