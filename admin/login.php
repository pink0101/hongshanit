<?php

//载入配置文件
require_once '../config.php';

//给用户找一个箱子（如果你之前有就用之前的，没有就给一个新的）
session_start();

function login()
{
    //1.接收并校验
    //2.持久化
    //3.响应
    if (empty($_POST['email'])) {
        $GLOBALS['message'] = "请填写用户名";
        return;
    }
    if (empty($_POST['password'])) {
        $GLOBALS['message'] = "请填写密码";
        return;
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    //校验  当客户端提交过来的完整的表单信息就应该对其数据校验
    $conn = mysqli_connect(XIU_DB_HOST, XIU_DB_USER, XIU_DB_PASSWORD, XIU_DB_NAME);
    if (!$conn) {
        exit('<h1>连接数据库失败</h1>');
    }
    $query = mysqli_query($conn, "select * from users where email ='{$email}' limit 1");
    if (!$query) {
        $GLOBALS['message'] = "登录失败，请重试！";
        return;
    }

    //获取登录用户
    $user = mysqli_fetch_assoc($query);
    if (!$user) {
        //用户名不存在
        $GLOBALS['message'] = "用户名与密码不匹配，请重试！1";
        return;
    }

    //一般密码是加密存储的  这个采用的是md5 不安全
    if ($user['password'] !== md5($password)) {
        //密码不正确  1f64f7f3d94a6ea252fd016577dd7992
        $GLOBALS['message'] = "用户名与密码不匹配，请重试！2";
        return;
    }


    //存一个登录标识
//    $_SESSION['is_logged_in']=true;
    //为了后续可以直接获取当前登录用户的信息，这里直接将用户信息放到 session 中
    $_SESSION['current_login_user'] = $user;


    //一切ok  可以跳转
    header('Location:../admin/index.php');


}


//判断请求是否为POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    login();
};

//退出功能
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'logout') {//isset判断里面的值有定义，返回为true
    unset($_SESSION['current_login_user']);//删除验证用户是否登录的session
}


?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>Sign in &laquo; Admin</title>
    <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../static/assets/vendors/animate/animate.css">
    <link rel="stylesheet" href="../static/assets/css/admin.css">
</head>
<body>
<div class="login">
    <form class="login-wrap <?php echo isset($message) ? 'shake animated' : ''; ?>"
          action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate autocomplete="off">
        <!--novalidate 关掉浏览器自带的校验功能--><!--autocomplete="off"  关闭客户端的自动完成功能-->
        <img class="avatar" src="../static/assets/img/default.png">
        <!-- 有错误信息时展示 -->
        <?php if (isset($message)): ?>
            <div class="alert alert-danger">
                <strong>错误! </strong><?php echo $message; ?>
            </div>
        <?php endif ?>

        <div class="form-group">
            <label for="email" class="sr-only">邮箱</label>
            <input id="email" value="<?php echo empty($_POST['email']) ? '' : $_POST['email']; ?>" name="email"
                   type="email" class="form-control" placeholder="邮箱" autofocus>
        </div>
        <div class="form-group">
            <label for="password" class="sr-only">密码</label>
            <input id="password" name="password" type="password" class="form-control" placeholder="密码">
        </div>
        <button class="btn btn-primary btn-block" href="index.php">登 录</button>
    </form>
</div>
<script src="../static/assets/vendors/jquery/jquery.js"></script>
<script>
    //入口函数
    $(function ($) {
        //1.单独作用域
        //2.确保页面加载过后执行

        //目标：在用户输入自己的邮箱过后，页面上展示这个邮箱对应的头像
        //实现:
        //  时机：邮箱文本框失去焦点,并且能够拿到文本框中填写的邮箱时
        //  事情：获取这个文本框中填写的邮箱对应的头像地址，展示到上面的  img  元素上

        var emailFormat = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]+$/;

        $('#email').on('blur', function () {
            var value = $(this).val();//获取email中的value
            //忽略文本框为空或者不是一个邮箱
            if (!value || !emailFormat.test(value)) return;// 如果email中没有值 直接return
            //用户输入了一个合理的邮箱地址
            // 获取这个邮箱对应的头像地址，展示到上面的  img  元素上
            //因为客户端的js无法直接操作数据库，应该通过js发送AJAX 请求 告诉 服务端的某个 接口，让这个 接口  帮助 客户端  获取头像地址
            $.get('../admin/api/avatar.php', {email: value}, function (res) {
                //希望res=>这个邮箱对应的头像地址
                if (!res) return;
                //拿到头像的地址了，展示到avatar上
                // $('.avatar').fadeOut().attr('src',res).fadeIn();//attr()当该方法用于设置属性值，则为匹配元素设置一个或多个属性/值对。
                $('.avatar').fadeOut(function () {//考虑网络因素，先隐藏
                    $(this).on('load', function () {//img的load事件指的是图片已经完全加载出来
                        $(this).fadeIn();//在显示
                    }).attr('src', res);
                })
            })

        })

    })


</script>
</body>
</html>
