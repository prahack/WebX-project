
<?php
    session_start();
    $username="";
    $email="";
    $errors=array();
    $type="";
    $db=mysqli_connect('localhost','Prabhanu','12345','registration');
    if (isset($_POST['register'])){
        $username=mysqli_real_escape_string($db,$_POST['username']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $password_1=mysqli_real_escape_string($db,$_POST['password_1']);
        $password_2=mysqli_real_escape_string($db,$_POST['password_2']);
        $type=mysqli_real_escape_string($db,$_POST['type']);
        
        $query1="SELECT * FROM users WHERE email='$email'";
        $result1=mysqli_query($db,$query1);

        if(mysqli_num_rows($result1)>0){
            array_push($errors,"E-mail is already exist.Use another e-mail and try");
        }
        if(empty($username)){
            array_push($errors,"User name is required");
        }
        if(empty($email)){
            array_push($errors,"User email is required");
        }
        if(empty($password_1)){
            array_push($errors,"Password is required");
        }
        if($password_1 != $password_2){
             array_push($errors,"two passwords are not match");
        }
        if($type=="Select Type"){
            array_push($errors,"select the type of user");
        }
        if(count($errors)==0){
            $password=md5($password_1);
            $sql="INSERT INTO users (username,email,password,type) VALUES('$username','$email','$password','$type')";
            mysqli_query($db,$sql);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
        }
    }
    //log user in from login page
    if(isset($_POST['login'])){
        $username=mysqli_real_escape_string($db,$_POST['username']);
        $password=mysqli_real_escape_string($db,$_POST['password']);

        if(empty($username)){
            array_push($errors,"User name is required");
        }
        if(empty($password)){
            array_push($errors,"Password is required");
        }
        if(count($errors)==0){
            $password=md5($password);
            $query="SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result=mysqli_query($db,$query);
            if(mysqli_num_rows($result)==1){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location: index.php');
            }else{
                array_push($errors,"wrong username or password");
                //header('location:login.php');
            }
        }
    }


    //logout
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location:login.php');
    }

?>