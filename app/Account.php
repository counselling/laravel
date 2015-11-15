<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model {

    protected $fillable = [
        'date',
        'type',
        'credit',
        'debit',
        'trans_rcpt',
        'user_id',
        'cash_cheque'
    ];

    /**
     * Get the user that owns the account entry.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
