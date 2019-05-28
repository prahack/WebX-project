<?php include('server.php'); ?>

<html>
<head>
    <title>User Registration System</title>
    <link rel="stylesheet" href="register.css">
</head>
<body style="background:url(images/bg1.jpg);background-repeat:no-repeat;background-size:100% ">
<div class="topic">
    <h1>EM-ployer</h1>
    </div>
    <div class="headerReg">
    <h2>Register</h2>
    </div>
    <form method="post" action="register.php" enctype="multipart/form-data">
        <?php include('errors.php'); ?>
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
        </div>

        <div class="input-group">
            <label>Phone</label>
            <input type="tel" pattern="[0]{1}[0-9]{9}" name="phone" >
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group1">
            <select name="type" id="dropdown">
                <option>Select Type</option>
                <option value="developer">Developer</option>
                <option value="client">Client</option>
            </select>

            <select name="field" id="developerDropdown">
                <option>Select Field</option>
                <option value="AndroidDeveloper">Android-Developer</option>
                <option value="graphicDesigner">Graphic-Designer</option>
                <option value="iOSDeveloper">iOS-Developer</option>
            </select>
        </div>
        <div class="input-group">
            <label>Profile Photo</label>
            <input type="file" name="file">
        </div>
        

        <div class="input-group">
            <button type="submit" name="register" class="btn">Register</button>
        </div>
        <p>
        Already a member? <a href="login.php">Sign in</a>
        </p>
    </form>
    <footer>
        <p>
            WebX | Moratuwa | 2 729 729
        </p>
    </footer>
</body>
</html>


<script>
 document.getElementById("developerDropdown").style.display="none";
 document.getElementById("dropdown").addEventListener('change',notify);
  
  function notify(event){
    var selected = document.getElementById("dropdown");
    var selectedType = selected.options[selected.selectedIndex].text;
    if (selectedType=="Developer"){
        document.getElementById("developerDropdown").style.display="initial";
     
 }
    else{
        document.getElementById("developerDropdown").style.display="none";
    }
  }


</script>