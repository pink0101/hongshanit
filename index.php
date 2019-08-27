<!doctype html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <!--对ie8的设置-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!--浏览器内核选择-->
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <title>红杉科技社</title>
    <meta name="keywords" content="红杉科技社">
    <meta name="description" content="红杉科技社">
    <!--bootstrap引用-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--字体图标引用-->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!--动画插件的引用-->
    <link href="css/animate.css" rel="stylesheet">
    <!--触摸插件引用-->
    <link href="css/swiper.min.css" rel="stylesheet">
    <!--全面滚动插件-->
    <link rel="stylesheet" href="css/jquery.fullPage.css">
    <!--index-->
    <link href="css/index.css" rel="stylesheet">
    <!--css-->
    <link href="css/css.css" rel="stylesheet" type="text/css"/>
    <!--jquery引入-->
    <script src="js/jquery-1.10.1.js"></script>
    <!--bootstrap引用-->
    <script src="js/bootstrap.min.js"></script>
    <!--触摸插件引用-->
    <script src="js/swiper.min.js"></script>
    <!--swiper.animate动画的引入-->
    <script src="js/swiper.animate1.0.2.min.js"></script>
    <!--全屏滚动插件的引入-->
    <script src="js/jquery.fullPage.js"></script>
    <!--滚动监听插件-->
    <script src="js/jquery.waypoints.min.js"></script>
    <!--数字动画插件-->
    <script src="js/jquery.countup.js"></script>

    <!--第六页的插件-->
    <script src="js/jquery.superslide.2.1.1.js"></script>

    <script src="js/public.js"></script>
    <!--[if IE]>
    <script type="text/javascript" src="js/html5shiv.min.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <![endif]-->
    <style>
        html {
            overflow: hidden;
        }
    </style>

</head>
<body>

