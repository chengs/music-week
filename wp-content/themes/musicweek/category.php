<?php
/*
    Template Name: 分类页模板
*/
get_header();
?>

<div id="worksContainer" class="bodyContainer">
    <div class="content">
        <div class="nav">
            <span class="cat"><?php echo single_cat_title( '', false );?></span>
        </div>
        <div id="worksList">
            <?php while (have_posts()) : the_post(); ?>
            <div class="work">
                <a href="<?php the_permalink(); ?>">
                    <div class="img">
                        <?php the_post_thumbnail( array(220,123) );?>
                    </div>
                    <div class="intro">
                        <span class="triangle"></span>
                        <p class="title"><?php the_title();?></p>
                        <p class="info"><?php the_author();?></p>
                        <p class="info"><?php the_tags("","&nbsp;","");?></p>
                    </div>
                </a>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php
get_footer();