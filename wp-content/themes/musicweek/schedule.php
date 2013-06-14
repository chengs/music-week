<?php
/*
    Template Name: 活动日程模板
*/
get_header();
?>
    <div id="articleContainer" class="bodyContainer">
        <?php while (have_posts()) : the_post(); ?>
            <div class="content">
                <div class="nav">
                    <span class="cat">Schedule-日程</span>
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