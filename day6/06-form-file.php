<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  //接收文件使用一个叫做$_FILES 超全局成员
  var_dump($_FILES );
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <!-- 如果一个表单中有文件域（文件上传），必须将表单中的method 设置为 post，enctype设置为multipart/form-data -->
  <!-- enctype 默认是 urlencoded 格式 key1=value&key2=value2 -->
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" enctype="multipart/form-data">
   <!-- <input type="text" namw="foo">
   <input type="text" namw="bar"> -->
   <input type="file" name="image" id="">
   <button>提交</button>
  </form>
</body>
</html>
