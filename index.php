<?php
  @session_start();
  @error_reporting(1);
  include "config/lib.php";

  $table = "tb_user";
  $username = "$_POST[username]";
  $password = "$_POST[password]";
  $halaman = array('admin/', 'superadmin/');

  $perintah = new lib();

  if (!empty($_SESSION['username']) || !empty($_SESSION['akses'])) {
    if ($_SESSION['akses'] == "Admin") {
      echo "<script>document.location.href='admin/'</script>";
    } else if($_SESSION['akses'] == "Super Admin") {
      echo "<script>document.location.href='superadmin/'</script>";
    }
  }

  if (isset($_POST['login'])) {
    $perintah->login($table, $username, $password, $halaman);
  }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/futsal"><b>G.O.R. Sejahtera</b> Futsal</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Login</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" id="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="lihatPassword">
              <label for="lihatPassword">
                Lihat Password
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
$(document).ready(function(){
  $('#lihatPassword').click(function(){
    if($(this).is(':checked')){
      $('#password').attr('type','text');
    }else{
      $('#password').attr('type','password');
    }
  });
});
</script>
</body>
</html>
