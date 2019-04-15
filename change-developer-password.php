
<?php
    require_once ('class.Database.php');
    $d_email=$_GET['email'];
    $errors=array();
    $errors1=array();
    $type="";
    
    $db = Database::getInstance();
    $connection = $db->getConnection();



    $query = "SELECT * FROM developer WHERE email= '{$d_email}' LIMIT 1";
   
	$result_set = mysqli_query($connection,$query);
    $user = mysqli_fetch_assoc($result_set);
   
    $email = $user['email'];
    
    $password=$user['password'];
  
   

    if (isset($_POST['submit'])){
        $currentpassword=mysqli_real_escape_string($connection,$_POST['currentpassword']);
        $currentpassword=md5($currentpassword);
        $password1=mysqli_real_escape_string($connection,$_POST['newpassword1']);
        $password2=mysqli_real_escape_string($connection,$_POST['newpassword2']);


        if ($password==$currentpassword){
            if($password1==$password2){
                $hashed_password=md5($password2);
                $query1="UPDATE developer
                SET  password='{$hashed_password}'
                WHERE email='{$email}'";
                
                $result1=mysqli_query($connection,$query1);
                if (!$result1){
                    array_push($errors,"Password update fail!");
                }
                else{
                    header('location: developer-profile.php');
                }
            }
            else{
                array_push($errors,"two passwords are not match");
            }
        
        }
        else{
            array_push($errors, "current password is invalid");
        }
       
    
      
    }
        
        
        
    
    

?>















<!DOCTYPE html>
<html lang="en">
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
    <form method="post" action="change-developer-password.php?email=<?php echo $d_email ?>">
    <?php include('errors.php'); ?>
    
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