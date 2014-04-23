<?php

class Favorite extends Eloquent
{
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