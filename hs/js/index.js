$(function () {
    /*1.引入*/
    /*2.结构   HTML中需要视差滚动效果的加  data-stellar-background-ratio="0.5"*/
    /*3.初始化插件*/
    $.stellar({
        horizontalScrolling: false,
        responsive: true
    });
});


/*导航栏点击事件*/
$(function () {
    $('.hs_nav_switch').on('click', function () {
        $('.hs_nav_left').fadeIn();
    });
    $('.hs_nav_left_icon').on('click', function () {
        $('.hs_nav_left').fadeOut();
    });


    window.onresize = function () {
        var width = $(window).width();//获取屏幕宽度
        if (width > 992) {
            $('.hs_nav_left').fadeIn();
        }
    };

});