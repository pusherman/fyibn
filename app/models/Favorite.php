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

    /**
     * Toggle a favorite on or off based on if
     * has already been done
     */
    public static function toggle(Post $post)
    {
        $favorite = self::firstOrNew(array(
            'user_id' => Auth::user()->id,
            'post_id' => $post->id
        ));

        if ($favorite->id)
        {
            $favorite->delete();
        }
        else
        {
            $favorite->save();
        }
    }
}