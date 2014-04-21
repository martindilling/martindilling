<?php namespace MDH\Entities;

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'admin'    => '',
        'active'   => '',
        'name'     => 'required',
        'email'    => 'required|email',
        'password' => 'required',
    ];

    /**
     * Properties allowed for mass-assignment.
     *
     * @var array
     */
    protected $fillable = ['admin', 'active', 'name', 'email', 'password'];



    /*********************************************
     * Relationships
     *********************************************/

    public function posts()
    {
        return $this->hasMany('MDH\Entities\Post');
    }

    public function creations()
    {
        return $this->hasMany('MDH\Entities\Creation');
    }



    /*********************************************
     * Implemented
     *********************************************/

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

}
