<?php

class History extends Eloquent
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

    /**
     * Gets the history of a user
     */
    public function scopeOf($query, User $user)
    {
        return $query->where('user_id', '=', $user->id);
    }
    
    /**
     * Gets the history for a post
     */
    public function scopeFor($query, Post $post)
    {
        return $query->where('post_id', '=', $post->id);
    }

    /**
     * Record the post in history
     */
    public static function record(Post $post)
    {
        $history = self::firstOrCreate(array(
            'user_id' => Auth::user()->id,
            'post_id' => $post->id
        ));

        return $history->touch();
    }
}
