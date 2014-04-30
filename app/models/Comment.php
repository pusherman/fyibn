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

    /**
     * Format markdown on get
     */
    public function setBodyAttribute($text)
    {
        $text = strip_tags($text);

        $text = str_replace("\r\n", "\n", $text);
        $text = str_replace("\r", "\n", $text);

        # replace tabs with spaces
        $text = str_replace("\t", '    ', $text);

        # remove surrounding line breaks
        $text = trim($text, "\n");

        $text = preg_replace("/\n/", " <br />", $text);

        $text = preg_replace_callback('/(https?:\/\/([\w.]+\/?)\S*)/', function($matches) {
            $link = $matches[0];
            return "<a href=\"$link\">$link</a>";
        }, $text);

        $this->attributes['body'] = $text;
    }
}