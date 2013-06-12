<?php 
// 加载WPD主题设置框架
require_once( TEMPLATEPATH . '/admin/panel.php');
require_once( TEMPLATEPATH . '/admin/theme-form.php');
require_once( TEMPLATEPATH . '/admin/theme-options.php' );

function mw_style(){
    if(is_home()){
        echo '<link rel="stylesheet" href="'.get_bloginfo('url').'/draft/css/index.css">';
    }else if(is_single()){
        echo '<link rel="stylesheet" href="'.get_bloginfo('url').'/draft/css/article.css">';
    }else{
        echo '<link rel="stylesheet" href="'.get_bloginfo('url').'/draft/css/core.css">';
    }
}