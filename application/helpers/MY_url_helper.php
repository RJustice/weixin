<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists('add_theme_js')){
    function add_theme_js($sources = array()){
        $CI =& get_instance();
        if( ! is_array($sources)){
            $sources = array($sources);
        }
        $theme = $CI->template->get_theme();
        $theme_path = $CI->template->get_theme_path();
        $source_output = '';
        foreach($sources as $source){
            $source_url= $theme_path . $source;
            $data[] = $source_url;
            $source_output .= '<script src="'.base_url($source_url).'" ></script>';
        }
        return $source_output;
    }
}

if( ! function_exists('add_theme_css')){
    function add_theme_css($sources = array()){
        $CI =& get_instance();
        if( ! is_array($sources)){
            $sources = array($sources);
        }
        $theme = $CI->template->get_theme();
        $theme_path = $CI->template->get_theme_path();
        $source_output = '';
        foreach($sources as $source){
            $source_url= $theme_path . $source;
            $data[] = $source_url;
            $source_output .= '<link href="'.base_url($source_url).'" rel="stylesheet">';
        }
        return $source_output;
    }
}

if( ! function_exists('pagination')){
    function pagination($uri,$per_page,$total){
        $ci =& get_instance();
        $ci->load->library('pagination');

        $config['base_url'] = $uri;
        $config['total_rows'] = $total;
        $config['per_page'] = $per_page;
        $config['uri_segment'] = 3;
        $config['num_links'] = 4;
        $config['use_page_numbers'] = TRUE;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = FALSE;
        $config['last_link'] = FALSE;

        $config['next_link'] = '&gt;&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&lt;&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $ci->pagination->initialize($config); 

        return $ci->pagination->create_links();
    }
}