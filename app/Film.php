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

}
