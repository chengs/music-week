<?php
/*
    Template Name: 活动模板
*/
get_header();
?>
    <div id="articleContainer" class="bodyContainer">
        <?php while (have_posts()) : the_post(); ?>
            <div class="content">
                <div class="nav">
                    <span class="cat">Event-活动</span>
                </div>
                <div class="article">
                    <div class="text">
                        <article>
                            <h1><?php the_title();?></h1>
                            <?php the_content(); ?>
                        </article>
                    </div>
                    <div id="calendar" class="text"></div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php
get_footer();
?>