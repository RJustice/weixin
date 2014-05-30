<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('cat_select')){
    function cat_select($attrs,$selected=1){
        $attr = '';
        foreach($attrs as $key=>$value){
            $attr .= $key.'="'.$value.'" ';
        }
        $ci = & get_instance();
        $ci->load->model('m_cat');
        $cats = $ci->m_cat->lists();
        $select = '<select '.$attr.'>';
        if($selected == 1){
            $select .= '<option value="0" selected >请选择</option>';
        }
        foreach($cats as $cat){
            $select .= '<option value="'.$cat['id'].'" '.($cat['id']==$selected?'selected':'').'>'.$cat['cat_name'].'</option>';
        }
        $select .= '</select>';
        return $select;
    }
}

if( ! function_exists('default_cat_artiles_select')){
    function default_cat_articles_select($attrs){
        $attr = '';
        foreach($attrs as $key=>$value){
            $attr .= $key.'="'.$value.'" ';
        }
        $ci = & get_instance();
        $ci->load->model('m_article');
        $articles = $ci->m_article->ajaxListsByCid(1);
        $select = '<select '.$attr.'>';
        foreach($articles as $article){
            $select .= '<option value="'.$article['id'].'" data-img="'.$article['img'].'">'.$article['title'].'</option>';
        }
        $select .= '</select>';
        return $select;
    }
}

if( ! function_exists('fun_menus_select')){
    function fun_menus_select($attrs){
        $attr = '';
        foreach($attrs as $key=>$value){
            $attr .= $key.'="'.$value.'" ';
        }
        $ci = & get_instance();
        $ci->load->model('m_funmenu');
        $articles = $ci->m_funmenu->getLists();
        $select = '<select '.$attr.'>';
        foreach($articles as $article){
            $select .= '<option value="'.$article['id'].'" data-img="'.$article['img'].'">'.$article['title'].'</option>';
        }
        $select .= '</select>';
        return $select;
    }
}