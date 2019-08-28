<?php 
function add () {
 //TODO:处理接受数据逻辑，保存数据

//TODO:接收提交的文本内容

//TODO:接收海报文件

//TODO:接收音乐文件





}
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
