<?php include('server.php');
    if(empty($_SESSION['username'])){
        header('location:login.php');
    }

?>
<?php include('includes/header.php');?>
<html>
<head>
    <title>User Registration System</title>
    <link rel="stylesheet" href=css\style.css>
</head>
<body style="background:url(images/2.png);background-repeat:no-repeat;background-size:100% 100%">
    
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
</body>
</html>
<?php include('includes/footer.php');?>