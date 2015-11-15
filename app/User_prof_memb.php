<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User_prof_memb extends Model {

    /**
     * Get the user that owns the Professional Membership entry.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
