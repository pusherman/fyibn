<?php

class Post extends Eloquent
{
    protected $fillable = array(
        'title', 
        'url', 
        'user_id',
    );

    /**
     * Post to wish relationship
     */
    public function wish()
    {
        return $this->hasOne('Wish');
    }

    /**
     * Post to user relationship
     */
    public function user()
    {
        return $this->belongsTo('User');
    }

    /**
     * Post to comment relationship
     */
    public function comments()
    {
        return $this->hasMany('Comment');        
    }

    /**
     * Order by when last updated
     */
    public function scopeLatest($query)
    {
        return $this->orderBy('updated_at', 'desc')->with('user');
    }

    /**
     * Order by created
     */
    public function scopeOrderNew($query)
    {
        return $this->orderBy('created_at', 'desc');
    }

    public function getPointsAttribute()
    {
        return $this->favorites->count();
    }

    /**
     * Who made the last comment
     */
    public function lastCommentBy()
    {
        return $this->comments()->orderBy('created_at', 'desc')->first()->user->username;
    }

    /**
     * Check to see if the user has viewed the post
     */    
    public function isNew()
    {
        return is_null(History::of(Auth::user())->for($this)->first());
    }


}