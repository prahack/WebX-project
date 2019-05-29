<?php  session_start(); 
  require_once ('class.Database.php');
?>
<!--php require_once('project/inc/connection.php'); ?--->
<!--?php require_once('project/inc/functions.php'); ?-->
<?php
$d_email=$_GET['email'];
?>
<?php 
	//checking if a user is logged in
	if (!isset($_SESSION['username'])){
		header('Location: index.php');
    }
	$user_list = '';
    //getting the list of users
    $email=$d_email;
    $query = "SELECT * FROM client WHERE email= '{$email}' LIMIT 1";
    $db = Database::getInstance();
    $connection = $db->getConnection();
    $result_set = mysqli_query($connection,$query);
    //$query1= "SELECT * FROM users WHERE email= '{$email}' LIMIT 1";
    //$result_set1 = mysqli_query($connection,$query1);
    //verify_query($result_set);
    $user= mysqli_fetch_assoc($result_set);
    $name = $user['username'];
    $email = $user['email'];
    
    //$user = mysqli_fetch_assoc($result_set);
    $phone = $user['phone'];
    
    //$LinkedLink = $user['linkedin'];
    $ranking =(int) $user['ranking'];
    //$image = '<img src = "data:image/jpeg;base64,'.base64_encode($user['Profile_Photo']).'" height="200" width = "200"/>';
    //$_SESSION['developer_name']=$name;
    //$_SESSION['developer_email']=$email;

    $sss="";
        $i = 1;
        while($i <= $ranking){
            $i++;
            $sss.="<span style='font-size:50px;'>&#9733;</span>";
}

	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View Profile</title>

    <link rel="stylesheet" href="profile.css">
</head>
<body>
	<header>
		<div class="appname">i-Connect</div>
		<div class="loggedin">Welcome <?php echo $_SESSION['username'];?>! <a href="login.php">Log Out</a></div>
	</header>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                        <img src="profilePic.jpg" alt=""/>
                            <!--?php echo $image?>-->
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $name;?>
                                    </h5>
                                    
                                    <p class="proile-rating">RANKINGS : <span><?php echo $sss ?></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" id="about">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item" id="timeline">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $email ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo  $name ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $email ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $phone ?></p>
                                            </div>
                                        </div>
                                        
                                        </div>
                            </div>
               
                        </div>
                    </div>
                </div>
            </form>           
        </div>
</body>
</html>


<script>
 
 document.getElementById("timeline").addEventListener('click',notify);
  
  function notify(event){
    alert("798687576");
  }

</script>