<!--右侧边栏-->
<?php include 'admin/inc/menuBg.php'; ?>
<!--顶部通栏-->
<?php include 'admin/inc/header.php'; ?>
<!--隐藏导航栏-->
<?php include 'admin/inc/navBg.php'; ?>
<!--主要内容-->
<div id="hmpage">
    <!--第一页-->
    <div class="section">
        <div class="mbox mbox1">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="banBg3"></div>
                        <div class="ban3Ico ban3Ico1"></div>
                        <div class="ban3Ico ban3Ico2"></div>
                        <div class="ban3Ico ban3Ico3"></div>
                        <div class="banText3">
                            <div class="banTextCn3 ani" swiper-animate-effect="fadeInUp" swiper-animate-duration="1s"
                                 swiper-animate-delay="0.3s">
                                <img src="images/banTextCn3.png" class="hidden-xs img-responsive">
                                <img src="images/banTextCn3m.png" class="visible-xs img-responsive">
                            </div>
                            <div class="banTextEn3 ani" swiper-animate-effect="fadeInUp" swiper-animate-duration="1s"
                                 swiper-animate-delay="0.8s">
                                <img src="images/banTextEn3.png" class="hidden-xs img-responsive">
                                <img src="images/banTextEn3m.png" class="visible-xs img-responsive">
                            </div>
                            <div class="banImg3">
                                <div class="banImg31 ani" swiper-animate-effect="fadeInUp" swiper-animate-duration="1s"
                                     swiper-animate-delay="3.8s">
                                    <img src="images/banDev1.png" class="img-responsive">
                                </div>
                                <div class="banImg32 ani" swiper-animate-effect="fadeInLeft"
                                     swiper-animate-duration="1s" swiper-animate-delay="2.8s">
                                    <img src="images/banDev2.png" class="img-responsive">
                                </div>
                                <div class="banImg33 ani" swiper-animate-effect="fadeInRight"
                                     swiper-animate-duration="1s" swiper-animate-delay="2.8s">
                                    <img src="images/banDev3.png" class="hidden-xs img-responsive">
                                    <img src="images/banDev3m.png" class="visible-xs img-responsive">
                                </div>
                                <div class="banImg34 ani" swiper-animate-effect="fadeInLeft"
                                     swiper-animate-duration="1s" swiper-animate-delay="1.8s">
                                    <img src="images/banDev4.png" class="img-responsive">
                                </div>
                                <div class="banImg35 ani" swiper-animate-effect="fadeInRight"
                                     swiper-animate-duration="1s" swiper-animate-delay="1.8s">
                                    <img src="images/banDev5.png" class="hidden-xs img-responsive">
                                    <img src="images/banDev5m.png" class="visible-xs img-responsive">
                                </div>
                                <div class="banImg36 ani" swiper-animate-effect="lightSpeedIn"
                                     swiper-animate-duration="1s" swiper-animate-delay="3.8s">
                                    <img src="images/banDev6.png" class="img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="banImg">
                            <div class="imgBg"><img src="images/banner02.jpg"></div>
                        </div>
                        <div class="banText2">
                            <div class="banTextCn2 ani" swiper-animate-effect="fadeInUp" swiper-animate-duration="0.5s"
                                 swiper-animate-delay="0.3s"><img src="images/banTextCn2.png" class="img-responsive">
                            </div>
                            <div class="banTextEn2 ani" swiper-animate-effect="fadeInUp" swiper-animate-duration="0.5s"
                                 swiper-animate-delay="0.8s"><img src="images/banTextEn2.png" class="img-responsive">
                            </div>
                            <div class="banTextCir ani" swiper-animate-effect="rotateIn" swiper-animate-duration="2s"
                                 swiper-animate-delay="1.3s"></div>
                            <div class="banLine2"></div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="banImg">
                            <div class="imgBg"><img src="images/banner01.jpg"></div>
                        </div>
                        <div class="banText">
                            <div class="banTextCn ani" swiper-animate-effect="fadeInUp" swiper-animate-duration="0.5s"
                                 swiper-animate-delay="0.3s"><img src="images/banTextCn1.png" class="img-responsive">
                            </div>
                            <div class="ban1Line ani" swiper-animate-effect="lightSpeedIn" swiper-animate-duration="1s"
                                 swiper-animate-delay="0.6s"></div>
                            <div class="banTextEn ani" swiper-animate-effect="fadeInUp" swiper-animate-duration="0.5s"
                                 swiper-animate-delay="0.8s"><img src="images/banTextEn1.png" class="img-responsive">
                            </div>
                            <div class="banBorder1">
                                <span class="ban1Line1"><i class="ani" swiper-animate-effect="H100"
                                                           swiper-animate-duration="0.3s"
                                                           swiper-animate-delay="1.3s"></i></span>
                                <span class="ban1Line2"><i class="ani" swiper-animate-effect="W100"
                                                           swiper-animate-duration="0.4s"
                                                           swiper-animate-delay="1.6s"></i></span>
                                <span class="ban1Line3"><i class="ani" swiper-animate-effect="H100"
                                                           swiper-animate-duration="0.5s" swiper-animate-delay="2s"></i></span>
                                <span class="ban1Line4"><i class="ani" swiper-animate-effect="W100"
                                                           swiper-animate-duration="0.4s"
                                                           swiper-animate-delay="2.5s"></i></span>
                                <span class="ban1Line5"><i class="ani" swiper-animate-effect="H100"
                                                           swiper-animate-duration="0.3s"
                                                           swiper-animate-delay="2.9s"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--分页器-->
                <span class="swiper-pagination"></span>
            </div>
            <a href="#page2" class="welcome">
                <span class="welcomeDot"></span>
                <strong>WELCOME</strong>
                <span class="welcomeLine"></span>
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!--第二页-->
    <div class="section mbox2Bg">
        <div class="mbox mbox2">
            <div class="box2ImgBg">
                <div class="imgBg"><img src="images/box2Bg.jpg"></div>
            </div>
            <div class="mbox2Text">
                <h3 class="mbox2TitEn">Who are We</h3>
                <h3 class="mbox2TitCn">我们是谁</h3>
                <div class="mbox2Brief">
                    <p>红杉科技社，于2004年成立，至今已有13年历史。</p>
                    <p>我们一直奉行专心、专业、专注的精神</p>
                    <p>是学院最具发展潜力的计算机类学术性社团</p>
                    <p>是西安翻译学院唯一一家与计算机科学技术相关的学术性社团</p>
                </div>
                <ul class="mbox2Num list-unstyled list-inline">
                    <li class="text-center">
                        <span class="mbox2NumSp counter">1950</span>
                        <p>个工作日</p>
                    </li>
                    <li class="text-center">
                        <span class="mbox2NumSp counter">343</span>
                        <p>电脑维修</p>
                    </li>
                    <li class="text-center">
                        <span class="mbox2NumSp counter">450</span>
                        <p>个行业案例</p>
                    </li>
                    <li class="text-center">
                        <span class="mbox2NumSp counter">620</span>
                        <p>DNS防护</p>
                    </li>
                </ul>
                <ul class="mbox2Bot list-unstyled list-inline">
                    <li>
                        <a href="javascript:;">
                            <div class="mbox2Img"><img src="images/mbox2Img1.png" class="img-responsive"></div>
                            <h3 class="mbox2BotH3">出色的UI设计</h3>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <div class="mbox2Img"><img src="images/mbox2Img2.png" class="img-responsive"></div>
                            <h3 class="mbox2BotH3">极致的用户体验</h3>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <div class="mbox2Img"><img src="images/mbox2Img3.png" class="img-responsive"></div>
                            <h3 class="mbox2BotH3">超高效率</h3>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <div class="mbox2Img"><img src="images/mbox2Img4.png" class="img-responsive"></div>
                            <h3 class="mbox2BotH3">全校的服务</h3>
                        </a>
                    </li>
                </ul>
                <div class="mbox2More text-center">
                    <a href="#page3" class="welcome">
                        <span class="welcomeDot"></span>
                        <strong>WELCOME</strong>
                        <span class="welcomeLine"></span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--第三页-->
    <div class="section mbox3Bg">
        <div class="mbox mbox3">
            <div class="mbox3Lef">
                <div class="mbox3Tit">
                    <h3 class="mbox2TitEn">Our Professional Direction</h3>
                    <h3 class="mbox2TitCn">我们的专业方向</h3>
                    <div class="mbox3Brief">
                        <p></p>
                    </div>
                </div>
                <div class="mbox3LefCon">
                    <ul class="mbox3LefItem list-unstyled">


                        <li class="active">
                            <a href="javascript:void(0)" title="WEB开发">
                                <div class="mbox3Ico"><img src="images/mbox3Ico1.png" class="img-responsive"></div>
                                <i class="mbox3Line"></i>
                                <div class="mbox3Name">
                                    <h3 class="mbox3H3">WEB开发</h3>
                                    <p class="text-uppercase">WEB Development</p>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)" title="UI设计">
                                <div class="mbox3Ico"><img src="images/mbox3Ico2.png" class="img-responsive"></div>
                                <i class="mbox3Line"></i>
                                <div class="mbox3Name">
                                    <h3 class="mbox3H3">UI设计</h3>
                                    <p class="text-uppercase">UI Design</p>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)" title="Android开发">
                                <div class="mbox3Ico"><img src="images/mbox3Ico3.png" class="img-responsive"></div>
                                <i class="mbox3Line"></i>
                                <div class="mbox3Name">
                                    <h3 class="mbox3H3">Android开发</h3>
                                    <p class="text-uppercase">Android Development</p>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)" title="小程序开发">
                                <div class="mbox3Ico"><img src="images/mbox3Ico4.png" class="img-responsive"></div>
                                <i class="mbox3Line"></i>
                                <div class="mbox3Name">
                                    <h3 class="mbox3H3">小程序开发</h3>
                                    <p class="text-uppercase">Small Program Development</p>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)" title="视频后期">
                                <div class="mbox3Ico"><img src="images/mbox3Ico5.png" class="img-responsive"></div>
                                <i class="mbox3Line"></i>
                                <div class="mbox3Name">
                                    <h3 class="mbox3H3">视频后期</h3>
                                    <p class="text-uppercase">Late Video Stage</p>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)" title="产品运营">
                                <div class="mbox3Ico"><img src="images/mbox3Ico6.png" class="img-responsive"></div>
                                <i class="mbox3Line"></i>
                                <div class="mbox3Name">
                                    <h3 class="mbox3H3">产品运营</h3>
                                    <p class="text-uppercase">Product operation</p>
                                </div>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
            <div class="mbox3Rig">
                <div class="box3RigImg">


                    <div class="box3RigImgItem  active "><img src="images/mbox3Img.jpg" class="img-responsive">
                        <div class="clear"></div>
                    </div>

                    <div class="box3RigImgItem "><img src="images/20171220100318554.jpg" class="img-responsive">
                        <div class="clear"></div>
                    </div>

                    <div class="box3RigImgItem "><img src="images/20171220100350474.jpg" class="img-responsive">
                        <div class="clear"></div>
                    </div>

                    <div class="box3RigImgItem "><img src="images/mbox3Img2.jpg" class="img-responsive">
                        <div class="clear"></div>
                    </div>

                    <div class="box3RigImgItem "><img src="images/20171220100350474.jpg" class="img-responsive">
                        <div class="clear"></div>
                    </div>

                    <div class="box3RigImgItem "><img src="images/20171220100318554.jpg" class="img-responsive">
                        <div class="clear"></div>
                    </div>


                    <div class="clear"></div>
                </div>
                <div class="box3RigText">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <h4 class="mbox3H4"><img src="images/mbox3IcoRed1.png" class="visible-sm">WEB开发</h4>
                                <div class="mbox3Con">
                                    <p>专注高端网站建设，营销型网站建设，响应式网站建设，高端品牌网站设计，用心完成每一个作品。</p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <h4 class="mbox3H4"><img src="images/mbox3IcoRed2.png" class="visible-sm">UI设计</h4>
                                <div class="mbox3Con">
                                    <p>我喜欢你
                                        正如你想要的五彩斑斓的黑色
                                        我给不了一样</p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <h4 class="mbox3H4"><img src="images/mbox3IcoRed3.png" class="visible-sm">Android开发</h4>
                                <div class="mbox3Con">
                                    <p>朋友今天遇到的真事：客户说我们设备卡，死活找不到原因，工程师赶到现场，给客户换了个鼠标垫，故障排除……</p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <h4 class="mbox3H4"><img src="images/mbox3IcoRed4.png" class="visible-sm">小程序开发</h4>
                                <div class="mbox3Con">
                                    <p>小程序发布后，

                                        公司一妹子果断选择了前端攻城师作为自己的约会对象，

                                        ios和安卓追求者已被辞退哭晕在厕所了。</p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <h4 class="mbox3H4"><img src="images/mbox3IcoRed5.png" class="visible-sm">视频后期</h4>
                                <div class="mbox3Con">
                                    <p>你的身后有一个小宇宙 每一次的碰撞都会有不一样的效果</p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <h4 class="mbox3H4"><img src="images/mbox3IcoRed6.png" class="visible-sm">产品运营</h4>
                                <div class="mbox3Con">
                                    <p>运营如戏，全靠运气</p>
                                </div>
                            </div>


                        </div>
                        <div class="mbox3Btn">
                            <span class="mbox3Prev"><i class="fa fa-angle-left"></i></span>
                            <span class="mbox3Pause"><img src="images/pause.png"></span>
                            <span class="mbox3Next"><i class="fa fa-angle-right"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <!--第四页-->
    <div class="section mbox4Bg">
        <div class="mbox4LefBtn visible-sm visible-xs"><i class="fa fa-th-large"></i></div>
        <div class="mbox4Lef">
            <div class="mbox4LefCon">
                <div class="mbox4Tit">
                    <h3 class="mbox2TitEn">our works</h3>
                    <h3 class="mbox2TitCn">我们的作品</h3>
                    <div class="mbox3Brief">
                        <p>最新作品，只为同样令人惊喜的客户</p>
                    </div>
                </div>
                <ul class="mbox4LefItem list-unstyled">


                    <li><a href="Work.html#">集团公司<i class="mbox4LefLine"></i><i class="fa fa-angle-right"></i></a></li>

                    <li><a href="Work.html#">科技金融<i class="mbox4LefLine"></i><i class="fa fa-angle-right"></i></a></li>

                    <li><a href="Work.html#">传媒咨询<i class="mbox4LefLine"></i><i class="fa fa-angle-right"></i></a></li>

                    <li><a href="Work.html#">教育培训<i class="mbox4LefLine"></i><i class="fa fa-angle-right"></i></a></li>

                    <li><a href="Work.html#">其他行业<i class="mbox4LefLine"></i><i class="fa fa-angle-right"></i></a></li>


                </ul>
                <a class="mbox4More" href="Work.html#">查看全部案例
                    <div class="mbox4MoreIco"></div>
                </a>
            </div>
        </div>
        <div class="mbox mbox4">
            <div class="mbox4List">
                <div class="swiper-container">
                    <div class="swiper-wrapper">


                        <div class="swiper-slide">
                            <a class="mbox4Link" href="Work_info.html#qitaxingye_64.html" title="去来今（上海）茶叶有限公司">
                                <div class="mbox4Img imgBg">
                                    <img src="images/20181029095546268.jpg" title="去来今（上海）茶叶有限公司"
                                         class="img-responsive">
                                </div>
                                <div class="mbox4Ico"></div>
                                <div class="mbox4Text">
                                    <h3 class="ellipsis">去来今（上海）茶叶有限公司</h3>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox4Link" href="Work_info.html#qitaxingye_63.html" title="上海天一众合城市规划设计院有限公司">
                                <div class="mbox4Img imgBg">
                                    <img src="images/20181029094807188.jpg" title="上海天一众合城市规划设计院有限公司"
                                         class="img-responsive">
                                </div>
                                <div class="mbox4Ico"></div>
                                <div class="mbox4Text">
                                    <h3 class="ellipsis">上海天一众合城市规划设计院有限公司</h3>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox4Link" href="Work_info.html#qitaxingye_61.html" title="上海正方形口腔门诊部有限公司">
                                <div class="mbox4Img imgBg">
                                    <img src="images/20181026095320820.jpg" title="上海正方形口腔门诊部有限公司"
                                         class="img-responsive">
                                </div>
                                <div class="mbox4Ico"></div>
                                <div class="mbox4Text">
                                    <h3 class="ellipsis">上海正方形口腔门诊部有限公司</h3>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox4Link" href="Work_info.html#chuanmeizixun_59.html" title=" 上海睿信致成管理顾问有限公司">
                                <div class="mbox4Img imgBg">
                                    <img src="images/20180906052943866.jpg" title=" 上海睿信致成管理顾问有限公司"
                                         class="img-responsive">
                                </div>
                                <div class="mbox4Ico"></div>
                                <div class="mbox4Text">
                                    <h3 class="ellipsis"> 上海睿信致成管理顾问有限公司</h3>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox4Link" href="Work_info.html#kejijinrong_0816/55.html" title="威泰环球（上海）科技有限公司">
                                <div class="mbox4Img imgBg">
                                    <img src="images/20180816040315439.jpg" title="威泰环球（上海）科技有限公司"
                                         class="img-responsive">
                                </div>
                                <div class="mbox4Ico"></div>
                                <div class="mbox4Text">
                                    <h3 class="ellipsis">威泰环球（上海）科技有限公司</h3>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox4Link" href="Work_info.html#kejijinrong_0618/54.html" title="Arm 中国">
                                <div class="mbox4Img imgBg">
                                    <img src="images/20180618073938955.jpg" title="Arm 中国" class="img-responsive">
                                </div>
                                <div class="mbox4Ico"></div>
                                <div class="mbox4Text">
                                    <h3 class="ellipsis">Arm 中国</h3>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox4Link" href="Work_info.html#kejijinrong_0618/53.html"
                               title="广济惠达投资管理（天津）有限公司">
                                <div class="mbox4Img imgBg">
                                    <img src="images/20180618072815890.jpg" title="广济惠达投资管理（天津）有限公司"
                                         class="img-responsive">
                                </div>
                                <div class="mbox4Ico"></div>
                                <div class="mbox4Text">
                                    <h3 class="ellipsis">广济惠达投资管理（天津）有限公司</h3>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox4Link" href="Work_info.html#qitaxingye_44.html" title="弘高设计">
                                <div class="mbox4Img imgBg">
                                    <img src="images/20180224092256825.jpg" title="弘高设计" class="img-responsive">
                                </div>
                                <div class="mbox4Ico"></div>
                                <div class="mbox4Text">
                                    <h3 class="ellipsis">弘高设计</h3>
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox4Link" href="Work_info.html#chuanmeizixun_40.html" title="上海卓迈影业有限公司">
                                <div class="mbox4Img imgBg">
                                    <img src="images/20180125035639573.png" title="上海卓迈影业有限公司" class="img-responsive">
                                </div>
                                <div class="mbox4Ico"></div>
                                <div class="mbox4Text">
                                    <h3 class="ellipsis">上海卓迈影业有限公司</h3>
                                </div>
                            </a>
                        </div>


                    </div>
                </div>
                <span class="mbox4Btn mbox4Prev"><i class="fa fa-angle-left"></i></span>
                <span class="mbox4Btn mbox4Next"><i class="fa fa-angle-right"></i></span>
            </div>
        </div>
    </div>
    <!--第五页-->
    <div class="section mbox5Bg">
        <div class="mbox mbox5">
            <div class="mbox5Tit">
                <h3 class="mbox2TitEn">Our customers</h3>
                <h3 class="mbox2TitCn">合作社团</h3>
            </div>
            <div class="mbox5List">
                <div class="swiper-container">
                    <div class="swiper-wrapper">


                        <div class="swiper-slide">
                            <a class="mbox5Link" href="javascript:void(0)">
                                <div class="mbox5Img"><img src="images/20180126041423558.png" class="img-responsive">
                                </div>
                                <div class="mbox5Mask"></div>
                                <div class="mbox5Hov"><img src="images/20180126041436160.png" class="img-responsive">
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox5Link" href="javascript:void(0)">
                                <div class="mbox5Img"><img src="images/20180126042340423.png" class="img-responsive">
                                </div>
                                <div class="mbox5Mask"></div>
                                <div class="mbox5Hov"><img src="images/20180126042354881.png" class="img-responsive">
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox5Link" href="javascript:void(0)">
                                <div class="mbox5Img"><img src="images/20171220090528701.png" class="img-responsive">
                                </div>
                                <div class="mbox5Mask"></div>
                                <div class="mbox5Hov"><img src="images/20171220090606130.png" class="img-responsive">
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox5Link" href="javascript:void(0)">
                                <div class="mbox5Img"><img src="images/20180126041045864.png" class="img-responsive">
                                </div>
                                <div class="mbox5Mask"></div>
                                <div class="mbox5Hov"><img src="images/20180126041058556.png" class="img-responsive">
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox5Link" href="javascript:void(0)">
                                <div class="mbox5Img"><img src="images/20180126042233744.png" class="img-responsive">
                                </div>
                                <div class="mbox5Mask"></div>
                                <div class="mbox5Hov"><img src="images/20180126042251497.png" class="img-responsive">
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox5Link" href="javascript:void(0)">
                                <div class="mbox5Img"><img src="images/20180126042012388.png" class="img-responsive">
                                </div>
                                <div class="mbox5Mask"></div>
                                <div class="mbox5Hov"><img src="images/20180126042027151.png" class="img-responsive">
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox5Link" href="javascript:void(0)">
                                <div class="mbox5Img"><img src="images/20180126041459631.png" class="img-responsive">
                                </div>
                                <div class="mbox5Mask"></div>
                                <div class="mbox5Hov"><img src="images/20180126041514821.png" class="img-responsive">
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox5Link" href="javascript:void(0)">
                                <div class="mbox5Img"><img src="images/20180126042817598.png" class="img-responsive">
                                </div>
                                <div class="mbox5Mask"></div>
                                <div class="mbox5Hov"><img src="images/20180126042852308.png" class="img-responsive">
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox5Link" href="javascript:void(0)">
                                <div class="mbox5Img"><img src="images/20180126042709352.png" class="img-responsive">
                                </div>
                                <div class="mbox5Mask"></div>
                                <div class="mbox5Hov"><img src="images/20180126042722855.png" class="img-responsive">
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox5Link" href="javascript:void(0)">
                                <div class="mbox5Img"><img src="images/20180904044917498.png" class="img-responsive">
                                </div>
                                <div class="mbox5Mask"></div>
                                <div class="mbox5Hov"><img src="images/20180904044930224.png" class="img-responsive">
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox5Link" href="javascript:void(0)">
                                <div class="mbox5Img"><img src="images/20180126042449890.png" class="img-responsive">
                                </div>
                                <div class="mbox5Mask"></div>
                                <div class="mbox5Hov"><img src="images/20180126042506389.png" class="img-responsive">
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox5Link" href="javascript:void(0)">
                                <div class="mbox5Img"><img src="images/mbox5Img2.png" class="img-responsive"></div>
                                <div class="mbox5Mask"></div>
                                <div class="mbox5Hov"><img src="images/mbox5Img2a.png" class="img-responsive"></div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox5Link" href="javascript:void(0)">
                                <div class="mbox5Img"><img src="images/20171220091753802.png" class="img-responsive">
                                </div>
                                <div class="mbox5Mask"></div>
                                <div class="mbox5Hov"><img src="images/20171220091817938.png" class="img-responsive">
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox5Link" href="javascript:void(0)">
                                <div class="mbox5Img"><img src="images/20180126042558587.png" class="img-responsive">
                                </div>
                                <div class="mbox5Mask"></div>
                                <div class="mbox5Hov"><img src="images/20180126042648255.png" class="img-responsive">
                                </div>
                            </a>
                        </div>

                        <div class="swiper-slide">
                            <a class="mbox5Link" href="javascript:void(0)">
                                <div class="mbox5Img"><img src="images/20180126041849105.png" class="img-responsive">
                                </div>
                                <div class="mbox5Mask"></div>
                                <div class="mbox5Hov"><img src="images/20180126041904202.png" class="img-responsive">
                                </div>
                            </a>
                        </div>


                    </div>
                </div>
                <div class="mbox5Bot">
                    <span class="mbox5Btn mbox5Prev"><i class="fa fa-angle-left"></i><strong
                                class="text-uppercase">prev</strong><i class="mbox5Line"></i></span>
                    <span class="mbox5Btn mbox5Next"><i class="mbox5Line"></i><strong
                                class="text-uppercase">next</strong><i class="fa fa-angle-right"></i></span>
                    <span class="swiper-pagination"></span>
                </div>
            </div>
        </div>
    </div>
    <!--第六页-->
    <div class="section mbox6Bg">
        <!--团队成员-->
        <div class="num" id="num_3">
            <div class="team width_1000">
                <div class="title team-title">
                    <img src="picture/team.png" alt=""/>
                </div>
            </div>
            <div class="teachshow">
                <div id="teach" class="mr_frbox">
                    <img class="mr_frBtnL prev" src="picture/prev.png">
                    <div class="mr_frUl">
                        <ul>
                            <li>
                                <a href="#">
                                    <img src="picture/ytl.png"/>
                                    <img src="picture/ytl.png"/>
                                </a>
                                <div>
                                    <h4>社长-姚天乐</h4>
                                    <p>假艺术家<br/>一个贩卖智慧的商人</p>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="picture/jxl.png"/>
                                    <img src="picture/jxl.png"/>
                                </a>
                                <div>
                                    <h4>副社-荆晓琳</h4>
                                    <p>假艺术家<br/>一个贩卖智慧的商人</p>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="picture/zf.png"/>
                                    <img src="picture/zf.png"/>
                                </a>
                                <div>
                                    <h4>副社-赵枫</h4>
                                    <p>假艺术家<br/>一个贩卖智慧的商人</p>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="picture/whc.png"/>
                                    <img src="picture/whc.png"/>
                                </a>
                                <div>
                                    <h4>技术部-魏虎成</h4>
                                    <p>假艺术家<br/>一个贩卖智慧的商人</p>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="picture/yrm.png"/>
                                    <img src="picture/yrm.png"/>
                                </a>
                                <div>
                                    <h4>技术部-杨瑞敏</h4>
                                    <p>假艺术家<br/>一个贩卖智慧的商人</p>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="picture/zy.png"/>
                                    <img src="picture/zy.png"/>
                                </a>
                                <div>
                                    <h4>技术部-钟粤</h4>
                                    <p>假艺术家<br/>一个贩卖智慧的商人</p>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="picture/lb.png"/>
                                    <img src="picture/lb.png"/>
                                </a>
                                <div>
                                    <h4>技术部-牛博</h4>
                                    <p>假艺术家<br/>一个贩卖智慧的商人</p>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="picture/yzy.png"/>
                                    <img src="picture/yzy.png"/>
                                </a>
                                <div>
                                    <h4>设计部-杨召玉</h4>
                                    <p>假艺术家<br/>一个贩卖智慧的商人</p>
                                </div>
                            </li>

                            <li>
                                <a href="#">
                                    <img src="picture/mzm.png"/>
                                    <img src="picture/mzm.png"/>
                                </a>
                                <div>
                                    <h4>设计部-马梓蒙</h4>
                                    <p>假艺术家<br/>一个贩卖智慧的商人</p>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="picture/wc.png"/>
                                    <img src="picture/wc.png"/>
                                </a>
                                <div>
                                    <h4>秘书部-王聪</h4>
                                    <p>假艺术家<br/>一个贩卖智慧的商人</p>
                                </div>
                            </li>

                            <li>
                                <a href="#">
                                    <img src="picture/zjy.png"/>
                                    <img src="picture/zjy.png"/>
                                </a>
                                <div>
                                    <h4>秘书部-张瑾峣</h4>
                                    <p>假艺术家<br/>一个贩卖智慧的商人</p>
                                </div>
                            </li>

                            <li>
                                <a href="#">
                                    <img src="picture/zyy.png"/>
                                    <img src="picture/zyy.png"/>
                                </a>
                                <div>
                                    <h4>宣策部-张圆圆</h4>
                                    <p>假艺术家<br/>一个贩卖智慧的商人</p>
                                </div>
                            </li>

                            <li>
                                <a href="#">
                                    <img src="picture/fqj.png"/>
                                    <img src="picture/fqj.png"/>
                                </a>
                                <div>
                                    <h4>宣策部-冯泉静</h4>
                                    <p>假艺术家<br/>一个贩卖智慧的商人</p>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <img class="mr_frBtnR next" src="picture/next.png">
                </div>
            </div>
        </div>

        <script language="javascript">
            jQuery(".mr_frbox").slide({
                titCell: "",
                mainCell: ".mr_frUl ul",
                autoPage: true,
                effect: "leftLoop",
                // autoPlay: true,
                vis: 4
            });
        </script>

    </div>
    <!--第七页-->
    <div class="section mbox7Bg">
        <div class="mbox mbox7">
            <div class="mbox5Tit">
                <h3 class="mbox2TitEn">Sequoia information</h3>
                <h3 class="mbox2TitCn">红杉资讯</h3>
            </div>
            <ul class="mbox7List list-unstyled">


                <li>
                    <a href="News_info.html#155.html" title="网建科技签约上海樱知叶文化交流有限公司">
                        <div class="mbox7Img imgBg"><img src="images/20180918025534734.jpg" class="img-responsive">
                        </div>
                        <div class="mbox7Text">
                            <h3 class="mbox7Name">网建科技签约上海樱知叶文化交流有限公司</h3>
                            <div class="mbox7Time"><i class="fa fa-clock-o"></i>09/07/2018</div>
                            <div class="mbox7Brief">
                                <p>上海樱知叶文化交流有限公司Beijing Kentrexs Enterprise Ltd上海樱知叶文化交...</p>
                            </div>
                        </div>
                        <div class="mbox7Ico"></div>
                    </a>
                </li>


                <li>
                    <a href="News_info.html#333.html" title="网建科技签约上海盈奥营养食品有限公司">
                        <div class="mbox7Img imgBg"><img src="images/20181219112830934.png" class="img-responsive">
                        </div>
                        <div class="mbox7Text">
                            <h3 class="mbox7Name">网建科技签约上海盈奥营养食品有限公司</h3>
                            <div class="mbox7Time"><i class="fa fa-clock-o"></i>12/19/2018</div>
                            <div class="mbox7Brief">
                                <p>上海盈奥营养食品有限公司Beijing Ying&amp; 39;ao Nutritional Food Co , Ltd...</p>
                            </div>
                        </div>
                        <div class="mbox7Ico"></div>
                    </a>
                </li>


                <li>
                    <a href="News_info.html#1229/353.html" title="网建科技签约CCG全球化智库">
                        <div class="mbox7Img imgBg"><img src="images/20190103054330982.jpg" class="img-responsive">
                        </div>
                        <div class="mbox7Text">
                            <h3 class="mbox7Name">网建科技签约CCG全球化智库</h3>
                            <div class="mbox7Time"><i class="fa fa-clock-o"></i>12/29/2018</div>
                            <div class="mbox7Brief">
                                <p>全球化智库CCG本次网建科技为全球化智库（CCG）提供网站设计、网站制作等一条龙服...</p>
                            </div>
                        </div>
                        <div class="mbox7Ico"></div>
                    </a>
                </li>


                <li>
                    <a href="News_info.html#367.html" title="网建科技再次签约清华同方">
                        <div class="mbox7Img imgBg"><img src="images/20190114020808710.jpg" class="img-responsive">
                        </div>
                        <div class="mbox7Text">
                            <h3 class="mbox7Name">网建科技再次签约清华同方</h3>
                            <div class="mbox7Time"><i class="fa fa-clock-o"></i>01/14/2019</div>
                            <div class="mbox7Brief">
                                <p>本次网建科技为同方节能装备有限公司打造品牌官网助力全新互联网形象升级，本次服...</p>
                            </div>
                        </div>
                        <div class="mbox7Ico"></div>
                    </a>
                </li>


            </ul>
            <a class="mbox4More mbox7More" href="News.html#" target="_blank">进一步，了解资讯
                <div class="mbox4MoreIco"></div>
            </a>
        </div>
    </div>
    <!--第八页-->
    <div class="section mbox8Bg">
        <div class="mbox mbox8">
            <div class="mbox8Wrap">


                <!--                <div class="alert alert-warning">-->
                <!--                    <p>请输入手机号</p>-->
                <!--                </div>-->

                <div class="mbox8Left">
                    <h2 class="mbox8LefEn">CONTACT US</h2>
                    <h3 class="mbox8LefCn">我们期待 您的来信</h3>
                    <form method="post" action="#" name="myform" id="myform">
                        <ul class="mbox8Mes list-unstyled">
                            <li><input type="text" name="name" id="name" placeholder="您的姓名"
                                       style="outline: none"
                                       autocomplete="off"></li>
                            <li><input type="text" name="phone" id="phone" placeholder="您的电话"
                                       style="outline: none"
                                       autocomplete="off"></li>
                            <li><textarea name="message" id="message" placeholder="留言给我们" style="outline: none"
                                          autocomplete="off"></textarea></li>
                            <li><input type="button" class="mbox8MesBtn" value="提交给我们" name="dosubmit" id="dosubmit"
                                       style="outline: none" autocomplete="off">
                            </li>
                        </ul>
                    </form>
                </div>
                <div class="mbox8Right">
                    <h2 class="mbox8RigEn">How to find us?</h2>
                    <h3 class="mbox8RigCn">我们为您准备好了您喜欢的咖啡和舒适的环境赶紧通过以下方式找到我们</h3>
                    <p class="mbox8RigTip">若您有合作意向，请您使用以下方式联系我们，您给我们多大的信任，我们给您多大的惊喜！</p>
                    <ul class="mbox8RigCon list-unstyled list-inline">
                        <li>
                            <div class="mbox8RigIco"><img src="images/mbox8RigIco1.png" class="img-responsive"></div>
                            <p>西安市长安区西安翻译学院创新创业学院 204</p>
                        </li>
                        <li>
                            <div class="mbox8RigIco"><img src="images/mbox8RigIco2.png" class="img-responsive"></div>
                            <p>182770027307</p>

                        </li>
                        <li>
                            <div class="mbox8RigIco"><img src="images/mbox8RigIco3.png" class="img-responsive"></div>
                            <p>EMAIL:</p>
                            <p>1259493451@qq.com</p>
                        </li>
                    </ul>
                    <ul class="mbox8RigBot list-unstyled list-inline">
                        <li>
                            <a href="http://wpa.qq.com/msgrd?v=3&uin=1259493451&site=qq&menu=yes" target="_blank"
                               rel="nofollow"><i
                                        class="fa fa-qq"></i></a>
                        </li>
                        <li>
                            <a href="http://wpa.qq.com/msgrd?v=3&uin=1259493451&site=qq&menu=yes" target="_blank"
                               rel="nofollow"><i
                                        class="fa fa-weixin"></i></a>
                            <div class="mbox8Wx"><img src="images/wechat.jpg" class="img-responsive"></div>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <!--最后页-->
    <?php include 'admin/inc/footer.php'; ?>
