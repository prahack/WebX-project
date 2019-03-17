
<?php
    session_start();
    $ID=$_SESSION['id'];
    echo $ID;
    
    $username="";
    $email="";
    $errors=array();
    $type="";
    $db=mysqli_connect('localhost','root','','register');



    $query = "SELECT * FROM developer WHERE id= '{$ID}' LIMIT 1";
   
	$result_set = mysqli_query($db,$query);
    $user = mysqli_fetch_assoc($result_set);
    $username = $user['Name'];
    $email = $user['Email'];
    
    $password=$user['Password'];
    $Phone=$user['Phone'];













    if (isset($_POST['update'])){
        
        $username=mysqli_real_escape_string($db,$_POST['username']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $password_1=mysqli_real_escape_string($db,$_POST['password_1']);
        $password_2=mysqli_real_escape_string($db,$_POST['password_2']);
        $Phone=mysqli_real_escape_string($db,$_POST['Phone']);

        if($password_1==null){
            $password_1=$password;
        }
        //$type=mysqli_real_escape_string($db,$_POST['type']);
        
        $query1="UPDATE developer
        SET Name = '{$username}', Email = '{$email}', Password='{$password_1}', Phone='{$Phone}'
        WHERE id='{$ID}'";

        

        $result1=mysqli_query($db,$query1);
        if (!$result1){
            echo "update fail";
        }
        header('location: profile.php');
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
    <h2>Update your profile</h2>
    </div>
    <form method="post" action="edit-profile.php">
        
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value=<?php echo $username; ?>>
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="text" name="email" value=<?php echo $email; ?>>
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm Password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <label>Phone</label>
            <input type="text" name="Phone" value=<?php echo $Phone;?>>
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