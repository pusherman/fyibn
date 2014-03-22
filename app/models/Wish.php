<?php

class Wish extends Eloquent
{
    protected $fillable = array(
        'filled_by',
        'filled_on',
    );
    
    public function post()
    {
        return $this->belongsTo('Post');
    }
}