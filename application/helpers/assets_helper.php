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

if(!function_exists('get_images')){
    function get_images($path, $class = ""){
        echo '<img src="' . base_url("/static/images/". $path) . '" width="100%" class="'.$class.'"/>';
    }
}

if(!function_exists('get_images_path')){
    function get_images_path($path){
        return base_url("/static/images/" . $path);
    }
}