<?php
//载入访问当前目录的用户有没有密码验证过
require_once '../functions.php';
//然后调用../xiu_get_current_user这个函数通过session检测有没有登录  (一定最先去做)
xiu_get_current_user();

//判断是否为需要编辑的数据
//==================================
if (empty($_GET['id'])) {//为空执行
    //添加
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        add_users();
    }
} else {
    //客户端通过URL 传递了一个id  => 客户端是要来拿一个修改数据的表单
    //需要拿到用户想要修改的数据
    $current_edit_users = xiu_fetch_one('select * from users where id=' . $_GET['id']);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        edit_users();
    }
}

function add_users()
{
//校验提交表单是否为空
    if (empty($_POST['email']) || empty($_POST['slug']) || empty($_POST['nickname'] || empty($_POST['password']))) {
        $GLOBALS['message'] = '请完整填写表单！';
        $GLOBALS['success'] = false;
        return;
    }
    //接收并保存
    $email = $_POST['email'];
    $slug = $_POST['slug'];
    $nickname = $_POST['nickname'];
    $password = md5($_POST['password']);

    //插入数据
    $rows = xiu_execute("insert into users values (null,'{$slug}','{$email}','{$password}','{$nickname}','../static/uploads/avatar.jpg',null,'activated')");

    $GLOBALS['success'] = $rows > 0;
    $GLOBALS['message'] = $rows <= 0 ? '添加失败(数据重复)' : '添加成功';
}

function edit_users()
{
    //声明全局变量
    global $current_edit_users;

//只有当编辑的并点击保存
    //校验提交表单是否为空
//    if (empty($_POST['name']) || empty($_POST['slug'])) {
//        $GLOBALS['message'] = '请完整填写表单！';
//        $GLOBALS['success'] = false;
//        return;
//    }
    //接收并保存
    $id = $current_edit_users['id'];
    $email = empty($_POST['email']) ? $current_edit_users['email'] : $_POST['email'];
    $current_edit_users['email'] = $email;
    $slug = empty($_POST['slug']) ? $current_edit_users['slug'] : $_POST['slug'];
    $current_edit_users['slug'] = $slug;
    $nickname = empty($_POST['nickname']) ? $current_edit_users['nickname'] : $_POST['nickname'];
    $current_edit_users['nickname'] = $nickname;
    $password = md5(empty($_POST['password']) ? $current_edit_users['password'] : $_POST['password']);
    $current_edit_users['password'] = $password;

    //修改数据
    $rows = xiu_execute("update users set slug='{$slug}',email ='{$email}',nickname ='{$nickname}',password ='{$password}' where id={$id}");

    $GLOBALS['success'] = $rows > 0;
    $GLOBALS['message'] = $rows <= 0 ? '更新失败' : '更新成功';
}


//查询到全部的分类数据
$users = xiu_fetch_all('select * from users');; ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>Users &laquo; Admin</title>
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
            <h1>用户</h1>
        </div>
        <!-- 有错误信息时展示 -->
        <?php if (isset($message)): ?>
            <?php if ($success): ?>
                <div class="alert alert-success">
                    <strong>成功 !</strong><?php echo $message; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-danger">
                    <strong>错误 !</strong><?php echo $message; ?>
                </div>
            <?php endif ?>
        <?php endif ?>
        <div class="row">
            <div class="col-md-4">
                <?php if (isset($current_edit_users)): ?>
                    <form  method="post"
                           action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $current_edit_users['id'];?>">
                        <h2>编辑《<?php echo $current_edit_users['nickname']; ?>》</h2>
                        <div class="form-group">
                            <label for="email">邮箱</label>
                            <input id="email" class="form-control" name="email" type="email" placeholder="邮箱"
                                   value="<?php echo $current_edit_users['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="slug">别名</label>
                            <input id="slug" class="form-control" name="slug" type="text" placeholder="slug"
                                   value="<?php echo $current_edit_users['slug']; ?>">
                            <p class="help-block">https://zce.me/author/<strong>slug</strong></p>
                        </div>
                        <div class="form-group">
                            <label for="nickname">昵称</label>
                            <input id="nickname" class="form-control" name="nickname" type="text" placeholder="昵称"
                                   value="<?php echo $current_edit_users['nickname']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">密码</label>
                            <input id="password" class="form-control" name="password" type="text" placeholder="密码"
                                   value="">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">更新</button>
                        </div>
                    </form>
                <?php else: ?>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <h2>添加新用户</h2>
                        <div class="form-group">
                            <label for="email">邮箱</label>
                            <input id="email" class="form-control" name="email" type="email" placeholder="邮箱">
                        </div>
                        <div class="form-group">
                            <label for="slug">别名</label>
                            <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
                            <p class="help-block">https://zce.me/author/<strong>slug</strong></p>
                        </div>
                        <div class="form-group">
                            <label for="nickname">昵称</label>
                            <input id="nickname" class="form-control" name="nickname" type="text" placeholder="昵称">
                        </div>
                        <div class="form-group">
                            <label for="password">密码</label>
                            <input id="password" class="form-control" name="password" type="text" placeholder="密码">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">添加</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
            <div class="col-md-8">
                <div class="page-action">
                    <!-- show when multiple checked -->
                    <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
                </div>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="text-center" width="40"><input type="checkbox"></th>
                        <th class="text-center" width="80">头像</th>
                        <th>邮箱</th>
                        <th>别名</th>
                        <th>昵称</th>
                        <th>状态</th>
                        <th class="text-center" width="100">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $item): ?>
                        <tr>
                            <td class="text-center"><input type="checkbox" data-id="<?php echo $item['id']; ?>"></td>
                            <td class="text-center"><img class="avatar" src="../static/assets/img/default.png"></td>
                            <td><?php echo $item['email']; ?></td>
                            <td><?php echo $item['slug']; ?></td>
                            <td><?php echo $item['nickname']; ?></td>
                            <td><?php echo $item['status']; ?></td>
                            <td class="text-center">
                                <a href="../admin/users.php?id=<?php echo $item['id']; ?>" class="btn btn-default btn-xs">编辑</a>
                                <a href="../admin/users-delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-xs">删除</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $current_page = 'users' ?>

<?php include 'inc/sidebar.php'; ?>


<script src="../static/assets/vendors/jquery/jquery.js"></script>
<script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
<script>NProgress.done()</script>
</body>
</html>
