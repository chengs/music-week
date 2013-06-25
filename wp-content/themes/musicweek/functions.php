<?php 
// 加载WPD主题设置框架
require_once( TEMPLATEPATH . '/admin/panel.php');
require_once( TEMPLATEPATH . '/admin/theme-form.php');
require_once( TEMPLATEPATH . '/admin/theme-options.php' );

add_editor_style("article.css");
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

    //注册css
    $basePath = get_template_directory_uri();
    wp_register_style('core',"$basePath/css/core.css");
    wp_register_style('fullCalendar',"$basePath/css/fullcalendar.css");
    //注册js
    wp_register_script('jQuery',"$basePath/js/jquery-1.9.1.min.js",array(),'1.9.1',true);
    wp_register_script('main',"$basePath/js/main.js",array('jQuery'),'latest',true);
    wp_register_script('fullCalendar',"$basePath/js/fullCalendar.js",array('jQuery'),'latest',true);
    //
    wp_enqueue_script('jQuery');
    wp_enqueue_script('main');
}


