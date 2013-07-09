<?php
/*
    Template Name: 默认页面模板
*/
get_header();
?>
    <div id="articleContainer" class="bodyContainer">
        <?php while (have_posts()) : the_post(); ?>
            <div class="content">
                <div class="nav">
                    <span class="cat"><?php the_title();?></span>
                </div>
                <div class="article">
                    <div class="text">
                        <article>
                            <?php the_content(); ?>
                        </article>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php
get_footer();
?>