<?php get_header();?>
    <div id="container">
        <div id="topicList">
            <?php while (have_posts()) : the_post(); ?>
            <div class="topic">
                <div class="img">
                    <?php the_post_thumbnail( array(332,257) );?>
                </div>
                <div class="intro">
                    <span class="triangle"></span>
                    <p class="title"><?php the_title();?></p>
                    <p class="info"><?php the_author();?></p>
                    <p class="info"><?php the_tags("","&nbsp;","");?></p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php get_footer();?>