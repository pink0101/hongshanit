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
    /**/
    $('.hs_nav_switch').on('click', function () {
        $('.hs_nav_left').fadeIn();
    });
    $('.hs_nav_left_icon').on('click', function () {
        $('.hs_nav_left').fadeOut();
    });


    window.onresize = function () {//对屏幕大小发生改变的时候执行
        var width = $(window).width();//获取屏幕宽度
        if (width > 992) {
            $('.hs_nav_left').fadeIn();
        } else if (width < 992) {
            $('.hs_nav_left').css('display', 'none')
        }
    };
});

/*轮播图部分*/
$(function () {
    //假设一个li的索引值
    var count = 0;
    //拿到右边的按钮，注册点击事件
    $(".arrow-right").click(function () {
        //判断索引是否到达最大值，如果有，重新赋值为1，如果没有自增
        count == $(".slider .slider_div li").length - 1 ? count = 0 : count++;
        //将索引值赋给li，然后设置显示，然后找到所有兄弟元素，设置消失
        $(".slider .slider_div li").eq(count).css('display', 'block').siblings("li").css('display', 'none');

        var width=$(document).width();
        if (width<992){
            $(".slider .slider_spot li p").css('background', '#ffffff');
            //将所有的p的背景颜色的清除，然后将当前的p加上背景颜色
            $(".slider .slider_spot li p").eq(count).css('background', '#9f8027');
        } else{
            $(".slider .slider_spot li p").css('background', 'none');
            //将所有的p的背景颜色的清除，然后将当前的p加上背景颜色
            $(".slider .slider_spot li p").eq(count).css('background', '#9f8027');
        }

    });

    setInterval(function () {
        //判断索引是否到达最大值，如果有，重新赋值为1，如果没有自增
        count == $(".slider .slider_div li").length - 1 ? count = 0 : count++;
        //将索引值赋给li，然后设置显示，然后找到所有兄弟元素，设置消失
        $(".slider .slider_div li").eq(count).css('display', 'block').siblings("li").css('display', 'none');

        var width=$(document).width();
        if (width<992){
            $(".slider .slider_spot li p").css('background', '#ffffff');
            //将所有的p的背景颜色的清除，然后将当前的p加上背景颜色
            $(".slider .slider_spot li p").eq(count).css('background', '#9f8027');
        } else{
            $(".slider .slider_spot li p").css('background', 'none');
            //将所有的p的背景颜色的清除，然后将当前的p加上背景颜色
            $(".slider .slider_spot li p").eq(count).css('background', '#9f8027');
        }
    }, 5000);




    //拿到左边的按钮，注册点击事件
    $(".arrow-left").click(function () {
        //判断索引是否到达最小值，如果有，重新赋值为最大值，如果没有自减
        count == 0 ? count = $(".slider .slider_div li").length - 1 : count--;
        //将索引值赋给li，然后设置显示，然后找到所有兄弟元素，设置消失
        $(".slider .slider_div li").eq(count).css('display', 'block').siblings("li").css('display', 'none');

        //将所有的p的背景颜色的清除，然后将当前的p加上背景颜色
        $(".slider .slider_spot li p").css('background', 'none');
        $(".slider .slider_spot li p").eq(count).css('background', '#9f8027');
    })
});