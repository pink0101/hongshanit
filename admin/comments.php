<?php
//载入访问当前目录的用户有没有密码验证过
require_once '../functions.php';
xiu_get_current_user();



function add_pinglun(){
    if(empty($_POST['pingtext'])){
        $GLOBALS['error_message'] = '请输入回复内容';
        return;
    }
    if (empty($_POST['yiid'])) {
        $GLOBALS['error_message'] = '缺少必要参数';
        return;
    }
    $id = $_POST['yiid'];
    $pingtext=$_POST['pingtext'];

    $rows = xiu_execute("update comments set hf='{$pingtext}' where id ={$id}");

    if ($rows<0){
        $GLOBALS['error_message']='修改失败';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    add_pinglun();
}

; ?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>Comments &laquo; Admin</title>
    <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
    <link rel="stylesheet" href="../static/assets/css/admin.css">
    <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
    <!--定制css动画样式-->
    <style>

        .flip-txt-loading {
            font: 26px Monospace;
            letter-spacing: 5px;
            color: #ffffff;
        }

        .flip-txt-loading > span {
            animation: flip-txt 2s infinite;
            display: inline-block;
            transform-origin: 50% 50% -10px;
            transform-style: preserve-3d;
        }

        .flip-txt-loading > span:nth-child(1) {
            -webkit-animation-delay: 0.10s;
            animation-delay: 0.10s;
        }

        .flip-txt-loading > span:nth-child(2) {
            -webkit-animation-delay: 0.20s;
            animation-delay: 0.20s;
        }

        .flip-txt-loading > span:nth-child(3) {
            -webkit-animation-delay: 0.30s;
            animation-delay: 0.30s;
        }

        .flip-txt-loading > span:nth-child(4) {
            -webkit-animation-delay: 0.40s;
            animation-delay: 0.40s;
        }

        .flip-txt-loading > span:nth-child(5) {
            -webkit-animation-delay: 0.50s;
            animation-delay: 0.50s;
        }

        .flip-txt-loading > span:nth-child(6) {
            -webkit-animation-delay: 0.60s;
            animation-delay: 0.60s;
        }

        .flip-txt-loading > span:nth-child(7) {
            -webkit-animation-delay: 0.70s;
            animation-delay: 0.70s;
        }

        @keyframes flip-txt {
            to {
                -webkit-transform: rotateX(1turn);
                transform: rotateX(1turn);
            }
        }

    </style>
    <style>
        #loading {
            display: flex; /*flex  css弹性盒子 适应不同屏幕大小*/
            align-items: center; /*居中 配合弹性盒子*/
            justify-content: center; /*居中*/
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 999;
        }

        .div-hf {
            display: none;
        }
    </style>
</head>
<body>
<!--页面nprogress 进度条的开始-->
<script>NProgress.start()</script>

