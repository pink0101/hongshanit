<?php
/**
 * Created by PhpStorm.
 * User: lc
 * Date: 2019/4/19
 * Time: 17:41
 * 接收客户端上传的文件
 */
//var_dump($_FILES['avatar']);

//接收文件
//保存文件
//返回这个文件的访问呢 URL

if (empty($_FILES['avatar'])) {
    exit('必须上传文件');
}

$avatar = $_FILES['avatar'];

if ($avatar['error'] !== UPLOAD_ERR_OK) {
    exit('上传失败');
}

//校验类型  大小

//移动文件到网站范围之内
$ext = pathinfo($avatar['name'], PATHINFO_EXTENSION);
$target = '../../static/uploads/img-' . uniqid() . '.' . $ext;

if (!move_uploaded_file($avatar['tmp_name'],$target)){
    exit('上传失败');
}

//上传成功了

echo substr($target,3);