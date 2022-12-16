<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./css/register.css" />
  </head>
  <body>
    <nav id="container">
      <div class="name_form">
        <h1>ĐĂNG KÍ</h1>
      </div>
      <div id="form_dangki">
        <form action="../PHP/dangki_admin_controller.php" method="post">
        <input
            type="text"
            placeholder="Tên admin"
            name="ten_admin"
            class="margin-top20"
          />
          <input
            type="text"
            placeholder="Usename"
            name="username"
            class="margin-top20"
          />
          <input    
            type="password"
            placeholder="Password"
            name="password"
            class="margin-top20"
          />
          <input
            type="tel"
            placeholder="Phone"
            name="phone"
            class="margin-top20"
            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
            maxlength="10"
          /> 
          <input
            type="email"
            placeholder="Email"
            name="email"
            class="margin-top20"
          />
          <small style="color:red">
            <?php
            session_start();
            echo(!empty($_SESSION["err"]))?$_SESSION["err"]:"";
            ?>
        </small>  
          <button type="submit" class="margin-top20">Đăng Ký Ngay</button>
        </form>
      </div>
      <div class="other margin-top20">
        <p id="rules">
          Nếu bạn có tài khoản hãy
          <span><a href="./login.php">ĐĂNG NHẬP</a></span>
        </p>
      </div>
    </nav>
   
  </body>
</html>