</div><!--homepage-->
<!--菜单-->
<ul id="navPage" class="list-unstyled">
    <li class="active" data-menuanchor="page1"><a href="#page1"><i>H</i><span>首页</span></a></li>
    <li data-menuanchor="page2"><a href="#page2"><i>A</i><span>关于</span></a></li>
    <li data-menuanchor="page3"><a href="#page3"><i>S</i><span>服务</span></a></li>
    <li data-menuanchor="page4"><a href="#page4"><i>W</i><span>作品</span></a></li>
    <li data-menuanchor="page5"><a href="#page5"><i>C</i><span>客户</span></a></li>
    <li data-menuanchor="page6"><a href="#page6"><i>T</i><span>团队成员</span></a></li>
    <li data-menuanchor="page7"><a href="#page7"><i>N</i><span>资讯</span></a></li>
    <li data-menuanchor="page8"><a href="#page8"><i>C</i><span>联系我们</span></a></li>
</ul><!--navPage-->


<!--<script type="text/javascript" src="js/search_common.js"></script>-->

<!--引用视觉差互动特效插件-->
<script src="js/jquery.parallaxmouse.min.js"></script>
<!--全屏滚动插件的初始化，配置-->
<script>
    $(function () {
        // var $mlNav = $('.navbox');
        /*fullpage 插件  初始化*/
        $('#hmpage').fullpage({
            verticalCentered: true,/*内容是否垂直居中*/
            resize: false,/*字体时是否随着窗口缩放而缩放*/
            /*定义锚链接*/
            anchors: ['page1', 'page2', 'page3', 'page4', 'page5', 'page6', 'page7', 'page8', 'foot'],
            /*绑定菜单，设定的相关属性与 anchors 的值对应后，菜单可以控制滚动*/
            menu: '#navPage',
            /*内容超过满屏后是否显示滚动条*/
            scrollOverflow: false,
            /*监听进入某一页的时候  回调*/
            afterLoad: function (anchorLink, index) {
                // $("#fp-nav ul li").eq(index - 1).addClass("active");
                if (index != 1) {
                    $('header').addClass("active");
                }
                if (index == 2) {
                    //数字动画插件做初始化，并设置持续1s时间
                    $('.counter').countUp({time: 1000});
                }
                if (index == 8) {
                    $('.mbox8Bg').addClass("cut");
                }
                if (index == 9) {
                    $("#navPage").addClass("noactive");
                }
            },
            /*离开某一页的时候触发*/
            onLeave: function (index, nextIndex, direction) {
                if (index != 1) {
                    $('header').removeClass("active");
                }
                if (index == 8 && direction == 'up') {
                    $('.mbox8Bg').removeClass("cut");
                }
                if (index == 9) {
                    $("#navPage").removeClass("noactive");
                }
            }
        });
        //对主要内容进行一个延时加载
        setTimeout(function () {
            $("#hmpage").css("opacity", 1);
        }, 10);
    });
