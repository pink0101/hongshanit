<?php
//载入访问当前目录的用户有没有密码验证过
require_once '../functions.php';

xiu_get_current_user();

function add_article()
{
    //验证非空
    //验证非空
    if (empty($_POST['title'])) {
        $GLOBALS['error_message'] = '请输入标题';
        return;
    }
    //isset()函数 一般用来检测变量是否设置   empty()函数 判断值为否为空
    if (empty($_POST['content'])) {
        $GLOBALS['error_message'] = '请输入文章内容';
        return;
    }
    if (empty($_POST['slug'])) {
        $GLOBALS['error_message'] = '请输入别名';
        return;
    }
    if (empty($_POST['category'])) {
        $GLOBALS['error_message'] = '请输入所属分类';
        return;
    }

    if (empty($_POST['status'])) {
        $GLOBALS['error_message'] = '请选择状态';
        return;
    }


    //临时设置为中国时区
    date_default_timezone_set('PRC');

    //取值
    $title = $_POST['title'];
    $content = $_POST['content'];
    $slug = $_POST['slug'];
    $category = $_POST['category'];
    $created = date('Y-m-d h:i:s', time());
    $status = $_POST['status'];


    //接收文件并验证
    if (empty($_FILES['feature'])) {
        $GLOBALS['error_message'] = '请选择特色图像';
        return;
    }

    //pathinfo()函数以数组的形式返回关文件路径的信息   第一个参数  文件的name   第二个参数  PATHINFO_EXTENSION  文件的后缀名
    $ext = pathinfo($_FILES['feature']['name'], PATHINFO_EXTENSION);
    $target = '../static/uploads/' . uniqid() . '.' . $ext;


    if (!move_uploaded_file($_FILES['feature']['tmp_name'], $target)) {
        $GLOBALS['error_message'] = '图片上传失败';
        return;
    }

    $feature=$target;

    //1.建立连接
    $conn = mysqli_connect(XIU_DB_HOST, XIU_DB_USER, XIU_DB_PASSWORD, XIU_DB_NAME);

    if (!$conn) {
        $GLOBALS['error_message'] = '连接数据库失败';
        return;
    }

    //2.开始查询
    $query = mysqli_query($conn,"insert into posts values (null,'{$slug}','{$title}','{$feature}','{$created}','{$content}','1','1','{$status}','1','{$category}');");
    if (!$query) {
        $GLOBALS['error_message'] = '执行查询过程失败';
        return;
    }

    //mysqli_affected_rows 返回上一次数据库操作影响的行数
    $affected_rows=mysqli_affected_rows($conn);

    if ($affected_rows!==1){
        $GLOBALS['error_message'] = '新增数据失败';
        return;
    }else{
       $GLOBALS['good']='发布成功';
    }

}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    add_article();
}; ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>Add new post &laquo; Admin</title>
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
            <h1>写文章</h1>
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
        <form class="row" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="title">标题</label>
                    <input id="title" class="form-control input-lg" name="title" type="text" placeholder="文章标题">
                </div>
                <div class="form-group">
                    <label for="content">标题</label>
                    <textarea id="content" class="form-control input-lg" name="content" cols="30" rows="10"
                              placeholder="内容"></textarea>
                    <!--<script id="content" type="text/plain" name="content">
                        这是初始值
                    </script>-->
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="slug">别名</label>
                    <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
                    <p class="help-block">https://zce.me/post/<strong>slug</strong></p>
                </div>
                <div class="form-group">
                    <label for="feature">特色图像</label>
                    <!-- show when image chose -->
<!--                    <img class="help-block thumbnail" style="display: none">-->
                    <input id="feature" class="form-control" name="feature" type="file">
                </div>
                <div class="form-group">
                    <label for="category">所属分类</label>
                    <select id="category" class="form-control" name="category">
                        <option value="1">未分类</option>
                        <option value="2">潮生活</option>
                    </select>
                </div>
<!--                <div class="form-group">-->
<!--                    <label for="created">发布时间</label>-->
<!--                    <input id="created" class="form-control" name="created" type="datetime-local">-->
<!--                </div>-->
                <div class="form-group">
                    <label for="status">状态</label>
                    <select id="status" class="form-control" name="status">
                        <option value="drafted">草稿</option>
                        <option value="published">已发布</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">保存</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $current_page = 'post-add' ?>

<?php include 'inc/sidebar.php'; ?>


<script src="../static/assets/vendors/jquery/jquery.js"></script>
<script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>

<script>NProgress.done()</script>
</body>
</html>
