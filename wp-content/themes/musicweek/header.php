<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php wp_title('-', true, 'right'); echo get_option('blogname');?></title>
    <meta name="description" content="<?php get_option('blogdescription');?>">
    <meta name="viewport" content="width=device-width">

    <?php wp_enqueue_style('core');?>
    <?php wp_head(); ?>
</head>
<body>
<!-- Add your site or application content here -->
<nav id="topNav">
    <div class="container">
        <span class="logo"><a href="<?php bloginfo('url');?>"><img src="<?php bloginfo('template_url'); ?>/img/navtop_logo.png" alt=""/></a></span>
        <span class="weibo"><a href="<?php echo get_option('mw_weibo_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/navtop_weibo.png" alt=""/></a></span>
    </div>
</nav>
<header>
    <div class="container">
        <nav id="mainNav" class="nav">
            <?php wp_nav_menu(array( 'menu' => 'mainNav', 'depth' => 2));?>
        </nav>
    </div>
</header>