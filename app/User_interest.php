<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User_interest extends Model {

    /**
     * Get the user that owns the User Interest entry.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
