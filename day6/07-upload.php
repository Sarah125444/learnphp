<?php 
function upload(){
  if(!isset($_FILES['avatar'])){
    //客户端提交的表单内容中根本没有文件域
   $GLOBALS['message'] = '别玩我了';
   return;
  }
  $avatar = $_FILES['avatar'];
  if($avatar['error'] !== UPLOAD_ERR_OK){
    //服务端没有接收到上传的文件
    $GLOBALS['message'] = '上传失败';
    return;
  }
  //接收到了文件
  //将文件从临时目录移动到网站范围之内
  
  $source = $avatar['tmp_name']; //源文件在哪
  $target = './uploads/' . $avatar['name']; //目标放在哪
  //移动的目标路径中文件夹一定是一个已经存在的目标文件夹
  $moved = move_uploaded_file($source , $target);
  if (!$moved) {
    $GLOBALS['message'] = '上传成功';
    return;
  }
  //移动成功（上传整个过程OK）
  echo '123';
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  //
  upload();
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
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" enctype="multipart/form-data">
 <input type="file" name="avatar">
 <button> 上传</button>
 <?php if(isset($message)): ?>
 <p style="color: pink"><?php echo $message; ?></p>
 <?php endif ?>
  </form>
</body>
</html>
