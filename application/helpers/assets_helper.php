<?php

if(!function_exists('get_css')){
    function get_css($path){
        echo '<link rel="stylesheet" href="' . base_url("/static/css/" . $path) . '" />';
    }
}

if(!function_exists('get_js')){
    function get_js($path){
        echo '<script src="' . base_url("/static/js/". $path) . '" ></script>';
    }
}