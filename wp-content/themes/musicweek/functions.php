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
    wp_register_style('core',"$basePath/css/core.css",array(),'latest');
    wp_register_style('fullCalendar',"$basePath/css/fullcalendar.css");
    //注册js
    //wp_register_script('jquery',"$basePath/js/jquery-1.9.1.min.js",array(),'1.9.1',true);
    wp_register_script('main',"$basePath/js/main.js",array('jquery'),'latest',true);
    wp_register_script('fullCalendar',"$basePath/js/fullCalendar.js",array('jquery'),'latest',true);
    wp_register_script('quickflip',"$basePath/js/jquery.quickflip.min.js",array('jquery'),'latest',true);
    //
    wp_enqueue_script('jquery');
    wp_enqueue_script('main');
}

function mw_stickey( $posts ) {
    if(is_home() || !is_archive())
        return $posts;

    global $wp_query;

    $sticky_posts = get_option('sticky_posts');

    if ( $wp_query->query_vars['paged'] <= 1 && is_array($sticky_posts) && !empty($sticky_posts) && !get_query_var('ignore_sticky_posts') ) {        $stickies1 = get_posts( array( 'post__in' => $sticky_posts ) );
        foreach ( $stickies1 as $sticky_post1 ) {
            // 判断当前是否分类页
            if($wp_query->is_category == 1 && !has_category($wp_query->query_vars['cat'], $sticky_post1->ID)) {
                // 去除不属于本分类的文章
                $offset1 = array_search($sticky_post1->ID, $sticky_posts);
                unset( $sticky_posts[$offset1] );
            }
            if($wp_query->is_tag == 1 && has_tag($wp_query->query_vars['tag'], $sticky_post1->ID)) {
                // 去除不属于本标签的文章
                $offset1 = array_search($sticky_post1->ID, $sticky_posts);
                unset( $sticky_posts[$offset1] );
            }
            if($wp_query->is_year == 1 && date_i18n('Y', strtotime($sticky_post1->post_date))!=$wp_query->query['m']) {
                // 去除不属于本年份的文章
                $offset1 = array_search($sticky_post1->ID, $sticky_posts);
                unset( $sticky_posts[$offset1] );
            }
            if($wp_query->is_month == 1 && date_i18n('Ym', strtotime($sticky_post1->post_date))!=$wp_query->query['m']) {
                // 去除不属于本月份的文章
                $offset1 = array_search($sticky_post1->ID, $sticky_posts);
                unset( $sticky_posts[$offset1] );
            }
            if($wp_query->is_day == 1 && date_i18n('Ymd', strtotime($sticky_post1->post_date))!=$wp_query->query['m']) {
                // 去除不属于本日期的文章
                $offset1 = array_search($sticky_post1->ID, $sticky_posts);
                unset( $sticky_posts[$offset1] );
            }
            if($wp_query->is_author == 1 && $sticky_post1->post_author != $wp_query->query_vars['author']) {
                // 去除不属于本作者的文章
                $offset1 = array_search($sticky_post1->ID, $sticky_posts);
                unset( $sticky_posts[$offset1] );
            }
        }

        $num_posts = count($posts);
        $sticky_offset = 0;
        // Loop over posts and relocate stickies to the front.
        for ( $i = 0; $i < $num_posts; $i++ ) {
            if ( in_array($posts[$i]->ID, $sticky_posts) ) {
                $sticky_post = $posts[$i];
                // Remove sticky from current position
                array_splice($posts, $i, 1);
                // Move to front, after other stickies
                array_splice($posts, $sticky_offset, 0, array($sticky_post));
                // Increment the sticky offset. The next sticky will be placed at this offset.
                $sticky_offset++;
                // Remove post from sticky posts array
                $offset = array_search($sticky_post->ID, $sticky_posts);
                unset( $sticky_posts[$offset] );
            }
        }

        // If any posts have been excluded specifically, Ignore those that are sticky.
        if ( !empty($sticky_posts) && !empty($wp_query->query_vars['post__not_in'] ) )
            $sticky_posts = array_diff($sticky_posts, $wp_query->query_vars['post__not_in']);

        // Fetch sticky posts that weren't in the query results
        if ( !empty($sticky_posts) ) {
            $stickies = get_posts( array(
                'post__in' => $sticky_posts,
                'post_type' => $wp_query->query_vars['post_type'],
                'post_status' => 'publish',
                'nopaging' => true
            ) );

            foreach ( $stickies as $sticky_post ) {
                array_splice( $posts, $sticky_offset, 0, array( $sticky_post ) );
                $sticky_offset++;
            }
        }
    }

    return $posts;
}

