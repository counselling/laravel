<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User_qual extends Model {

    /**
     * Get the user that owns the Qualification entry.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
