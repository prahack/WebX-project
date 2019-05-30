<?php  session_start();
    require_once ('class.hashlist.php');
    require_once ('class.Request.php');


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
    //$userr=hashlist::getUser($email);

    $query = "SELECT * FROM developer WHERE email= '{$email}' LIMIT 1";
   
    //$connection=mysqli_connect('localhost','root','','registration');
    $db = Database::getInstance();
    $connection = $db->getConnection();
    $result_set = mysqli_query($connection,$query);
   

    if(mysqli_num_rows($result_set)==1){
        $user = mysqli_fetch_assoc($result_set);
        $username = $user['username'];
        $email = $user['email'];
        $phone = $user['phone'];
        $proffesion = $user['developer_type'];
        $linkedIn = $user['linkedIn'];
        $ranking = (int)$user['ranking'];
        $description = $user['description'];


        $query12 = "SELECT * FROM objreq";    
        $result_set12 = mysqli_query($connection,$query12);
        $resultLists123="";
        $rate=0;
        $i=0;
        //echo $d_email;
        while($r=mysqli_fetch_array($result_set12,MYSQLI_ASSOC)){
            $req=$r['req'];
            $rq=unserialize($req);
            if($rq->getDevEmail()==$email){
                //echo $rate;
                if($rq->getDevRating()!="not yet"){
                    $rate=$rate+(float)$rq->getDevRating();
                    //echo $rate;
                    $i=$i+1;
                }
            }
            //$resultLists123.="<tr>";
            //$description123=$r['description'];
            //$resultLists123.="{$description123}";
            //$resultLists123.="</tr>";
            //$resultLists123.="<br></br>";
        }
        if ($i !=0){
            $rate=round($rate/$i,0);
        }

        $sss="";
        $i = 1;
        $rate=(int)$rate;
        while($i <= $rate){
            $i++;
            $sss.="<span style='font-size:40px;'>&#9733;</span>";
}
    
$sss.=" ";
        $image = '<img src = "data:image/jpeg;base64,'.base64_encode($user['profile_photo']).'" height="200" width = "200"/>';
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
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="divide">
                       <!--input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"  /-->
                       <button class="button1" >  <a href="developer-edit-profile.php">edit profile</a></button>
                       <button class="button2" >  <a href="view_request.php">View Requests</a></button>
                    </div>
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $username;?>
                                    </h5>
                                    <h6>
                                       <?php echo  $proffesion ?>
                                    </h6>
                                    <p class="proile-rating"><b>Rating : </b><span><?php echo $sss;
                                    echo $rate;
                                    ?></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p style="color:black;font-size:19px;"><b>Description</b></p>
                            <p style="color:blue;font-size:15px;"><?php echo  $description?></p>
                            
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $proffesion ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>LinkedIn</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $linkedIn ?></p>
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