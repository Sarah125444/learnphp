<?php  
// /这里是在响应头中添加一个location的头信息
// header('Location: 01-content-type.php');
// header('Location: 03-location.php');
//客户端浏览器在接收到这个头信息过后会自动跳转到指定的地址

//状态吗302是临时跳转 从一个页面临时跳转到另外一个页面
//切记不要循环重定向

header('Location: 03-location2.php');

