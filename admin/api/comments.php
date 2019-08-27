<?php
/**
 * Created by PhpStorm.
 * User: lc
 * Date: 2019/4/15
 * Time: 21:31
 * 接收客户端的AJAX请求 返回评论数据
 */

//载入封装的所有的函数
require_once '../../functions.php';

//取得客户端传递过来的分页页码
$page = empty($_GET['page']) ? 1 : intval($_GET['page']);//intval 转整数

//每次查询的条数
$length = 2;
//根据页码计算越过多少条数据
$offset = ($page - 1) * $length;

//sprintf 模板
$sql = sprintf('select 
	comments.*,
	posts.title as post_title
from comments
inner join posts on comments.post_id=posts.id
order by comments.created desc
limit %d,%d;', $offset, $length);

//查询到所有评论数据
$comments = xiu_fetch_all($sql);

// 先查询到所有的数据的数量
$total_count = xiu_fetch_one('select count(1) as count 
from comments
inner join posts on comments.post_id=posts.id')['count'];

//总页数---       虽然返回的数据类型是float 但是数字一定是一个整数
$total_pages=ceil($total_count/$length);


//因为网络之间传输的只能是字符串（目前）
//所以我们先将数据转换成字符串(序列化)
$json = json_encode(array(
    'total_pages' => $total_pages,
    'comments' => $comments,

));

//响应客户端响应体 的数据类型是json
header('Content-Type:application/json');

//响应给客户端
echo $json;




