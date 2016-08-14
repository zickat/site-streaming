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

}
