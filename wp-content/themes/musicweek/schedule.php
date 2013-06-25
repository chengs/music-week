<?php
/*
    Template Name: 活动日程模板
*/
get_header();
wp_enqueue_script('fullCalendar');
wp_enqueue_style('fullCalendar');
function calendar_shortcode($attr,$content=null){
    $content=str_replace("<br />","",$content);
    return "<script>var CalendarEvents = [".do_shortcode($content)." ,''];</script>";
}
function event_shortcode($attr,$content){
    extract(shortcode_atts(array(
        'allDay'=>false,
    ),$attr));
    $obj = $attr;
    $obj['title'] = $content;
    return json_encode($obj).',';
}
add_shortcode('event','event_shortcode');
add_shortcode('calendar','calendar_shortcode');

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
                    <div id="calendar" class="text"></div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php
get_footer();
?>