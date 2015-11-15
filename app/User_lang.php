<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class User_lang extends Model {

    /**
     * Get the user that owns the language entry.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