</script>
<!--初始化视觉差互动特效插件-->
<script>
    $(window).parallaxmouse({
        //invert: true,//设置为true则按反方向运动层
        //range: 400,
        elms: [
            {el: $('.ban3Ico1'), rate: 0.1},
            {el: $('.ban3Ico2'), rate: 0.3},
            {el: $('.ban3Ico3'), rate: 0.5},
        ]
    });
</script>

<!--提交留言模块-->
<script>
    $(function ($) {
        /*当用户提交留言时，做一个正则表达式的判断*/
        var nameFormat = /^[\u4e00-\u9fa5]{2,6}$/;
        var phoneFormat = /^\d{11}$/;

        $("#dosubmit").on('click', function () {
            /*获取name  phone的val值*/
            var nameV = $('#name').val();
            var phoneV = $('#phone').val();
            var messageV = $('#message').val();
            if (!nameV || !nameFormat.test(nameV)) {
                alert('请输入中文 2-6个');
                return;
            }
            if (!phoneV || !phoneFormat.test(phoneV)) {
                alert('请输入正确的手机号码格式');
                return;
            }

            $.ajax({
                type: 'post',
                url: '../admin/api/message.php',
                data: {
                    name: nameV,
                    phone: phoneV,
                    message: messageV,
                },
                dataType: 'json',
                success: function (data) {
                    if (data == 1) {
                        alert('您的留言已提交，我们将于一个工作日内处理，感谢您对红杉科技社的支持');
                        $('#name').val('');
                        $('#phone').val('');
                        $('#message').val('');
                    }
                }
            })
        })
    })
</script>

</body>
</html>
