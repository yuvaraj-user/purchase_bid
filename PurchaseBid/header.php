<?php
include '../auto_load.php';
//p($_SESSION);exit;

if(!isset($_SESSION['EmpID']) && $_SESSION['Dcode']!='ADMIN'){
  header('Location:index.php');
}
?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap material admin template">
  <meta name="author" content="">

  <title>Rasi Seeds (P) Ltd - Corporate Portal</title>

  <link rel="apple-touch-icon" href="../assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="../global/photos/favicon.ico" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="../global/css/bootstrap.minfd53.css?v4.0.1">
  <link rel="stylesheet" href="../global/css/bootstrap-extend.minfd53.css?v4.0.1">
  <link rel="stylesheet" href="../assets/css/site.minfd53.css?v4.0.1">

  <!-- Skin tools (demo site only) -->
  <link rel="stylesheet" href="../global/css/skintools.minfd53.css?v4.0.1">
  <script src="../assets/js/Plugin/skintools.minfd53.js?v4.0.1"></script>

  <!-- Plugins -->
  <link rel="stylesheet" href="../global/vendor/animsition/animsition.minfd53.css?v4.0.1">
  <link rel="stylesheet" href="../global/vendor/asscrollable/asScrollable.minfd53.css?v4.0.1">
  <link rel="stylesheet" href="../global/vendor/switchery/switchery.minfd53.css?v4.0.1">
  <link rel="stylesheet" href="../global/vendor/intro-js/introjs.minfd53.css?v4.0.1">
  <link rel="stylesheet" href="../global/vendor/slidepanel/slidePanel.minfd53.css?v4.0.1">
  <link rel="stylesheet" href="../global/vendor/flag-icon-css/flag-icon.minfd53.css?v4.0.1">
  <link rel="stylesheet" href="../global/vendor/waves/waves.minfd53.css?v4.0.1">

  <link rel="stylesheet" href="../global/fonts/material-design/material-design.minfd53.css?v4.0.1">
  <link rel="stylesheet" href="../global/fonts/brand-icons/brand-icons.minfd53.css?v4.0.1">

  <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,700">
  <link rel='stylesheet' href="https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../global/vendor/toastr/toastr.minfd53.css">


 <!-- multi-select -->
  <link rel="stylesheet" href="../global/vendor/multi-select/multi-select.minfd53.css">
  <!-- Page -->
  <link rel="stylesheet" href="../assets/examples/css/advanced/toastr.minfd53.css">
  <link rel="stylesheet" href="../assets/css/custom-toast.css">
  

  <style type="text/css">
    .page{margin-top: 34px;}
  </style>

  <!--[if lt IE 9]>
    <script src="../global/vendor/html5shiv/html5shiv.min.js?v4.0.1"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="../global/vendor/media-match/media.match.min.js?v4.0.1"></script>
    <script src="../global/vendor/respond/respond.min.js?v4.0.1"></script>
    <![endif]-->

  <!-- Scripts -->
  <script src="../global/vendor/breakpoints/breakpoints.minfd53.js?v4.0.1"></script>

      <!-- Sweet Alert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <script>
    Breakpoints();
  </script>
</head>