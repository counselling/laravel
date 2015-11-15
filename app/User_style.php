<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User_style extends Model {

    /**
     * Get the user that owns the Style of Working entry.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
