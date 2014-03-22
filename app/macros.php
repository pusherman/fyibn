<?php

HTML::macro('nav_item', function($route, $text) {    

    $active = null;
    
    if( Request::path() == $route ) 
    {
        $active = "class = 'active'";
    }
 
    return '<li ' . $active . '>' . link_to($route, $text) . '</li>';
});