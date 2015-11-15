<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Practice extends Model {

    /**
     * Get the user that owns the Practice entry.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
