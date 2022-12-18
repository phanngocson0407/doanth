<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css" />
  </head>
  <body>
    
    <nav id="container">
      <div class="name_form">
        <h1>ĐĂNG NHẬP</h1>
      </div>
      <div id="form_dangki">
        <form action="../PHP/index_admin_controller.php" method="post">
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
          <button type="submit" class="margin-top20">Đăng Nhập</button>
        </form>
      </div>
      <div class="other margin-top20">
        <p id="rules">
          Nếu bạn chưa có tài khoản hãy
          <span><a href="./register.php">ĐĂNG KÍ</a></span>
        </p>
      </div>
    </nav>
   
  </body>
</html>
