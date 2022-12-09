<?php  
  if(isset($_REQUEST['error'])) {
          $style="error";
  }else{
    $style="none";
  }

?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="icon" href="images/icon/logo-mini.png" type="image/icon type">

    <style>
      .error{
        color:red;
        padding-left:10px;
        margin-bottom:20px;
        margin-top:-10px;
        display:block;
        font-weight:bold;
        font-style: italic;
      }
      .none{
        display: none;
      }
    </style>
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form  action=".?act=xu-ly-dang-nhap" method="post">
        <div class="txt_field">
          <input type="text" required name='email'>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" required name='pass'>
          <span></span>
          <label>Password</label>
        </div>
        <span class=<?php echo $style ?> >Lỗi! Đăng nhập lại</span>
        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="#">Signup</a>
        </div>
      </form>
    </div>

  </body>
</html>
