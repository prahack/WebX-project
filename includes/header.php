<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Site Title</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header><h1>website name</h1></header>
    <nav>
        <ul class="topnav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="Android-development.php">Android Developing</a></li>
            <li><a href="Graphic-designing.php">Graphic Designing</a></li>
            <li><a href="IOs-developing.php">iOS Developing</a></li>
            <li><a href="Website-developing.php">Website Developing</a></li>
            <li><a href="Video-editing.php">Video Editing</a></li>
            <?php if(isset($_SESSION['username'])): ?>
            <li style="float:right"><a class="active" href="index.php?logout='1'" style="color:white;">Logout</a></li>
            <?php endif ?>
        </ul>
    </nav>