<?php
//载入访问当前目录的用户有没有密码验证过
require_once '../functions.php';
xiu_get_current_user();



$where = '1=1';//where '1=1'  相当于没有加条件
$search = '';//search 属性设置或者返回 href 属性值的查询字符串部分。(就是DOM的href)


//分类筛选参数====================================================
if (isset($_GET['category']) && $_GET['category'] !== 'all') {
    $where .= ' and posts.category_id=' . $_GET['category'];
    $search .= '&category=' . $_GET['category'];
}
//状态筛选===================================================
if (isset($_GET['status']) && $_GET['status'] !== 'all') {
    $where .= " and posts.status='{$_GET['status']}'";
    $search .= '&status=' . $_GET['status'];
}

//$where => "1=1 adn posts.category_id =1 and posts.status = 'published'"
//$search => "&category=1&status=published"


$size = 20;
//处理分页参数  url 地址过来的是字符串  强转================================================
$page = empty($_GET['page']) ? 1 : (int)$_GET['page'];
//$page = $page < 1 ? 1 : $page;

if ($page < 1) {//当用户直接从地址栏手动输入不存在的参数时，拦截
    //跳转到第一页
    header('Location:../admin/post`s.php?page=1'.$search);
}


//数据的条数  $total_pages= ceil($total_count/$size)  //ceil 向上取整==========================
$total_count = (int)xiu_fetch_one("
select 
count(1)
as num
from posts 
inner join categories on posts.category_id=categories.id 
inner join users on posts.user_id =users.id
where {$where} ; ")['num'];
//最大页码
$total_pages = (int)ceil($total_count / $size);//ceil 返回的是字符型
//$page = $page > $total_pages ? $total_pages : $page;
if ($page > $total_pages) {
    //当用户手动输入不存在的参数时，拦截到最后一页
    header('Location:../admin/posts.php?page=' . $total_pages . $search);
}



//计算出越过多少条
$offset = ($page - 1) * $size;

//关联数据查询
$posts = xiu_fetch_all("
select 
posts.id,
posts.title,
users.nickname user_name ,
categories.name  category_name,
posts.created,
posts.status
from posts 
inner join categories on posts.category_id=categories.id 
inner join users on posts.user_id =users.id
where {$where}
order by posts.created  desc
limit {$offset},{$size}");//处理数据格式转换


//查询到全部的分类数据
$categories = xiu_fetch_all('select * from categories');


//处理分页页码=======================================
$visiables = 5;//有五个按钮
$region = ($visiables - 1) / 2;//左右区间
//页码开始
$begin = $page - $region;//开始页码- //-1
//结束页码
$end = $begin + $visiables;//结束页码+1  //4
//可能出现$begin 和 $end  的不合理情况
//$begin 必须 >=0  确保$begin 最小为1
if ($begin < 1) {
    //$begin意味着必须要修改 $end
    $begin = 1;
    $end = $begin + $visiables;//6
}
//$end   必须 <=最大页数
if ($end > $total_pages + 1) { //6>3+1
    //$end 超出范围
    $end = $total_pages + 1;  //3+1
    //$end意味着必须要修改 $begin
    $begin = $end - $visiables;//4-2
    //如果页数不够5页，直接让$begin=1
    if ($begin < 1) {
        $begin = 1;
    }
}

/*
 * 转换状态展示
 * */
function convert_status($status)
{
    $dict = array(
        'published' => '已发布',
        'drafted' => '草稿',
        'trashed' => '回收站',
    );
    return isset($dict[$status]) ? $dict[$status] : '未知';
}

/*
 * 时间格式化
 * */
function convert_data($created)
{
    //=>'2017-07-01 08:08:00'
    $timestamp = strtotime($created);//strtotime  将任何字符串的日期时间描述解析为 Unix 时间戳：
    return date('Y年m月d日<b\r>H:i:s', $timestamp);//将指定    函数格式化本地日期和时间，并返回格式化的日期字符串。 第二个参数  为一个时间戳
}

; ?>


<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <title>Posts &laquo; Admin</title>
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
            <h1>所有文章</h1>
            <a href="post-add.html" class="btn btn-primary btn-xs">写文章</a>
        </div>
        <!-- 有错误信息时展示 -->
        <!-- <div class="alert alert-danger">
          <strong>错误！</strong>发生XXX错误
        </div> -->
        <div class="page-action">
            <!-- show when multiple checked -->
            <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
            <form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <select name="category" class="form-control input-sm">
                    <option value="all">所有分类</option>
                    <?php foreach ($categories as $item): ?>
                        <option value="<?php echo $item['id']; ?>"<?php echo isset($_GET['category']) && $_GET['category'] == $item['id'] ? 'selected' : ''; ?>>
                            <?php echo $item['name']; ?></option>
                    <?php endforeach ?>
                </select>
                <select name="status" class="form-control input-sm">
                    <option value="all">所有状态</option>
                    <option value="drafted" <?php echo isset($_GET['status']) && $_GET['status'] == 'drafted' ? 'selected' : ''; ?>>
                        草稿
                    </option>
                    <option value="published" <?php echo isset($_GET['status']) && $_GET['status'] == 'published' ? 'selected' : ''; ?>>
                        已发布
                    </option>
                    <option value="trashed" <?php echo isset($_GET['status']) && $_GET['status'] == 'trashed' ? 'selected' : ''; ?>>
                        回收站
                    </option>
                </select>
                <button class="btn btn-default btn-sm">筛选</button>
            </form>
            <ul class="pagination pagination-sm pull-right">
                <li><a href="?page=<?php echo $page - 1; ?>">上一页</a></li>
                <?php for ($i = $begin; $i < $end; $i++): ?>  <!--1  4-->
                    <li <?php echo $i === $page ? 'class="active"' : ''; ?>><a
                                href="?page=<?php echo $i . $search; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
                <li><a href="?page=<?php echo $page + 1; ?>">下一页</a></li>
            </ul>
        </div>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th>标题</th>
                <th>作者</th>
                <th>分类</th>
                <th class="text-center">发表时间</th>
                <th class="text-center">状态</th>
                <th class="text-center" width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($posts as $item): ?>
                <tr>
                    <td class="text-center"><input type="checkbox"></td>
                    <td><?php echo $item['title']; ?></td>
                    <!--                    <td>--><?php //echo get_user($item['user_id']); ?><!--</td>-->
                    <!--                    <td>--><?php //echo get_category($item['category_id']); ?><!--</td>-->
                    <td><?php echo $item['user_name']; ?></td>
                    <td><?php echo $item['category_name']; ?></td>
                    <td class="text-center"><?php echo convert_data($item['created']); ?></td>
                    <!--一旦当输出的判断或者转换逻辑过于复杂，不建议直接写在混编位置-->
                    <td class="text-center"><?php echo convert_status($item['status']); ?></td>
                    <td class="text-center">
                        <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
                        <a href="../admin/posts-delete.php?id=<?php echo $item['id']; ?>" class="btn btn-danger btn-xs">删除</a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php $current_page = 'posts' ?>

<?php include 'inc/sidebar.php'; ?>


<script src="../static/assets/vendors/jquery/jquery.js"></script>
<script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
<script>NProgress.done()</script>
</body>
</html>
