<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    use Sluggable;

    protected $fillable = [
        'nom', 'duree', 'resume', 'sortie', 'slug'
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
}
