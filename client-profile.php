<?php  session_start(); 
require_once ('class.hashlist.php');
  require_once ('class.Database.php');?>  
    
<!--php require_once('project/inc/connection.php'); ?--->
<!--?php require_once('project/inc/functions.php'); ?-->
<?php 
	//checking if a user is logged in
	if (!isset($_SESSION['username'])){
		header('Location: index.php');
	}

	$user_list = '';
    //getting the list of users
    $email=$_SESSION['email'];
   
   
    $query = "SELECT * FROM client WHERE email= '{$email}' LIMIT 1";
    $db = Database::getInstance();
    $connection = $db->getConnection();
    $result_set = mysqli_query($connection,$query);
  

    if(mysqli_num_rows($result_set)==1){
        $user = mysqli_fetch_assoc($result_set);
        $username = $user['username'];
        $email = $user['email'];
        $phone = $user['phone'];
        //$proffesion = $user['profession'];
        //$linkedin = $user['linkedIn'];
        $ranking = $user['ranking'];
        //$image = '<img src = "data:image/jpeg;base64,'.base64_encode($user['profile_photo']).'" height="200" width = "200"/>';
    }
    //verify_query($result_set);
    
  

	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Users</title>

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
                        <img src='profilePic.jpg' alt=""/>
                            <!--?php echo $image?>-->
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $username;?>
                                    </h5>
                                    
                                    <p class="proile-rating">RANKINGS : <span><?php echo $ranking ?></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                       <!--input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"  /-->
                       <button >  <a href="client-edit-profile.php">edit profile</a></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <div class="profile-work">
                            <!--<p style="color:black;font-size:19px;"><b>Description</b></p>-->
                            <p style="color:blue;font-size:15px;"></p>
                            
                        </div>
                        
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo  $username ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $email ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $phone ?></p>
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