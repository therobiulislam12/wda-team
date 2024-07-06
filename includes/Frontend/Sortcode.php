<?php

namespace WPD_Team\Frontend;

class Sortcode{
    public function __construct(){
        add_shortcode('wpd-team', function(){
            return '<h1>I am not working</h1>';
        });
    }
}