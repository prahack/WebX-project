
<?php
    session_start();
    require_once ('class.Database.php');
    $c_email=$_GET['email'];
   
    $errors=array();
    $type="";

    $db = Database::getInstance();
    $connection = $db->getConnection();



    $query = "SELECT * FROM client WHERE email= '{$c_email}' LIMIT 1";
   
	$result_set = mysqli_query($connection,$query);
    $user = mysqli_fetch_assoc($result_set);
   
    $email = $user['email'];
    $password=$user['password'];
  


    if (isset($_POST['submit'])){
        $currentpassword=mysqli_real_escape_string($db,$_POST['currentpassword']);
        $currentpassword=md5($currentpassword);
        $password1=mysqli_real_escape_string($db,$_POST['newpassword1']);
        $password2=mysqli_real_escape_string($db,$_POST['newpassword2']);

        
        if ($password==$currentpassword){
            if($password1==$password2){
                $hashed_password=md5($password2);
                $query1="UPDATE developer
                SET  password='{$hashed_password}'
                WHERE email='{$email}'";
                
                $result1=mysqli_query($db,$query1);
                if (!$result1){
                    echo "password update fail";
                }
                else{
                    header('location: developer-profile.php');
                }
            }
            else{
                echo "not equal";
            }
        
        }
        else{
            echo "current password is invalid";
        }
    }
        
    
    

?>















<html>
<head>
    <title>Updating System</title>
    <link rel="stylesheet" href="register.css">
</head>
<body style="background:url(images/bg1.jpg);background-repeat:no-repeat;background-size:100% ">
<div class="topic">
    <h1>i-Connect</h1>
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
            <input type="password" name="currentpassword" id="" required>
        </div>
        
        <div class="input-group">
            <label for="">New Password</label>
            <input type="password" name="newpassword1" id="" required>
        </div>
        <div class="input-group">
            <label for="">Confirm New Password</label>
            <input type="password" name="newpassword2" id="" required>
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