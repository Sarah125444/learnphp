<!-- 如何在服务端接收数据=> 直接在开头加上php标记 -->
<?php

function postback(){
  //申明$message是全局
  global $message;

  if(empty($_POST['username'])){
    //没有提交用户名或者用户名为空字符串
    $message = '会不会玩';
    return;
  } 
  
  if(empty($_POST['password'])){
    $message = '请输入密码';
    return;
  }
  
  if(empty($_POST['confirm'])){
    $message = '请输入确认密码';
    return;
  }
 
  if ($_POST['password'] !== $_POST['confirm']){
    $message = '两次输入的密码不一致';
    return;
  } 

  if(!(isset($_POST['agree']) && $_POST['agree'] === 'on')){
    $message =  '必须同意注册协议';
   } 

   $username = $_POST['username'];
   $password = $_POST['password'];

   file_put_contents('user.txt', $username.'|'.$password."\n" , FILE_APPEND);
   $message = '注册成功';
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  postback();
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
  <!-- 如果是别人给的页面，记得第一步先加上action和method -->
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post">
    <table border="1">
      <tr>
        <td><label for="username">用户名</label></td>
        <td><input type="text" name="username" id="username" value='<?php echo isset($username) ?  $username : ''; ?>'></td>
      </tr>
      <tr>
        <td><label for="password">密码</label></td>
        <td><input type="password" name="password" id="password"></td>
      </tr>
      <tr>
        <td><label for="confirm">确认密码</label></td>
        <td><input type="password" name="confirm" id="confirm"></td>
      </tr>
      <tr>
        <td></td>
        <td><label for=""><input type="checkbox" name="agree" value="true">同意注册协议</label></td>
      </tr>
      <?php if(isset($message)): ?>
      <tr>
        <td></td>
        <td><?php echo $message; ?></td>
      </tr>
      <?php endif ?>
      <tr>
        <td></td>
        <td><button>注册</button></td>
      </tr>

    </table>
  </form>
</body>
</html>



