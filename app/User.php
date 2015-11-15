<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'first_name',
        'last_name',
        'email',
        'password'
    ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public function index()
    {
        //
    }

    public function accounts()
    {
        return $this->hasMany('Account');
    }

    public function changed_practices()
    {
        return $this->hasMany('Changed_practice');
    }

    public function changed_residences()
    {
        return $this->hasMany('Changed_residence');
    }

    public function practices()
    {
        return $this->hasOne('Practice');
    }

    public function user_interests()
    {
        return $this->hasMany('User_interest');
    }

    public function user_langs()
    {
        return $this->hasMany('User_lang');
    }

    public function user_oth_membs()
    {
        return $this->hasMany('User_oth_memb');
    }

    public function user_prof_membs()
    {
        return $this->hasMany('User_prof_memb');
    }

    public function user_styles()
    {
        return $this->hasMany('User_style');
    }

    public function user_quals()
    {
        return $this->hasMany('User_qual');
    }

}
