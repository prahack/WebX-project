
<?php
    session_start();
    require_once ('class.Database.php');
    require_once ('class.user.php');
    require_once ('class.hashlist.php');
    require_once ('class.DeveloperAccount.php');
    require_once ('class.ClientAccount.php');
    require_once ('class.Request.php');
    require_once ('class.PendingState.php');
    require_once ('class.State.php');


    $username="";
    $email="";
    $errors1=array();
    $type="";
    $db = Database::getInstance();
    $connection = $db->getConnection();

    if (isset($_POST['register'])){
        $username=mysqli_real_escape_string($connection,$_POST['username']);
        $email=mysqli_real_escape_string($connection,$_POST['email']);
        $password_1=mysqli_real_escape_string($connection,$_POST['password_1']);
        $password_2=mysqli_real_escape_string($connection,$_POST['password_2']);
        $type=mysqli_real_escape_string($connection,$_POST['type']);
        $imageName=$_FILES["image"]["name"];
        $filename=file_get_contents($_FILES["image"]["tmp_name"]);

        
        $query1="SELECT * FROM client WHERE email='$email'";
        $result1=mysqli_query($connection,$query1);

        if(mysqli_num_rows($result1)>0){
            array_push($errors1,"E-mail is already exist.Use another e-mail and try");
        }
        if(empty($username)){
            array_push($errors1,"User name is required");
        }
        if(empty($email)){
            array_push($errors1,"User email is required");
        }
        if(empty($password_1)){
            array_push($errors1,"Password is required");
        }
        if($password_1 != $password_2){
             array_push($errors1,"two passwords are not match");
        }
        if($type=="Select Type"){
            array_push($errors1,"select the type of user");
        }
        if(count($errors1)==0){
            
            $password=md5($password_1);
            if($type=="developer"){
                $sql="INSERT INTO developer (username,email,password) VALUES('$username','$email','$password')";
                mysqli_query($db,$sql);
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['type'] = $type;
                $_SESSION['success'] = "You are now logged in";
                
               header('location: developer-profile.php');
            }
            else{
                $sql="INSERT INTO client (username,email,password) VALUES('$username','$email','$password')";
                mysqli_query($connection,$sql);
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['type'] = $type;
                $_SESSION['success'] = "You are now logged in";
                header('location: index.php');
            }
   
        }
    }
    //log user in from login page
    if(isset($_POST['login'])){
        $email=mysqli_real_escape_string($connection,$_POST['email']);
        $password=mysqli_real_escape_string($connection,$_POST['password']);

        if(empty($email)){
            array_push($errors1,"E-mail name is required");
        }
        if(empty($password)){
            array_push($errors1,"Password is required");
        }
        if(count($errors1)==0){
            $password=md5($password);
            $query1="SELECT * FROM client WHERE email='$email' AND password='$password'";
            $result1=mysqli_query($connection,$query1);
            $query2="SELECT * FROM developer WHERE email='$email' AND password='$password'";
            $result2=mysqli_query($connection,$query2);
            if(mysqli_num_rows($result1)==1){
                $user = mysqli_fetch_assoc($result1);

                $client=new ClientAccount($user['username'],$user['email'],$user['password'],"client");

                //$_SESSION['username'] = $user['username'];
                $_SESSION['username']=$user['username'];
                $_SESSION['email'] =$email;
                $_SESSION['c'] =$client->getName();
                //echo $client->getName();
                $_SESSION['success'] = "You are now logged in";
                $user11 = new User($user['username']);
                HashList::setUsers($user11,$email);

                header('location: index.php');
            }
            if(mysqli_num_rows($result2)==1){
                $user = mysqli_fetch_assoc($result2);
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['success'] = "You are now logged in";
                
                header('location: developer-profile.php');
            } 
            else{
                array_push($errors1,"wrong username or password");
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

    //shashini 
    $clientName="";
    $clientEmail="";
    $devName="";
    $devEmail="";
    $description="";
    $errors=array();
    $deuration="";
    $reqType="";
   
    if (isset($_POST['request'])){
        $clientName=mysqli_real_escape_string($connection,$_POST['clientsName']);
        $clientEmail=mysqli_real_escape_string($connection,$_POST['clientsEmail']);
        $devName=mysqli_real_escape_string($connection,$_POST['developersName']);
        $devEmail=mysqli_real_escape_string($connection,$_POST['developersEmail']);
        $description=mysqli_real_escape_string($connection,$_POST['description']);;
        $deuration=mysqli_real_escape_string($connection,$_POST['period']);;
        $reqType=mysqli_real_escape_string($connection,$_POST['type']);
        

        if(empty($clientName)){
            array_push($errors,"Client's name is required");
        }
        if(empty($clientEmail)){
            array_push($errors,"Client's email is required");
        }
        if(empty($devName)){
            array_push($errors,"Developer's name is required");
        }
        if(empty($devEmail)){
             array_push($errors,"Developer's email is required");
        }
        if(empty($description)){
            array_push($errors,"description is required");
        }
        if(empty($deuration)){
            array_push($errors,"duration is required");
        }
        if($reqType=="Select Type of the project"){
            array_push($errors,"type of the project is required");
        }
        if(count($errors)==0){
            $request=new Request(1,$clientEmail,$clientName,$devEmail,$devName,$deuration,$description);
            $req=serialize($request);
            $sql0="INSERT INTO objreq (req) VALUES('$req')";
            $cn=$request->getClientName();
            $sql="INSERT INTO requests (clients_name,clients_email,developers_name,developers_email,description,duration,type) VALUES('$cn','$clientEmail','$devName','$devEmail','$description','$deuration','$reqType')";
            mysqli_query($connection,$sql);
            mysqli_query($connection,$sql0);
            header('location: request_box.php');
        }
    }

?>