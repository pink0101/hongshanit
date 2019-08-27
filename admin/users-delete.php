<?php
/**
 * Created by PhpStorm.
 * User: lc
 * Date: 2019/5/10
 * Time: 9:
 *  * 根据客户端 a 标签传递过来的ID删除对应数据
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

$rows = xiu_execute('delete from users where id in (' . $id . ');');

header('Location:../admin/users.php');