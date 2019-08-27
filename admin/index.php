<?php
//载入访问当前目录的用户有没有密码验证过
require_once '../functions.php';
//然后调用../xiu_get_current_user这个函数通过session检测有没有登录  (一定最先去做)
xiu_get_current_user();//获取界面所需要的数据

//获取界面所需要的数据
//重复的操作封装起来
$posts_count = xiu_fetch_one('select count(1) as num from posts ;')['num'];
$categories_count = xiu_fetch_one('select count(1) as num from categories ;')['num'];
$comments_count = xiu_fetch_one('select count(1) as num from comments ;')['num'];
$posts_count_drafted = xiu_fetch_one("select count(1) as num from posts where status ='drafted';")['num'];
$posts_count_held = xiu_fetch_one("select count(1) as num from comments where status ='held';")['num'];

?>


<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>Dashboard &laquo; Admin</title>
    <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
    <link rel="stylesheet" href="../static/assets/css/admin.css">
    <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
<script>NProgress.start()</script>

<div class="main">
    <?php include 'inc/navbar.php'; ?>
    <div class="container-fluid">
        <div class="jumbotron text-center">
            <h1>One Belt, One Road</h1>
            <p>Thoughts, stories and ideas.</p>
            <p><a class="btn btn-primary btn-lg" href="post-add.html" role="button">写文章</a></p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">站点内容统计：</h3>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><strong><?php echo $posts_count; ?></strong>篇文章（<strong><?php echo $posts_count_drafted ;?></strong>篇草稿）
                        </li>
                        <li class="list-group-item"><strong><?php echo $categories_count; ?></strong>个分类</li>
                        <li class="list-group-item">
                            <strong><?php echo $comments_count; ?></strong>条评论（<strong><?php echo $posts_count_held ;?></strong>条待审核）
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <canvas id="chart"></canvas>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>

<?php $current_page = 'index' ?>
<?php include 'inc/sidebar.php'; ?>

<script src="../static/assets/vendors/jquery/jquery.js"></script>
<script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
<script src="../static/assets/vendors/chart/Chart.js"></script>
<script>
    var ctx = document.getElementById('chart').getContext('2d');
    new Chart(ctx, {
        type: 'pie',
        data: {
            datasets: [
                {
                    data: [<?php echo $posts_count; ?>, <?php echo $categories_count; ?>, <?php echo $comments_count; ?>],
                    backgroundColor: [
                        'hotpink',
                        'pink',
                        'deeppink',
                    ]
                },
                {
                    data: [<?php echo $posts_count; ?>, <?php echo $categories_count; ?>, <?php echo $comments_count; ?>],
                    backgroundColor: [
                        'hotpink',
                        'pink',
                        'deeppink',
                    ]
                }
            ],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
                '文章',
                '分类',
                '评论'
            ]
        }
    })
</script>
<script>NProgress.done()</script>
</body>
</html>
