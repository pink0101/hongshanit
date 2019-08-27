$(function() {
    $(".imgBg").each(function(index, element) {
        $(".imgBg").eq(index).css("background-image", "url(" + $(".imgBg").eq(index).find("img").attr("src") + ")")
    });
    $(".menuBtn").click(function() {
        $(".navBg").addClass("active");
        $(".navList li").each(function(index, element) {
            $(this).css("transition-delay", index / 10 + 0.3 + "s")
        })
    });
    $(".navClose").click(function() {
        $(".navBg").removeClass("active");
        $(".navList li").each(function(index, element) {
            $(this).css("transition-delay", 0 + "s")
        })
    });
    /*swiper动画的主页初始化并配置*/
    var mbox1 = new Swiper('.mbox1 .swiper-container', {
        effect:'fade',//切换效果
        loop: true,//是否循环播放
        autoplay: 6000,//切换时间6s
        autoplayDisableOnInteraction: false,//如果设置为false，用户操作swiper之后自动切换不会停止，每次都会重新启动autoplay。
        speed: 2000,//切换的速度
        resizeReInit: true,//设置为true则windows改变尺寸时swiper会重新初始化。
        followFinger: true,//用户滑动的时候，是否跟随手指
        pagination: '.mbox1 .swiper-pagination',//分页器导航
        paginationClickable: true,//是否开启指示器
        onInit: function(swiper) {//浏览器大小改变时触发
            swiperAnimateCache(swiper);//隐藏动画元素
            swiperAnimate(swiper); //初始化完成开始动画
        },
        onSlideChangeEnd: function(swiper) {//当swiper里面的slides切换结束时触发
            swiperAnimate(swiper);
        }
    });
    $(".banText2").css("height", $(".banText2").width());
    $(".mbox2Bot li").each(function(index, element) {
        $(this).css("transition-delay", index / 5 + 0.3 + "s")
    });
    /*swiper动画的第三页初始化并配置*/
    var box3RigText = new Swiper('.box3RigText .swiper-container', {
        loop: true,
        slidesPerView: 1,
        observer: true,
        observeParents: true,
        prevButton: '.box3RigText .mbox3Prev',
        nextButton: '.box3RigText .mbox3Next',
        onSlideChangeStart: function(swiper) {
            $(".mbox3LefItem li").eq(swiper.realIndex).addClass("active").siblings().removeClass("active");
            $(".box3RigImg .box3RigImgItem").eq(swiper.realIndex).addClass("active").siblings().removeClass("active")
        }
    });
    $(".mbox3LefItem li").click(function() {
        $(this).addClass("active").siblings().removeClass("active");
        var ClickNum = $(this).index();
        box3RigText.slideTo(ClickNum + 1, 1000, false);
        $(".box3RigImg .box3RigImgItem").eq(ClickNum).addClass("active").siblings().removeClass("active")
    });
    $(".mbox3LefItem li").each(function(index, element) {
        $(this).css("transition-delay", index / 5 + 0.3 + "s")
    });
    $(".mbox4LefBtn").click(function() {
        $(".mbox4Lef").toggleClass("active");
        $("body").toggleClass("active")
    });
    $(".mbox4LefItem li").each(function(index, element) {
        $(this).css("transition-delay", index / 5 + 0.3 + "s")
    });
    $(".mbox4List").after("<div class='mbox4Listm'></div>");
    $(".mbox4Listm").html($(".mbox4List").html());
    var mbox4Listm = new Swiper('.mbox4Listm .swiper-container', {
        slidesPerView: 3,
        slidesPerColumn: 3,
        spaceBetween: 30,
        slidesPerColumnFill: 'row',
        observer: true,
        observeParents: true,
        prevButton: '.mbox4Listm .mbox4Prev',
        nextButton: '.mbox4Listm .mbox4Next',
        breakpoints: {
            1600 : {
                slidesPerView: 3,
                slidesPerColumn: 2,
                spaceBetween: 20,
            },
            992 : {
                slidesPerView: 3,
                slidesPerColumn: 2,
            },
            797 : {
                slidesPerView: 2,
                slidesPerColumn: 2,
            },
            460 : {
                slidesPerView: 1,
                slidesPerColumn: 1,
            }
        }
    });
    var mbox5List = new Swiper('.mbox5List .swiper-container', {
        slidesPerView: 5,
        slidesPerColumn: 3,
        spaceBetween: 5,
        observer: true,
        observeParents: true,
        prevButton: '.mbox5Prev',
        nextButton: '.mbox5Next',
        pagination: '.mbox5List .swiper-pagination',
        paginationClickable: true,
        breakpoints: {
            1600 : {
                slidesPerView: 5,
                slidesPerColumn: 3,
            },
            1400 : {
                slidesPerView: 4,
                slidesPerColumn: 3,
            },
            992 : {
                slidesPerView: 3,
                slidesPerColumn: 3,
            },
            797 : {
                slidesPerView: 2,
                slidesPerColumn: 2,
            },
            460 : {
                slidesPerView: 2,
                slidesPerColumn: 2,
            }
        }
    });
    $(".footerShare li").hover(function() {
        $(this).find(".wx").slideToggle()
    });
    $(".hotNewsList li").each(function(index, element) {
        $(this).attr("data-wow-delay", index * 2 / 10 + 0.5 + "s")
    });
    $(".banShareBtn").click(function() {
        $(this).toggleClass("active");
        $(".banShareList").toggleClass("active")
    });
    $(".caseList li").each(function(index, element) {
        $(this).attr("data-wow-delay", index / 10 + "s")
    });
    $(".joinBtn").click(function() {
        if ($(this).parent().hasClass("active")) {
            $(this).parent().removeClass("active")
        } else {
            $(".joinList li").removeClass("active");
            $(this).parent().addClass("active")
        }
    });
    $(window).resize(function() {
        $(".banText2").css("height", $(".banText2").width());
        $(".mbox4Lef").removeClass("active")
    });
    function equip() {
        var sUserAgent = navigator.userAgent.toLowerCase();
        if ((sUserAgent.match(/(ipod|iphone os|midp|ucweb|android|windows ce|windows mobile)/i))) {
            $(".wjInput").focus(function() {
                $("header").css("position", "absolute")
            })
        }
    };
    equip()
});
$(window).error(function() {
    return true
});
//如果图片元素遇到错误，隐藏
$("img").error(function() {
    $(this).hide()
});




