<?php
/**
 * Created by PhpStorm.
 * User: lc
 * Date: 2019/7/5
 * Time: 16:18
 *
 * 根据用户提交过来的留言，并判断
 */


require_once '../../config.php';

//1.接收传递过来的姓名
if (empty($_POST['name'])) {
    exit('缺少必要参数');
}
if (empty($_POST['phone'])) {
    exit('缺少必要参数');
}
if (empty($_POST['message'])) {
    exit('缺少必要参数');
}
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
//2.查询对应的头像地址
$conn = mysqli_connect(XIU_DB_HOST, XIU_DB_USER, XIU_DB_PASSWORD, XIU_DB_NAME);

if (!$conn) {
    exit('连接数据库失败');
}
$res = mysqli_query($conn, "insert into message values ('{$name}','{$phone}','{$message}');");
if (!$res) {
    exit('提交失败');
}

//mysqli_affected_rows 返回上一次数据库操作影响的行数
$affected_rows = mysqli_affected_rows($conn);

if ($affected_rows !== 1) {
    exit('新增数据失败');
}

//3.echo
echo  $affected_rows;