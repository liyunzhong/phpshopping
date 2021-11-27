<?php
require_once 'include/config.inc.php';
$sql = 'SELECT * FROM setting WHERE id=1';
$res = $db->execute_dql($sql);
//var_dump($res);
$p =$res[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $p['title']; ?></title>
  <meta content="<?php echo $p['descriptison']; ?>" name="descriptison">
  <meta content="<?php echo $p['keywords']; ?>" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <link rel="stylesheet" href="assets/vendor/toastr-master/toastr.min.css">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="index.php"><span>Florist</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="index.php#portfolio">Product</a></li>
          <li><a href="#team">Designer</a></li>
          <li><a href="#contact">Contact Us</a></li>
          <li><a href="shopcart.php">Cart</a></li>
          <?php
          if(empty($_SESSION['username'])){
            ?>
            <li><a href="login.html"><i class="fa fa-sign-in log-in"></i> Login</a></li>
            <li ><a class="register" href="signup.html">
                </i> Register</a></li>
          <?php }else{ ?>

            <li><a href="admin"><i class="fa fa-user"></i>Welcome，<?php echo $_SESSION['username'];?></a></li>
            <li><a href="admin/quit.php"><i class="fa fa-sign-out log-out"></i>Exit</a></li>

          <?php } ?>


        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End #header -->
