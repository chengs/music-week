<?php
/*
    Template Name: 关于我们模板
*/
get_header();
?>
    <link rel="stylesheet" href="<?php bloginfo('url');?>/draft/css/article.css"/>
    <div id="container">
        <?php while (have_posts()) : the_post(); ?>
            <div class="content">
                <div class="nav">
                    <span class="cat">About us</span>
                </div>
                <div class="article">
                    <div class="text">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php
get_footer();
?>