<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Coffee Chat Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="./images/logo.png" />
  </head>
  <body>
    
    <?php
      require 'driver/dealer.php';
      $action = new Action();
      if(!isset($_SESSION['user'])){
        header('location:login.php');
      }else{
        $sql = "SELECT * from admin where ad_id=?";
        $param = array($_SESSION['user']);
        $user = $action->selectRow($sql,$param);
      }
    ?>
    <?php
            if(isset($_GET['logout'])){
              session_destroy();
              header('location:login.php');
            }
          ?>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="images/logo.png" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome Coffee Chat Dashboard!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="images/faces/me.jpg" alt="Profile image"> <span class="font-weight-normal"><?= $user['ad_name'];?> </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="images/faces/me.jpg" alt="Profile image">
                  <p class="mb-1 mt-3"><?= $user['ad_name'];?></p>
                  <p class="font-weight-light text-muted mb-0"><?= $user['ad_email'];?></p>
                </div>
                <a href="?logout" class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="images/faces/me.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?= $user['ad_name'];?></p>
                  <p class="designation"><?= $user['ad_type'];?></p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./">
                <span class="menu-title">Home</span>
                <i class="icon-home menu-icon"></i>
              </a>
            </li>
            <?php if($_SESSION['type']=='Administrator'){ ?>
            <li class="nav-item">
              <a class="nav-link" href="barista.php">
                <span class="menu-title">Users</span>
                <i class="icon-user menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Tables.php">
                <span class="menu-title">Tables</span>
                <i class="icon-screen-tablet menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Categories.php">
                <span class="menu-title">Categories</span>
                <i class="icon-list menu-icon"></i>
              </a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="Menu.php">
                <span class="menu-title">Menu</span>
                <i class="icon-menu menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Orders.php">
                <span class="menu-title">Orders</span>
                <i class="icon-bell menu-icon"></i>
              </a>
            </li>
            <?php if($_SESSION['type']=='Administrator'){ ?>

            <li class="nav-item">
              <a class="nav-link" href="Clients.php">
                <span class="menu-title">Clients</span>
                <i class="icon-people menu-icon"></i>
              </a>
            </li>
            <?php } ?>
          </ul>
        </nav>