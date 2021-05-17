<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "proweb");

if (isset($_SESSION['admin'])) {
  echo "<script>location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Login</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
  <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div> 
 <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Furniture Webstore<em>.</em></h2></a>
  <header>

  <div class="login-box">
    <div class="login-logo">
      <a href="admin/login.php"><b>Admin Page</b> </a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Silahkan melakukan login terlebih dahulu</p>

      <form method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="user">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="pass">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <button type="submit" class="btn btn-success btn-block btn-flat" name="login">Login</button>
          </div>
        </div>
      </form>
      <?php
      if(isset($_POST['login'])){
        $data = mysqli_query($koneksi,"SELECT * FROM admin WHERE username ='$_POST[user]' AND 
          password = '$_POST[pass]'");
        $success = mysqli_num_rows($data);
        if ($success == 1){
          $_SESSION['admin'] = mysqli_fetch_array($data);
          echo "<br><div class='alert alert-success'> Login Sukses</div>";
          echo "<meta http-equiv='refresh' content='1;url=index_admin.php'>";
        }
        else {
          echo "<br><div class='alert alert-danger'> Login Gagal</div>";
          echo "<meta http-equiv='refresh' content='1;url=login.php'>";
        }
      }
      ?>
    </div>
  </div>
</script>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>
</body>
</html>
