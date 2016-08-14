<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{

    protected $fillable = [
        'numero', 'saison_id', 'video_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function saison(){
        return $this->belongsTo('App\Saison');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function video(){
        return $this->hasOne('App\Video');
    }

}
