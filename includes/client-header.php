<?php include('server.php');
  if(empty($_SESSION['username'])){
    header('location:login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
<!--link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />

    <link rel="shortcut icon" href="favicon2.ico" type="image/x-icon"!-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web-X project</title>
    <link rel="stylesheet" href="header.css">
</head>
<body>

    <?php if(isset($_SESSION['success'])): ?>
      
          <?php
            //echo $_SESSION['success'];
            unset($_SESSION['success']);
          ?>
        
    <?php endif ?>

<div class="header">
  <h1>Connect-in</h1>
</div>
<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="Android-development.php">Android Developing</a>
  <a href="Graphic-designing.php">Graphic Designing</a>
  <a href="IOs-developing.php">iOS Developing</a>
  <a href="Website-developing.php">Website Developing</a>
  <a href="Video-editing.php">Video Editing</a>
  <?php if(isset($_SESSION['username'])): ?>
    <a class="active" href="index.php?logout='1'" style="background-color:#ff6666; float:right; color:white;">Logout</a>
  <?php endif ?>
  <a href="client-profile.php" style="float:right">Profile</a>
  <a href="request_box.php" style="float:right">My Requests</a>
</div>
