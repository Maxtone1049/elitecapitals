<?php
session_start();
error_reporting(0);
include('../includes/dbconnect.php');
if (strlen($_SESSION['obcsaid']==0)) {
  header('location:logout');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <title>ADMIN - ELITE CAPITALS</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/jquery-toggles/toggles-full.css" rel="stylesheet">
    <link href="lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <!-- Amanda CSS -->
    <link rel="shortcut icon" href="../img/favicon.png" type="image/png">
    <link rel="apple-touch-icon" href="assets/images/logoIcon/logo.png">
    <link rel="stylesheet" href="css/amanda.css">
  </head>

  <body>

    <?php include_once('includes/header.php');?>

   <?php include_once('includes/sidebar.php');?>

    

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/jquery-toggles/toggles.min.js"></script>
    <script src="lib/d3/d3.js"></script>
    <script src="lib/rickshaw/rickshaw.min.js"></script>
    <script src="lib/gmaps/gmaps.js"></script>
    <script src="lib/Flot/jquery.flot.js"></script>
    <script src="lib/Flot/jquery.flot.pie.js"></script>
    <script src="lib/Flot/jquery.flot.resize.js"></script>
    <script src="lib/flot-spline/jquery.flot.spline.js"></script>

    <script src="js/amanda.js"></script>
    <script src="js/ResizeSensor.js"></script>
    <script src="js/dashboard.js"></script>
  </body>
</html>
<?php }?>