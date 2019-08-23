<?php 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  var_dump($_POST);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>表单</title>
</head>
<body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
  <!-- <input type="text" name='key1' id="">
  <input type="email" name='key1' id="">
  <input type="number" name='key1' id="">
  <textarea name="key2" id="" cols="30" rows="10"></textarea> -->
 
  性别
  <!-- 当表单中使用了radio,一定要为相同name的radio设置不同的value,让服务端可以辨别 -->

  <label for=""><input type="radio" name="gender" value="male">男</label>
  <label for=""><input type="radio" name="gender" value="female">女</label>
  <br>


  <!-- checkbox 如果没有选中则不会提交 如果选中提交on -->
  <label for=""><input type="checkbox" name="agree" value="true">同意协议</label>
  <br>
 
  
  <br>
  <!-- 如果想要同时提交多个选中项，可以在name属性后面跟上[].实现提交多个选中数据的效果 -->
  <!-- 最终提交到服务端，通过$_POST接受到的是一个索引数组 -->
  <label for=""><input type="checkbox" name="funs[]" value="football">足球</label>
  <label for=""><input type="checkbox" name="funs[]" value="basketball">篮球</label>
  <label for=""><input type="checkbox" name="funs[]" value="earth">地球</label>
  <label for=""><input type="checkbox" name="funs[]" value="pingpang">乒乓球</label>
  <br>


<!-- select也是一个表单元素，也可以让表单提交一个数据，默认提交的是选中项目的value，如果没有设置value，那么就会提交文本 -->
  <select name="status" id="">
    <option value="1">激活</option>
    <option value="2">未激活</option>
    <option value="3">待激活</option>
  </select>


  <br>

  <button>提交</button>
  </form>
</body>
</html>
