<?php
/**
 * Created by PhpStorm.
 * User: lc
 * Date: 2019/4/15
 * Time: 14:41
 * 根据客户端传递过来的ID删除对应数据
 */

require_once '../functions.php';

//判断有没有提交参数过来
if (empty($_GET['id'])) {
    exit('缺少必要参数');
}

//$id = (int)$_GET['id'];
$id = $_GET['id'];
//=> '1 or 1 =1'
//防止sql 注入

$rows = xiu_execute('delete from posts where id in (' . $id . ');');

//header('Location:../admin/posts.php');
header('Location:'.$_SERVER['HTTP_REFERER']);
//在点击删除的时候，有一个请求报文里面有一个Referer  这里删除后，在跳转回删除的那一页
//.$_SERVER['HTTP_REFERER']  就是获取请求传来的页面地址