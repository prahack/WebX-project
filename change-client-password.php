
<?php
    session_start();
    $c_email=$_SESSION['email'];
   
    
    
    $username="";
    $email="";
    $errors=array();
    $type="";
    $db=mysqli_connect('localhost','root','','registration');



    $query = "SELECT * FROM client WHERE email= '{$c_email}' LIMIT 1";
   
	$result_set = mysqli_query($db,$query);
    $user = mysqli_fetch_assoc($result_set);
    $username = $user['username'];
    $email = $user['email'];
    
    $password=$user['password'];
    $Phone=$user['phone'];













    if (isset($_POST['submit'])){
        
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $password=mysqli_real_escape_string($db,$_POST['newpassword']);
       $hashed_password=md5($password);

        
        //$type=mysqli_real_escape_string($db,$_POST['type']);
        
        $query="UPDATE client
        SET  password='{$hashed_password}'
        WHERE email='{$email}'";

        

        $result=mysqli_query($db,$query1);
        if (!$result){
            echo "password update fail";
        }
        header('location: client-profile.php');
        }
        
    
    

?>















<html>
<head>
    <title>Updating System</title>
    <link rel="stylesheet" href="register.css">
</head>
<body style="background:url(images/bg1.jpg);background-repeat:no-repeat;background-size:100% ">
<div class="topic">
    <h1>EM-ployer</h1>
    </div>
    <div class="headerReg">
    <h2>Change Password</h2>
    </div>
    <form method="post" action="change-password.php">
    <div class="input-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $c_email?>">
            
        </div>
        <div class="input-group">
            <label>Current Password</label>
            <input type="password" name="currentpassword" id="">
        </div>
        
        <div class="input-group">
            <label for="">New Password</label>
            <input type="password" name="newpassword" id="">
        </div>
  
        <div class="input-group">
            <label>&nbsp;</label>
            <input type="submit" name="submit" value="Submit" class="btn">
        </div>
        
        
        

    </form>
    <footer>
        <p>
            WebX | Moratuwa | 2 729 729
        </p>
    </footer>
</body>
</html>