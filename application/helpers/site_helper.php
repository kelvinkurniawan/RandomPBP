<?php


if(!function_exists('isNotLogin')){
    function isNotLogin(){

        $ci =& get_instance();
        if($ci->session->userId == ''){
            redirect(base_url('/session/new'));
        }
    }
}

if(!function_exists('isLogin')){
    function isLogin(){
        
        $ci =& get_instance();

        if($ci->session->userId != ''){
            redirect(base_url('/home'));
        }
    }
}


?>