//Old Works Nav
jQuery(function ($) {
    //News Gallery
    if($('#newsGallery')){
        var gallery = $('#newsGallery');
        var nav_left = $(gallery).find('a.nav_left');
        var nav_right = $(gallery).find('a.nav_right');
        var wrap = $(gallery).find('.wrap')[0];
        var count = $(wrap).find('.news').size();
        $(wrap).data('nav_limit', count-1);
        $(wrap).data('nav_current', 0);
        $(nav_left).click(function (e) {
            e.preventDefault();
            var t = $(wrap).data('nav_current');
            if (t > 0) {
                $(wrap).animate({
                    'margin-left': '+=520'
                }, 'slow');
                $(wrap).data('nav_current', t - 1);
            }
            return false;
        });
        $(nav_right).click(function (e) {
            e.preventDefault();
            var t = $(wrap).data('nav_current');
            if (t < $(wrap).data('nav_limit')) {
                $(wrap).animate({
                    'margin-left': '-=520'
                }, 'slow');
                $(wrap).data('nav_current', t + 1);
            }
            return false;
        });
    }
    //往届Slider
    $('.year').each(function () {
        var me = this;
        var nav_left = $(me).find('a.nav_left');
        var nav_right = $(me).find('a.nav_right');
        var works = $(me).find('div.works')[0];
        var count = $(works).find('div.work').size();
        $(works).data('nav_limit', Math.floor((count-1) / 4));
        $(works).data('nav_current', 0);
        $(nav_left).click(function (e) {
            e.preventDefault();
            var t = $(works).data('nav_current');
            if (t > 0) {
                $(works).animate({
                    'margin-left': '+=888'
                }, 'slow');
                $(works).data('nav_current', t - 1);
            }
            return false;
        });
        $(nav_right).click(function (e) {
            e.preventDefault();
            var t = $(works).data('nav_current');
            if (t < $(works).data('nav_limit')) {
                $(works).animate({
                    'margin-left': '-=888'
                }, 'slow');
                $(works).data('nav_current', t + 1);
            }
            return false;
        });
    });
});