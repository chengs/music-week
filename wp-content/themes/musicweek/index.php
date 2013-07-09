<?php get_header(); ?>
    <div id="indexContainer" class="bodyContainer">
        <?php
        $pIdsStr = get_option('mw_index_news');
        $pIds = explode(',', $pIdsStr);
        query_posts(array('post__in' => $pIds));
        ?>
        <div id="topicList">
            <?php while (have_posts()) : the_post(); ?>
                <div class="topic">
                    <a href="<?php the_permalink(); ?>">
                        <div class="front">
                            <?php the_post_thumbnail(array(332, 350)); ?>
                        </div>
                        <div class="back">
                            <p class="title"><?php the_title(); ?></p>

                            <p class="info"><?php the_author(); ?></p>

                            <p class="info"><?php the_tags("", "&nbsp;", ""); ?></p>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php get_footer(); ?>