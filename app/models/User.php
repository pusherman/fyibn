<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

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
     * User to posts relationship
     */
    public function posts()
    {
        return $this->hasMany('Post');
    }

    /**
     * Post to comment relationship
     */
    public function comments()
    {
        return $this->hasMany('Comment');
    }

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
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    public function hasFavorited(Post $post)
    {
        $favorite = Favorite::where('user_id', '=', Auth::user()->id)
                        ->where('post_id', '=', $post->id)
                        ->first();

        return $favorite instanceof Favorite;
    }
}