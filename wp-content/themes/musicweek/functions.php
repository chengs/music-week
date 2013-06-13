<?php 
// 加载WPD主题设置框架
require_once( TEMPLATEPATH . '/admin/panel.php');
require_once( TEMPLATEPATH . '/admin/theme-form.php');
require_once( TEMPLATEPATH . '/admin/theme-options.php' );

add_action( 'after_setup_theme', 'mw_setup' );

function mw_setup(){
    //绑定导航条
    if (function_exists('register_nav_menus')){
        register_nav_menus( array(
            'mainNav' => '主导航'
        ) );
    }
    //文章缩略图功能
    add_theme_support( 'post-thumbnails' ); //激活文章和页面的缩略图功能。
}