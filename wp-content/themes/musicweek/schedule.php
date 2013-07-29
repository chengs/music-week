<?php
/*
    Template Name: 活动日程模板
*/
get_header();
function mw_schedule_args($args,$input){
    $fields = array('start_before','start_after','end_before','end_after','all_day');
    foreach ($fields as $f ) {
        if(isset($input[$f])){
            $args[$f] = $input[$f];
        }
    }
    return $args;
}
add_filter('em_events_get_default_search','mw_schedule_args',10,2);
function mw_schedule_events_filter($condition,$args){
    if( !empty($args['start_before'])){
        if(is_string($args['start_before'])){
            $condition['start_before'] = "(`event_start_time` <= CAST( '$args[start_before]' AS TIME ) )";
        }
    }

    if( !empty($args['end_before'])){
        if(is_string($args['end_before'])){
            $condition['end_before'] = "(`event_end_time` <= CAST( '$args[end_before]' AS TIME ) )";
        }
    }

    if( !empty($args['start_after'])){
        if(is_string($args['start_after'])){
            $condition['start_after'] = "(`event_start_time` >= CAST( '$args[start_after]' AS TIME ) )";
        }
    }

    if( !empty($args['end_after'])){
        if(is_string($args['end_after'])){
            $condition['end_after'] = "(`event_end_time` >= CAST( '$args[end_after]' AS TIME ) )";
        }
    }

    if( !empty($args['all_day'])){
        if($args['all_day']){
            $condition['all_day'] = "(`event_all_day` = 1)";
        }
    }
    return $condition;
}
add_filter('em_events_build_sql_conditions','mw_schedule_events_filter',1,2);
$mw_event_format = <<< End
<a href="#_EVENTURL" target="_blank" style="background:#_CATEGORYCOLOR;">
<b style="font-size:14px;">#_CATEGORYNAME</b>
<br>#_EVENTNAME
<br>
<br>#_24HSTARTTIME-#_24HENDTIME
{has_location}<br>@#_LOCATIONNAME{/has_location}
</a>
End;
?>
    <div id="articleContainer" class="bodyContainer">
        <?php while (have_posts()) : the_post(); ?>
            <div class="content">
                <div class="nav">
                    <span class="cat"><?php the_title();?></span>
                </div>
                <div class="article">
                    <div class="text">
                        <article id="schedule">
                            <table>
                                <thead>
                                    <tr>
                                        <td></td>
                                        <td class="week">10月19日<br>(周六)</td>
                                        <td class="week">10月20日<br>(周日)</td>
                                        <td class="week">10月21日<br>(周一)</td>
                                        <td class="week">10月22日<br>(周二)</td>
                                        <td class="week">10月23日<br>(周三)</td>
                                        <td class="week">10月24日<br>(周四)</td>
                                        <td class="week">10月25日<br>(周五)</td>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <tr>
                                        <td class="week">上午</td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'08:00','end_before'=>'12:00','scope'=>'2013-10-19','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?>                                            
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'08:00','end_before'=>'12:00','scope'=>'2013-10-20','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'08:00','end_before'=>'12:00','scope'=>'2013-10-21','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?>                                           
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'08:00','end_before'=>'12:00','scope'=>'2013-10-22','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?>                                            
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'08:00','end_before'=>'12:00','scope'=>'2013-10-23','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?>                                            
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'08:00','end_before'=>'12:00','scope'=>'2013-10-24','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?>                                            
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'08:00','end_before'=>'12:00','scope'=>'2013-10-25','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?>                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="week">下午</td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'12:00','end_before'=>'18:00','scope'=>'2013-10-19','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?>                                            
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'12:00','end_before'=>'18:00','scope'=>'2013-10-20','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?> 
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'12:00','end_before'=>'18:00','scope'=>'2013-10-21','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?> 
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'12:00','end_before'=>'18:00','scope'=>'2013-10-22','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?> 
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'12:00','end_before'=>'18:00','scope'=>'2013-10-23','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?> 
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'12:00','end_before'=>'18:00','scope'=>'2013-10-24','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?> 
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'12:00','end_before'=>'18:00','scope'=>'2013-10-25','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?> 
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="week">晚上</td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'18:00','end_before'=>'23:00','scope'=>'2013-10-19','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?> 
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'18:00','end_before'=>'23:00','scope'=>'2013-10-20','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?> 
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'18:00','end_before'=>'23:00','scope'=>'2013-10-21','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?> 
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'18:00','end_before'=>'23:00','scope'=>'2013-10-22','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?> 
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'18:00','end_before'=>'23:00','scope'=>'2013-10-23','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?> 
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'18:00','end_before'=>'23:00','scope'=>'2013-10-24','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?> 
                                        </td>
                                        <td>
                                            <?php
                                                em_events(array('start_after'=>'18:00','end_before'=>'23:00','scope'=>'2013-10-25','format_header'=>'','format'=>$mw_event_format,'format_footer'=>''));
                                            ?> 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </article>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php
get_footer();
?>