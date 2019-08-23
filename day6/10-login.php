<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>用户登录</title>
</head>
<body>
  <!-- 表单重要的点：
  必须有form标签
  form必须指定action和method
  不设置action 默认是当前页面（必须设置，因为兼容）
  不设置method 默认是get
  表单元素（表单域）必须有name(如果希望被提交的情况)
  表单中必须有一个提交按钮 -->

 <form action="11-foo.php" method="get">
 <table border='1'>
   <tr>
     <td>用户名</td>
     <td><input type="text" name="username" id=""></td>
   </tr>
   <tr>
     <td>密码</td>
     <td><input type="text" name="password" id=""></td>
   </tr>
   <tr>
     <td></td>
     <td><input type="submit" value="登录"></td>
   </tr>
 </table>
 </form>
</body>
</html>