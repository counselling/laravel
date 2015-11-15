<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Changed_residence extends Model {

    /**
     * Get the user that owned the residence entry.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
