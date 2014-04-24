<?php

class Favorite extends Eloquent
{
    protected $fillable = array(
        'user_id',
        'post_id',
    );

    /**
     * History to post relationship
     */
    public function post()
    {
        return $this->belongsTo('Post');
    }

    /**
     * History to user relationship
     */
    public function user()
    {
        return $this->belongsTo('User');
    }
}