
<?php
    session_start();
    require_once ('class.Database.php');
    $email=$_SESSION['email'];
    
    
    $username="";
    
    $errors=array();
    $type="";
   



    $query = "SELECT * FROM client WHERE email= '{$email}' LIMIT 1";
    $db = Database::getInstance();
    $connection = $db->getConnection();
   
	$result_set = mysqli_query($connection,$query);
    $user = mysqli_fetch_assoc($result_set);
    $username = $user['username'];
    
   
    $email = $user['email'];
    
    $password=$user['password'];
    $phone=$user['phone'];













    if (isset($_POST['update'])){
        
        //$username=mysqli_real_escape_string($db,$_POST['username']);
        $email=mysqli_real_escape_string($connection,$_POST['email']);
        
        $phone=mysqli_real_escape_string($connection,$_POST['Phone']);


        
        //$type=mysqli_real_escape_string($db,$_POST['type']);
        
        $query1="UPDATE client
        SET username = '{$username}', email = '{$email}', phone='{$phone}'
        WHERE email='{$email}'";

        

        $result1=mysqli_query($connection,$query1);
        if (!$result1){
            echo "update fail";
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
    <h1>i-Connect</h1>
    </div>
    <div class="headerReg">
    <h2>Update your profile</h2>
    </div>
    <form method="post" action="client-edit-profile.php">
        
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value=<?php echo $username; ?>>
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="text" name="email" value=<?php echo $email; ?> readonly>
        </div>
        <div class="input-group">
            <label for="">Password</label>
            <span>*****</span>  <a href='change-client-password.php?email=<?php echo $email ?>'>Change Password</a>
        </div>
  
        <div class="input-group">
            <label>Phone</label>
            <input type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="Phone" value=<?php echo $phone;?>>
        </div>
        
        <div class="input-group">
            <input type="submit" name="update" value="Update" class="btn">
        </div>
        

    </form>
    <footer>
        <p>
            WebX | Moratuwa | 2 729 729
        </p>
    </footer>
</body>
</html>