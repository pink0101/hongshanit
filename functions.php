<?php
/**
 * Created by PhpStorm.
 * User: lc
 * Date: 2019/4/10
 * Time: 19:47
 * 封装公用的函数
 */

require_once 'config.php';

session_start();
/*
 * 获取当前登录用户信息，如果没有获取到则自动跳转到登录页面
 * 定义函数时一定要注意：函数名与内置函数冲突问题
 * js 判断方式：typeof fn==='function'
 * php 判断函数是否定义的方式：function_exist('xiu_get_current_user')
 * */
function xiu_get_current_user()
{
    if (empty($_SESSION['current_login_user'])) {
        //没有当前登录用户信息，意味着没有登录
        header('Location:../admin/login.php');
        exit();//没有必要再执行之后的代码
    }
    return $_SESSION['current_login_user'];
}

/*
 * 通过一个数据库查询获取多条数据
 * 返回一个索引数组，里面函数关联数组
 * */
function xiu_fetch_all($sql)
{
    $conn = mysqli_connect(XIU_DB_HOST, XIU_DB_USER, XIU_DB_PASSWORD, XIU_DB_NAME);
    if (!$conn) {
        exit('连接失败');//如果失败，退出当前脚本
    }
    $query = mysqli_query($conn, $sql);
    if (!$query) {
        //查询失败
        return false;
    }
    //先定义
    $result=[];
    //遍历  mysqli_fetch_assoc从结果集中取得一行作为关联数组：
    while ($row = mysqli_fetch_assoc($query)) {
        $result[] = $row;
    }

    //关不关都无所谓，php会自动去做
    mysqli_free_result($query);//释放资源
    mysqli_close($conn);//关闭连接

    return $result;
}

/*
 * 获取单条数据
 * 关联数组
 * */
function xiu_fetch_one($sql)
{
    $res = xiu_fetch_all($sql);
    return isset($res[0]) ? $res[0] : null;
}

/*
 * 执行一个增删改语句
 *
 * */
function xiu_execute($sql)
{
    $conn = mysqli_connect(XIU_DB_HOST, XIU_DB_USER, XIU_DB_PASSWORD, XIU_DB_NAME);
    if (!$conn) {
        exit('连接失败');//如果失败，退出当前脚本
    }
    $query = mysqli_query($conn, $sql);
    if (!$query) {
        //查询失败
        return false;
    }

    //对于增删改类的操作都是获取受影响行数
    $affected_rows = mysqli_affected_rows($conn);//获取受影响行数

    mysqli_close($conn);//关闭连接

    return $affected_rows;
}
