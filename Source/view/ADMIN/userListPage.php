
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #D38566;">
    <!-- Brand Logo -->
    <div class="brand-link">
      <img src="./PICTURE/logo.png" alt="AdminHMK Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <a href="trangchu.php"><span class="brand-text font-weight-light" style="font-weight: 1000!important;">OGANI </span></a>
    <div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a class="d-block">Trang sản phẩm</a>
        </div>
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Danh sách User</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
    <div class="container-fluid">
      
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_themuser">THÊM USER</button>  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody id="user_content">
                   <?php
                    include_once './../../until/MySQLUtil.php';
                    $dbConnect = new MySQLUtils();
                    $query = "SELECT userid, username, password, fullname, phone, status, email from user";
                   $data = $dbConnect->getAllData($query);
                    $dbConnect->disconnectDB();
               
                    for($i = 0 ; $i< count($data);$i++){
                    
                      echo '<tr>';
                      echo '<td >'.$data[$i]["userid"].'</td>';
                      echo '<td>'.$data[$i]["email"].'</td>';
                      echo '<td>'.$data[$i]["phone"].'</td>';
                      echo '<td>'.$data[$i]["username"].'</td>';
                      echo '<td>'.$data[$i]["password"].'</td>';
                      echo '<td>'.$data[$i]["email"].'</td>';
                      echo '<td>complete</td>';
                      echo'</tr>';

                    }
                    ?> 
                    


                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>



<div class="modal fade" id="modal_themuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="./../../controller/UserController.php"  method="post">
      <input type="hidden" name="user_action" value="user_create"/>

          <input
            type="text"
            placeholder="Tên khách hàng"
            name="tenkhachhang"
            id="tenkhachhang"
            class="margin-top20"
          />
          <input
            type="tel"
            placeholder="Phone"
            name="phone"
            id="phone"
            class="margin-top20"
            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
            maxlength="10"
          /> 
          <input
            type="text"
            placeholder="Username"
            name="username"
            id="username"
            class="margin-top20"
          />
          <input    
            type="password"
            placeholder="Password"
            name="password"
            id="password"
            class="margin-top20"
          />
          <input 
            type="email" 
            placeholder="Email" 
            name="email" 
            id="email"
            class="margin-top20" />
            <input 
            type="status" 
            placeholder="Status" 
            name="status" 
            id="status"
            class="margin-top20" />
            <br />
            <button type="submit" name="create_user" class="btn btn-primary">Thêm</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" id="dong_themuser">Đóng</button>
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>




<button type="button" data-toggle="modal" data-target="#modal_suauser" id="btn_suauser" style="display:none"></button>
<div class="modal fade" id="modal_suauser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sửa User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="../PHP/customer_controller.php" method="post">
          <input
            type="text"
            placeholder="Tên khách hàng"
            name="tenkhachhang"
            id="edit_tenkhachhang"
            class="margin-top20"
          />
          <input
            type="tel"
            placeholder="Phone"
            name="phone"
            id="edit_phone"
            class="margin-top20"
            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
            maxlength="10"
          /> 
          <input
            type="text"
            placeholder="Username"
            name="username"
            id="edit_username"
            class="margin-top20"
          />
          <input    
            type="password"
            placeholder="Password"
            name="password"
            id="edit_password"
            class="margin-top20"
          />
          <input 
            type="email" 
            placeholder="Email" 
            name="email" 
            id="edit_email"
            class="margin-top20" />
            <br />
            <button type="button" onclick="suauser()" class="btn btn-primary">Cập nhật</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" id="dong_suauser">Đóng</button>
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>












<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>


<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="../JS/customer.js?v7"></script>
</body>
</html>
