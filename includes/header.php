<?php include('server.php');
  if(empty($_SESSION['username'])){
    header('location:login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Site Title</title>
    <link rel="stylesheet" href="header.css">
</head>
<body>
<div class="content">
    <?php if(isset($_SESSION['success'])): ?>
      <div class="error success">
        <h3>
          <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>
</div>
<div class="header">
  <h1>Web-X Developments :)</h1>
</div>
<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="Android-development.php">Android Developing</a>
  <a href="Graphic-designing.php">Graphic Designing</a>
  <a href="IOs-developing.php">iOS Developing</a>
  <a href="Website-developing.php">Website Developing</a>
  <a href="Video-editing.php">Video Editing</a>
  <?php if(isset($_SESSION['username'])): ?>
    <a class="active" href="index.php?logout='1'" style="background-color:#ff6666; float:right; color:red;">Logout</a>
  <?php endif ?>
</div>
