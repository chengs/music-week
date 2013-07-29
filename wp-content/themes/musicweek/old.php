<?php
/*
    Template Name: 往届回顾模板
*/
get_header();
?>

    <div id="oldContainer" class="bodyContainer">
        <div class="content">
            <?php while (have_posts()) : the_post(); ?>
            <div class="nav">
                <span class="cat"><?php the_title();?></span>
                <span class="back"><a href="<?php bloginfo('url'); ?>">返回</a></span>
            </div>
            <? endwhile; ?>
            <?php
            $catIdsStr = get_option('mw_old_catIds');
            if (strlen($catIdsStr)) {
                $catIds = explode(',', $catIdsStr);
                foreach ($catIds as $cat) {
                    query_posts('cat=' . $cat);
                    ?>
                    <div class="year">
                        <p class="mark">
                            <span class="title"><?=get_cat_name($cat);?></span>
                            <span class="direction">
                                <a href="#" class="nav_left">&lt;</a>
                                <a href="#" class="nav_right">&gt;</a>
                            </span>
                        </p>
                        <div class="works">
                            <?php while (have_posts()) : the_post(); ?>
                                <div class="work">
                                    <a href="<? the_permalink()?>">
                                        <div class="img">
                                            <?php the_post_thumbnail(array(220, 123)); ?>
                                        </div>
                                        <div class="intro">
                                            <span class="triangle"></span>

                                            <p class="title"><?php the_title(); ?></p>

                                            <p class="info"><?php the_author(); ?></p>

                                            <p class="info"><?php the_tags("", "&nbsp;", ""); ?></p>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php
                }
            }
            ?>
        </div>
    </div>
<?
get_footer();
?>