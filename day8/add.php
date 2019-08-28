<?php 
function add () {
  //目标是接收客户端提交的数据和文件 最终保存到数据文件中
  $data = array();//准备一个空的容器，用来装最终要保存的数据
  $data['id'] = uniqid();

//1.接受提交的文本内容=============================================================

  if(empty($_POST['title'])){
    $GLOBALS['error_message'] = '请输入音乐标题';
    return;
  }
  if(empty($_POST['artist'])){
    $GLOBALS['error_message'] = '请输入歌手名称';
    return;
  }
  //记下title 和 artist
  $data['title'] = $_POST['title'];
  $data['artist'] = $_POST['artist'];

  //2.接收图片文件===================================================================

  //如何接收单个文件域的多文件上传？
  if(empty($_FILES['images'])){
    $GLOBALS['error_message'] = '请正常使用表单';
    return;
  }
  $images = $_FILES['images'];
  //准备一个容器装所有的海报路径
  $data['images'] = array();
//遍历这个文件域中的每一个文件（判断是否成功，判断类型，判断大小）
  for( $i=0; $i<count($images); $i++){
    //$images['error'] => [0,0,0]
    if($images['error'][$i] !== UPLOAD_ERR_OK){
      $GLOBALS['error_message'] = '上传海报文件失败';
      return;
    }
    //类型的校验
    //$images['type'] => ['image/png','image/jpg','image/gif']
   if(strpos($images['type'][$i] , 'image/') === 0){
     $GLOBALS['error_message'] = '上传海报文件格式错误';
     return;
   }
   //文件大小的判断
   if($images['size'][$i] <= 1 * 1024 * 1024){
    $GLOBALS['error_message'] = '上传海报文件格式错误';
    return;
   }
    $dest = './upload/'. uniqid() . $images['name'][$i];
    if(!move_uploaded_file($images['tmp_name'][$i], $dest)){
     $GLOBALS['error_message'] = '上传海报文件失败2';
     return;
   }   
   $data['images'][] = substr($data, 2);
  }//数组遍历结束

  //3.接收音乐文件=======================================================================
  if(empty($_FILES['source'])){
    $GLOBALS['error_message'] = '请正常使用表单';
  }

  $source = $_FILES['source'];
  // => {name: , tmp_name...}
  //判断是否上传成功
  if($source['error'] !== UPLOAD_ERR_OK){
    $GLOBALS['error_message'] = '上传音乐文件失败1';
    return;
  } 
   //判断类型是否允许
   $source_allowed_types = array( 'audio/mp3', 'audio/wma');
   if(！in_array($source['type'] , $source_allowed_types  )){
    $GLOBALS['error_message'] = '上传音乐文件类型错误';
    return;
   }
  //判断大小
   if($source['size'] >= 1 * 1024 * 1024){
     $GLOBALS['error_message'] = '上传音乐文件过小';
     return;
   }
  //移动
  $target  = './uploads/' . uniqid() . '_' . $source['name'];
  if(!move_uploaded_file($source['tmp_name'], $target)){
    $GLOBALS['error_message'] = '上传音乐文件失败2';
    return;
  }
  //将数据装起来
  //保存数据的路径一定要使用绝对路径
  $data['source'] = $target;

 //4.将数据加入到原有数据中
 $json = file_get_contents('data.json');
 $old  = json_decode($json, true);
 array_push($old, $data);
 $new_json = json_decode($old);
 file_put_contents('data.json', $new_json);


//5.跳转
header('Location: list.php');
}//add方法结束

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  add();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>添加新音乐</title>
  <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
  <div class="container py-5">
    <h1 class="display-4">添加新音乐</h1>
    <hr>
    <?php if(isset($error_message)) :?>
    <div class="alert alert-danger">
      <?php echo $error_message; ?>
    </div>
    <?php endif ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="title">标题</label>
        <input type="text" class="form-control" id="title" name="title">
      </div>
      <div class="form-group">
        <label for="artist">歌手</label>
        <input type="text" class="form-control" id="artist"  name="artist">
      </div>
      <div class="form-group">
        <label for="images">海报</label>
        <!-- multiple可以让文件多选 -->
        <input type="file" class="form-control" id="images"  name="images" accept="images[]" multiple>
      </div>
      <div class="form-group">
        <label for="source">音乐</label>
        <!-- accept可以设置两种值 分别为MIME Type/文件扩展名 -->
        <input type="file" class="form-control" id="source"  name="source" accept="audio/*">
      </div>
      <button class="btn btn-primary btn-block">保存</button>
    </form>
  </div>
</body>
</html>
