<?php
//载入访问当前目录的用户有没有密码验证过
require_once '../functions.php';

xiu_get_current_user();

//查询数据模块
//1.建立连接
$conn = mysqli_connect(XIU_DB_HOST, XIU_DB_USER, XIU_DB_PASSWORD, XIU_DB_NAME);
if (!$conn) {
    exit('<h1>连接数据库失败</h1>');
}
//2.开始查询
$query = mysqli_query($conn, 'select * from comments');
if (!$query) {
    exit('<h1>查询数据失败</h1>');
}


//新增数据模块
function add_comments()
{
    //验证非空
    if (empty($_POST['userName'])) {
        $GLOBALS['error_message'] = '请输入评论内容';
        return;
    }
    //isset()函数 一般用来检测变量是否设置   empty()函数 判断值为否为空
    if (empty($_POST['tt'])) {
        $GLOBALS['error_message'] = '请输入呢称';
        return;
    }

    //临时设置为中国时区
    date_default_timezone_set('PRC');

    $userName = $_POST['userName'];
    $tt = $_POST['tt'];
    //通过date函数格式化时间戳
    $data = date('Y-m-d h:i:s', time());

    //1.建立连接
    $conn = mysqli_connect(XIU_DB_HOST, XIU_DB_USER, XIU_DB_PASSWORD, XIU_DB_NAME);

    if (!$conn) {
        $GLOBALS['error_message'] = '连接数据库失败';
        return;
    }


    //2.开始查询
    $query = mysqli_query($conn, "insert into comments values (null,'{$tt}','w@zec.me','{$data}','{$userName}','held','1','3',null);");
    if (!$query) {
        $GLOBALS['error_message'] = '执行查询过程失败';
        return;
    }

    //mysqli_affected_rows 返回上一次数据库操作影响的行数
    $affected_rows = mysqli_affected_rows($conn);

    if ($affected_rows !== 1) {
        $GLOBALS['error_message'] = '新增数据失败';
        return;
    }
    $GLOBALS['good'] = '评论已提交，待管理员审核';

}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    add_comments();
}; ?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>douban &laquo; Admin</title>
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
        <div class="page-title">
            <h1>添加评论</h1>
        </div>
        <!-- 有错误信息时展示 -->
        <?php if (isset($error_message)): ?>
            <div class="alert alert-warning">
                <?php echo $error_message; ?>
            </div>
        <?php endif ?>
        <?php if (isset($good)): ?>
            <div class="alert bg-success">
                <?php echo $good; ?>
            </div>
        <?php endif ?>


    </div>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input class="form-control" type="text" placeholder="评论内容" id="userName" name="userName"><br>
            <div class="col-sm-2"><input class="form-control " type="text" placeholder="呢称" id="tt" name="tt"></div>
            <button class="btn btn-primary ">提交</button>
        </form>
        <br/>


        <?php while ($item = mysqli_fetch_assoc($query)): ?>
            <?php if ($item['status'] == 'helds') : ?>
                <div class="comment-right" style="border-bottom: 1px solid #CCCCCC">
                    <h3><?php echo $item['author']; ?></h3>
                    <div class="comment-content-header"><span><i
                                    class="glyphicon glyphicon-time"></i><?php echo $item['created']; ?></span><span><i
                                    class="glyphicon glyphicon-map-marker"></i>深圳</span></div>
                    <p class="content"><?php echo $item['content']; ?></p>

                    <div class="reply-list">
                        <div class="reply">
                            <?php if (!empty($item['hf'])) : ?>
                                <div><a href="javascript:void(0)" class="replyname">管理员</a>:
                                    <a href="javascript:void(0)">@<?php echo $item['author']; ?></a><span><?php echo $item['hf']; ?></span>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        <?php endwhile; ?>


        <?php $current_page = 'douban' ?>

        <?php include 'inc/sidebar.php'; ?>


        <script src="../static/assets/vendors/jquery/jquery.js"></script>
        <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
        <script>

        </script>
        <script>NProgress.done()</script>
</body>
</html>
