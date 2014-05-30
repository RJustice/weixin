<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists('is_logged')){
    function is_logged($redirect = TRUE){
        $ci = & get_instance();
        //var_dump($ci->session->userdata('logged'));
        if(!$ci->session->userdata('logged')){
            if($redirect){
                redirect('user/login');
            }else{
                return FALSE;
            }
        }
        return TRUE;
    }
}

if( ! function_exists('is_admin')){
    function is_admin(){
        return TRUE;
    }
}

if( ! function_exists('is_owner')){
    function is_owner(){
        return TRUE;
    }
}

if( ! function_exists('has_access')){
    function has_access(){
        return TRUE;
    }
}

