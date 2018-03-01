<?php 
  include_once '../controller/session_functions.php';
  landing_page_session_check();
 ?>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <style>
    .autocomplete-suggestions { border: 1px solid #999; background: #fff; cursor: default; overflow: auto; }
    .autocomplete-suggestion { padding: 10px 5px; font-size: 1.2em; white-space: nowrap; overflow: hidden; }
    .autocomplete-selected { background: #f0f0f0; }
    .autocomplete-suggestions strong { font-weight: normal; color: #3399ff; }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- header -->
  <header class="main-header">
    <a href="index.html" class="logo">
      <span class="logo-mini"><?php echo $_SESSION['user_details']['company_name']; ?></span>
      <span class="logo-lg"><?php echo $_SESSION['user_details']['company_name']; ?></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['user_details']['username']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="../img/avatar5.png" class="img-circle" alt="User Image">
                <p>
                  Bye <?php echo $_SESSION['user_details']['username']; ?>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../controller/logout_controller.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- sidebar -->
  <aside class="main-sidebar">
      <section class="sidebar">
        <ul class="sidebar-menu">
          <?php generate_nav(); ?>
        </ul>
      </section>
  </aside>
  <!-- Content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container">
        <?php
          if(isset($_GET['status'])){
            $status = $_GET['status'];
          }else{
            $status = "";
          }
          switch ($status) {
            case 'inserted':
              echo '<div class="alert alert-success" id="dynamic-alart" ><strong>Success!</strong> New '.$_GET['slug'].' added successfully.</div>';
            break;
             case 'updated':
              echo '<div class="alert alert-success" id="dynamic-alart" ><strong>Success!</strong> '.$_GET['slug'].' updated successfully.</div>';
            break;
            case 'deleted':
              echo '<div class="alert alert-danger" id="dynamic-alart" ><strong>Success!</strong> A '.$_GET['slug'].' deleted successfully.</div>';
            break;
            case 'error':
              echo '<div class="alert alert-warning" id="dynamic-alart" ><strong>Sorry!</strong> '.$_GET['slug'].' name already present or Something went wrongly.</div>';
            break;
            default:
            echo "";
            break;
          }
        ?>