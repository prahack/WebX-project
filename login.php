<?php include('server.php') ?>

<html>
<head>
    <title>User Registration System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="background:url(images/bg1.jpg);background-repeat:no-repeat;background-size:100%;">
    <div class="topic">
    <h1>EM-ployer</h1>
    </div>
    <div class="row">
    <div class="column">
        <div class="header0">
        <h1>
            For Developers
        </h1>
        <hr>
        <br>
        <div class="intro">
        <p>Choose a professional and friendly photo.</p>
        <p>Keep your title short and sweet.</p>
        <p>Showcase your experties in the overview section.</p>
        <p>Make your skills section work for you.</p>
        <p>Tell your story by showing your best work in your portfolid.</p>
        <p>Link other accounts to your profile.</p>
        <p>Show off your previous success stories in your employment history.</p>
        <br>
        </div>
        </div>
        <br>
        <div class="header0">
        <h1>
            For Clients
        </h1>
        <hr>
        <br>
        <div class="intro">
        <p>Plan the attendees.</p>
        <p>Begin with instroduction.</p>
        <p>Give an over view of the project.</p>
        <p>Take the time to talk tech and ask questions.</p>
        <p>Find out what the developer needs from you.</p>
        <br>
        </div>
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