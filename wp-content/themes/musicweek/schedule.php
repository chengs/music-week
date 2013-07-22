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
                        <article id="schedule">
                            <table>
                                <thead>
                                    <tr>
                                        <td></td>
                                        <td class="week">10月19日<br>(周六)</td>
                                        <td class="week">10月20日<br>(周一)</td>
                                        <td class="week">10月21日<br>(周二)</td>
                                        <td class="week">10月22日<br>(周三)</td>
                                        <td class="week">10月23日<br>(周四)</td>
                                        <td class="week">10月24日<br>(周五)</td>
                                        <td class="week">10月25日<br>(周六)</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="week">上午</td>
                                        <td>
                                
                                            <div style="background:royalblue;">
                                                <b style="font-size:16px;">音乐会</b>
                                                <br>《新视觉电子音乐——“萨莉雅霍”与“让•巴荷耶”的视界》（亚洲首演）
                                                     <br>
                                                金平
                                                <br>
                                                8:00-9:00
                                            </div>
                                            <div style="background:#47b2af;">
                                                哇啦哇啦3
                                                     <br>
                                                金平
                                                <br>
                                                8:00-9:00
                                            </div>
                                        </td>
                                        <td>

                                        </td>
                                        <td>
                                            <div style="background:#5e5aa8;">
                                                哇啦哇啦2
                                                <br>
                                                金平
                                                <br>
                                                8:00-9:00
                                            </div>
                                            <div style="background:royalblue;">
                                                《新视觉电子音乐——“萨莉雅霍”与“让•巴荷耶”的视界》（亚洲首演）
                                                     <br>
                                                金平
                                                <br>
                                                8:00-9:00
                                            </div>
                                            <div style="background:#47b2af;">
                                                哇啦哇啦3
                                                     <br>
                                                金平
                                                <br>
                                                8:00-9:00
                                            </div>
                                        </td>
                                        <td>
                                            <div style="background:#5e5aa8;">
                                                哇啦哇啦2
                                                <br>
                                                金平
                                                <br>
                                                8:00-9:00
                                            </div>
                                            <div style="background:royalblue;">
                                                《新视觉电子音乐——“萨莉雅霍”与“让•巴荷耶”的视界》（亚洲首演）
                                                     <br>
                                                金平
                                                <br>
                                                8:00-9:00
                                            </div>
                                            <div style="background:#47b2af;">
                                                哇啦哇啦3
                                                     <br>
                                                金平
                                                <br>
                                                8:00-9:00
                                            </div>
                                        </td>
                                        <td><div style="background:#5e5aa8;">
                                                哇啦哇啦2
                                                <br>
                                                金平
                                                <br>
                                                8:00-9:00
                                            </div>
                                            <div style="background:royalblue;">
                                                《新视觉电子音乐——“萨莉雅霍”与“让•巴荷耶”的视界》（亚洲首演）
                                                     <br>
                                                金平
                                                <br>
                                                8:00-9:00
                                            </div>
                                            <div style="background:#47b2af;">
                                                哇啦哇啦3
                                                     <br>
                                                金平
                                                <br>
                                                8:00-9:00
                                            </div></td>
                                        <td></td>
                                        <td><div style="background:#5e5aa8;">
                                                哇啦哇啦2
                                                <br>
                                                金平
                                                <br>
                                                8:00-9:00
                                            </div>
                                            <div style="background:royalblue;">
                                                《新视觉电子音乐——“萨莉雅霍”与“让•巴荷耶”的视界》（亚洲首演）
                                                     <br>
                                                金平
                                                <br>
                                                8:00-9:00
                                            </div>
                                            <div style="background:#47b2af;">
                                                哇啦哇啦3
                                                     <br>
                                                金平
                                                <br>
                                                8:00-9:00
                                            </div></td>
                                    </tr>
                                    <tr>
                                        <td class="week">下午</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="week">晚上</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
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