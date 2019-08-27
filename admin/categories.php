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
        add_category();
    }
} else {
    //客户端通过URL 传递了一个id  => 客户端是要来拿一个修改数据的表单
    //需要拿到用户想要修改的数据
    $current_edit_category = xiu_fetch_one('select * from categories where id=' . $_GET['id']);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        edit_category();
    }
}


function add_category()
{
    //校验提交表单是否为空
    if (empty($_POST['name']) || empty($_POST['slug'])) {
        $GLOBALS['message'] = '请完整填写表单！';
        $GLOBALS['success'] = false;
        return;
    }
    //接收并保存
    $name = $_POST['name'];
    $slug = $_POST['slug'];

    //插入数据
    $rows = xiu_execute("insert into categories values (null,'{$slug}','{$name}')");

    $GLOBALS['success'] = $rows > 0;
    $GLOBALS['message'] = $rows <= 0 ? '添加失败(数据重复)' : '添加成功';
}

function edit_category()
{
    //声明全局变量
    global $current_edit_category;

//只有当编辑的并点击保存
    //校验提交表单是否为空
//    if (empty($_POST['name']) || empty($_POST['slug'])) {
//        $GLOBALS['message'] = '请完整填写表单！';
//        $GLOBALS['success'] = false;
//        return;
//    }
    //接收并保存
    $id = $current_edit_category['id'];
    $name = empty($_POST['name']) ? $current_edit_category['name'] : $_POST['name'];
    $current_edit_category['name'] = $name;
    $slug = empty($_POST['slug']) ? $current_edit_category['slug'] : $_POST['slug'];
    $current_edit_category['slug'] = $slug;

    //插入数据
    $rows = xiu_execute("update categories set slug='{$slug}',name ='{$name}' where id={$id}");

    $GLOBALS['success'] = $rows > 0;
    $GLOBALS['message'] = $rows <= 0 ? '更新失败' : '更新成功';

}


//查询到全部的分类数据
$categories = xiu_fetch_all('select * from categories');

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>Categories &laquo; Admin</title>
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
            <h1>分类目录</h1>
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
                <?php if (isset($current_edit_category)): ?>
                    <form method="post"
                          action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $current_edit_category['id']; ?>">
                        <h2>编辑《<?php echo $current_edit_category['name']; ?>》</h2>
                        <div class="form-group">
                            <label for="name">名称</label>
                            <input id="name" class="form-control" name="name" type="text" placeholder="分类名称"
                                   value="<?php echo $current_edit_category['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="slug">别名</label>
                            <input id="slug" class="form-control" name="slug" type="text" placeholder="slug"
                                   value="<?php echo $current_edit_category['slug']; ?>">
                            <p class="help-block">https://zce.me/category/<strong>slug</strong></p>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">保存</button>
                        </div>
                    </form>

                <?php else : ?>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <h2>添加新分类目录</h2>
                        <div class="form-group">
                            <label for="name">名称</label>
                            <input id="name" class="form-control" name="name" type="text" placeholder="分类名称">
                        </div>
                        <div class="form-group">
                            <label for="slug">别名</label>
                            <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
                            <p class="help-block">https://zce.me/category/<strong>slug</strong></p>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">添加</button>
                        </div>
                    </form>
                <?php endif ?>
            </div>
            <div class="col-md-8">
                <div class="page-action">
                    <!-- show when multiple checked -->
                    <a id="btn_delete" class="btn btn-danger btn-sm" href="../admin/category-delete.php"
                       style="display: none">批量删除</a>
                </div>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="text-center" width="40"><input type="checkbox"></th>
                        <th>名称</th>
                        <th>Slug</th>
                        <th class="text-center" width="100">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($categories as $item): ?>
                        <tr>
                            <td class="text-center"><input type="checkbox" data-id="<?php echo $item['id']; ?>"></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['slug']; ?></td>
                            <td class="text-center">
                                <a href="../admin/categories.php?id=<?php echo $item['id']; ?>"
                                   class="btn btn-info btn-xs">编辑</a>
                                <a href="../admin/category-delete.php?id=<?php echo $item['id']; ?>"
                                   class="btn btn-danger btn-xs">删除</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $current_page = 'categories' ?>

<?php include 'inc/sidebar.php'; ?>


<script src="../static/assets/vendors/jquery/jquery.js"></script>
<script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
<script>NProgress.done()</script>
<script>
    //1.不要重复使用无意义的选择操作，应该采用变量去本地化
    $(function ($) {
        var $tbodyCheckboxs = $('tbody input');//checkbox
        var $btnDelete = $('#btn_delete');//批量删除按钮

        //定义一个数组，然后checkbed事件改变的时候,去判断有没有checked属性值，获取当前元素的id存入数组，否则移除id
        var allCheckeds = [];
        $tbodyCheckboxs.on('change', function () {
            // console.log($(this).data('id'));//数字类型  获取指定元素上存取的数据
            //DOM方式拿到id
            // console.log($(this).attr('data-id'));//字符串类型
            var id = $(this).data('id');

            if ($(this).prop('checked')) {//如果能获取到当前checked的值
                //因为在全选之前点其余的checked会存入id ，点全选的时候，又会存入全部checked的id，所以在这里加上判断
                allCheckeds.includes(id) || allCheckeds.push(id);//includes判断数组里面有没有已经存在的id  或运算符  只要有一者为真，就不往后走
            } else {//否则移除
                allCheckeds.splice(allCheckeds.indexOf(id), 1);
            }
            allCheckeds.length ? $btnDelete.fadeIn() : $btnDelete.fadeOut();
            $btnDelete.prop('search', '?id=' + allCheckeds.toString());
        });


        //找一个合适的时机， 做一件合适的事情
        //全选和全不选
        $('thead input').on('change', function () {
            //1.获取当前选中状态
            var checked = $(this).prop('checked');//prop 一个参数的时后  返回属性值 两个参数的时候   设置属性和值
            //2.设置给表体中的每一个
            $tbodyCheckboxs.prop('checked', checked).trigger('change');//trigger  触发事件
        });
        //如果有下面的按钮有一个不选中，全选按钮就不选中
        $tbodyCheckboxs.on('change', function () {
            if (allCheckeds.length == $tbodyCheckboxs.length) {
                $('thead input').prop('checked', true);
            } else {
                $('thead input').prop('checked', false);
            }
        })
    });


    //## version 1=============================================
    //在表格中的任意 checkbox 选中状态变化时
    // $tbodyCheckboxs.on('change', function () {//change改变事件
    //     var flag = false;
    //     //有任意一个checkbox 选中就显示，反之隐藏
    //     $tbodyCheckboxs.each(function (i, item) {//each 遍历所以的input 第一个参数 选择器i的位置   第二个参数  当前元素
    //         // $(item).prop('checked');//prop获取DOM属性值  attr获取html属性
    //         if ($(item).prop('checked')) {
    //             flag = true;
    //         }
    //     });
    //     flag ? $btnDelete.fadeIn() : $btnDelete.fadeOut();
    //
    // })

</script>
</body>
</html>