<div class="main">
    <?php include 'inc/navbar.php'; ?>

    <div class="container-fluid">
        <div class="page-title">
            <h1>所有评论</h1>
        </div>
        <!-- 有错误信息时展示 -->
        <?php if (isset($error_message)): ?>
            <div class="alert alert-warning">
                <?php echo $error_message; ?>
            </div>
        <?php endif ?>
        <div class="page-action">
            <!-- show when multiple checked -->
            <div class="btn-batch" style="display: none">
                <button class="btn btn-info btn-sm">批量批准</button>
                <button class="btn btn-warning btn-sm">批量拒绝</button>
                <button class="btn btn-danger btn-sm">批量删除</button>
            </div>
            <ul class="pagination pagination-sm pull-right">

            </ul>
        </div>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th>呢称</th>
                <th>评论</th>
                <th>评论在</th>
                <th>提交于</th>
                <th>状态</th>
                <th class="text-center" width="150">操作</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>


    <div class="container div-hf">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  autocomplete="off">
            <input class="form-control" type="text" placeholder="回复内容" id="userName" name="pingtext"><br>
            <input type="text" id="hidden-yin" name="yiid" style="display: none;">
            <button class="btn btn-success btn-block ">发送</button><br/>
            <a class="btn btn-warning btn-block btn-quxiao">取消</a>
        </form>
    </div>

    <?php $current_page = 'comments' ?>

    <?php include 'inc/sidebar.php'; ?>


    <div id="loading" style="display: none;">
        <!--定制css动画-->
        <div class="flip-txt-loading">
            <span>L</span><span>o</span><span>a</span><span>d</span><span>i</span><span>n</span><span>g</span>
        </div>
    </div>

    <!--模板引擎-->
    <script id="comments_tmpl" type="text/x-jsrender">
    {{for comments}}
    {{!--<tr> <td>{{:#index}}</td> <td>{{:content}}</td> </tr>--}}
    <tr {{if status =='held'}} class="warning" {{else status =='rejected'}} class="danger" {{/if}} data-id="{{:id}}" >
        <td class="text-center"><input type="checkbox"></td>
        <td>{{:author}}</td>
        <td>{{:content}}</td>
        <td>《《{{:post_title}}》》</td>
        <td>{{:created}}</td>
        {{if status =='held'}}
        <td>{{:'待审核'}}</td>
        {{else}}
        <td>{{:'审核通过'}}</td>
         {{/if}}
        <td class="text-center">
            {{if status =='held'}}
            <a href="javascript:;" class="btn btn-info btn-xs btn-sh">批准</a>
            <a href="javascript:;" class="btn btn-warning btn-xs">拒绝</a>
            {{else}}
            {{if hf==null}}
            <a href="javascript:;" class="btn btn-success btn-xs btn-hf" >回复</a>
            {{/if}}
            {{/if}}
            <a href="javascript:;" class="btn btn-danger btn-xs btn-delete" >删除</a>
        </td>
     </tr>
    {{/for}}
    </script>
    <script src="../static/assets/vendors/jquery/jquery.js"></script>
    <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
    <script src="../static/assets/vendors/jsrender/jsrender.js"></script><!--模板引擎引库-->
    <script src="../static/assets/vendors/twbs-pagination/jquery.twbsPagination.js"></script><!--分页插件库引入-->
    <script>
        // nprogress
        $(document)
            .ajaxStart(function () {
                NProgress.start();
                //显示loading
                // $('#loading').css('display','flex');
                $('#loading').fadeIn();
            })
            .ajaxStop(function () {
                NProgress.done();
                // $('#loading').css('display','none');
                $('#loading').fadeOut();

            });

        var currentPage = 1;

        function loadPageData(page) {
            $.get('../admin/api/comments.php', {page: page}, function (res) {
                if (page > res.total_pages) {
                    loadPageData(res.total_pages);
                    return false;
                }
                $('.pagination').twbsPagination('destroy');
                $('.pagination').twbsPagination({   //twbsPagination库的按钮展示
                    first: '&laquo;',//把默认的first改为向左的双向箭头
                    last: '&raquo;',
                    prev: '上一页',//把默认值改为上一页
                    next: '下一页',
                    startPage: page,//
                    totalPages: res.total_pages,//假定最大页数
                    visiblePages: 5,//展示5个按钮
                    initiateStartPageClick: false,
                    onPageClick: function (e, page) {
                        //第一次初始化时就会触发一次
                        loadPageData(page);
                    }
                });

                //渲染数据
                var html = $('#comments_tmpl').render({comments: res.comments});
                $('tbody').fadeOut(function () {
                    $(this).html(html).fadeIn();
                    currentPage = page;//将页码记下
                    // console.log(res.total_pages);
                })
            });
        }

        //分页功能
        $('.pagination').twbsPagination({//twbsPagination库的按钮展示
            first: '&laquo;',//把默认的first改为向左的双向箭头
            last: '&raquo;',
            prev: '上一页',//把默认值改为上一页
            next: '下一页',
            totalPages: 1000,//假定最大页数
            visiblePages: 5,//展示5个按钮
            onPageClick: function (e, page) {
                //第一次初始化时就会触发一次
                loadPageData(page);
            }
        });


        //AJAX 删除功能=========================================================
        $('tbody').on('click', '.btn-delete', function () {
            //删除单挑数据的时机
            //1.拿到需要删除的数据 ID
            var $tr = $(this).parent().parent();
            var id = $tr.data('id');//这里data 获取的是 data-id 里面的数据
            //2.发送一个AJAX 请求告诉服务端要删除哪一条具体的数据
            $.get('../admin/api/comment-delete.php', {id: id}, function (res) {
                if (!res) return;
                //3.根据服务端返回的删除是否成功决定  是否在界面上移除这个元素
                //4.从新再载入当前这一页的数据
                loadPageData(currentPage);
                // $tr.remove();//移除被选元素
            })
        });

        //AJAX 审核功能=========================================================
        $('tbody').on('click', '.btn-sh', function () {
            //1.拿到需要删除的数据 ID
            var $tr = $(this).parent().parent();
            var id = $tr.data('id');//这里data 获取的是 data-id 里面的数据
            //2.发送一个AJAX 请求告诉服务端要删除哪一条具体的数据
            $.get('../admin/api/comment-sh.php', {id: id}, function (res) {
                if (!res) return;
                //3.根据服务端返回的删除是否成功决定  是否在界面上移除这个元素
                //4.从新再载入当前这一页的数据
                loadPageData(currentPage);
                // $tr.remove();//移除被选元素
            })
        });


        /*回复栏的状态*/
        $('tbody').on('click', '.btn-hf', function () {
            //淡入:fadeIn  淡出：fadeOut   切换： fadeToggle
            $('.div-hf').fadeIn();
            var $tr = $(this).parent().parent();
            var id = $tr.data('id');//这里data 获取的是 data-id 里面的数据
            var num=document.getElementById('hidden-yin');
            num.value=id;
        });
        $('form').on('click', '.btn-quxiao', function () {
            //淡入:fadeIn  淡出：fadeOut   切换： fadeToggle
            $('.div-hf').fadeOut();
        });


    </script>
    <!--页面nprogress 进度条的结束-->
    <script>NProgress.done()</script>
</body>
</html>
