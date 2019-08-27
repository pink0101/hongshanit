<?php
/**
 * Created by PhpStorm.
 * User: lc
 * Date: 2019/5/28
 * Time: 9:37
 * 根据客户端AJAX发过来的id 审核评论
 */

require_once '../../functions.php';

//判断有没有提交参数过来
if (empty($_GET['id'])) {
    exit('缺少必要参数');
}

//$id = (int)$_GET['id'];
$id = $_GET['id'];
//=> '1 or 1 =1'
//防止sql 注入

$rows = xiu_execute("update comments set status='helds' where id ={$id}");

header('Content-Type:appliction/json');

echo json_encode($rows > 0);