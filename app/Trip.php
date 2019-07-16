<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trips';

    /**
     * Get the country record associated with the destination.
     */
    public function country()
    {
        return $this->belongsTo('App\Country','destination');
    }
}
