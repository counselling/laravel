<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User_oth_membs extends Model {

    /**
     * Get the user that owns the Other Membership entry.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
