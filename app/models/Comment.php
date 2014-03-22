<?php

class Comment extends Eloquent
{
    protected $fillable = array(
        'body',
    );

    /**
     * Update the updated_at column of the posts table 
     * when a comment is added
     */
    protected $touches = array('post');

    /**
     * Comment to post relationship
     */
    public function post()
    {
        return $this->belongsTo('Post');
    }

    /**
     * Comment to user relationship
     */
    public function user()
    {
        return $this->belongsTo('User');
    }
}