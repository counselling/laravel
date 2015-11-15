<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Changed_practice extends Model {

    /**
     * Get the user that owned the practice entry.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
