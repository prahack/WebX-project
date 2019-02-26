<?php include('server.php') ?>

<html>
<head>
    <title>User Registration System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background:url(images/bg1.jpg);background-repeat:no-repeat;background-size:100%">
    <div class="row">
    <div class="column">
        <div class="header0">
        <h1>
            For Developers
        </h1>
        <p>
            
        </p>
        </div>
        <br>
        <div class="header0">
        <h1>
            For Clients
        </h1>
        </div>
    </div>
    
    <div class="column">
    <div class="header">
    <h2>Login</h2>
    </div>
    <form method="post" action="login.php">
    <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <div class="input-group">
            <button type="submit" name="login" class="btn">Login</button>
        </div>
        <p>
        Not yet a member? <a href="register.php">Sign up</a>
        </p>
    </form>
    </div>
    </div>
    </div>
    <br>
    <footer>
        <p>
            WebX | Moratuwa | 2 729 729
        </p>
    </footer>
</body>
</html>