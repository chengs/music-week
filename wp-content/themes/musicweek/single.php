<?php
/*
    Template Name: 文章页模板
*/
get_header();
?>
    <div id="container">
        <?php while (have_posts()) : the_post(); ?>
            <div class="content">
                <div class="nav">
                    <span class="cat"><?php the_category(','); ?></span>
                    <span class="back"><a href="#">返回</a></span>
                </div>
                <div class="article">
                    <p class="title"><?php the_title(); ?></p>

                    <p class="author">发表于 <?php the_date('Y-m-d')?> 由 <?php the_author(',');?> </p>

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