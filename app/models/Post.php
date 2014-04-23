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
	 * Post to favorites relationship
	 */
	public function lovers()
	{
		return $this->hasMany('Favorite');
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

	/**
	 * Find the number of points (ie how many people loved it)
	 */
    public function getPointsAttribute()
    {
        return $this->lovers->count();
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