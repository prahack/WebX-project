<?php include('includes/client-header.php');
  require_once ('class.Database.php');
  require_once ('class.CancelState.php');
  require_once ('class.Request.php');
  require_once ('class.FinishState.php');
  require_once ('class.ConfirmState.php');
  date_default_timezone_set("Asia/Colombo");
  /*echo date("M");
  echo "-";
  echo date("d")+1;
  echo "-";
  echo date("Y");
  echo " at ";
  echo date("H");
  echo ":";
  echo date("i");
  echo "H";*/
  //echo date("r");
?>
<?php 
	//checking if a user is logged in
	if (!isset($_SESSION['username'])){
		header('Location: index.php');
    }

    $email=$_SESSION['email'];
    $username=$_SESSION['username'];
    //echo $email;
?>
<!DOCTYPE html>
<html lang="en">
<xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="request_box.css">
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <main>
    <button onclick="topFunction()" id="myBtn" title="Go to top"> <i class="fas fa-arrow-up"></i></button> 
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        }
    </script>



<div>
    
        <article>
            <h1>My Request Box</h1>
            <?php
            $query = "SELECT * FROM objreq";
            $db = Database::getInstance();
            $connection = $db->getConnection();
            $result_set = mysqli_query($connection,$query);

            $list=array();
            while($row=mysqli_fetch_array($result_set,MYSQLI_ASSOC)){
                array_push($list,$row);
            }
            $result_set=array_reverse($list);

            foreach ($result_set as $row){
                $req=unserialize($row['req']);
                //$query0="SELECT * FROM users WHERE email='{$row['email']}' LIMIT 1";
                //$result_set0 = mysqli_query($connection,$query0);
                //$req = mysqli_fetch_assoc($result_set0);
                //echo $req->getCTime();
                if($req->getClientEmail()==$email){
                $d_email=$req->getDevEmail();
                echo "<div class='raw'>";
                    echo "<div class='column'>";
                        echo "<div class='card'>";
                            echo "<p>";
                                echo "Developer's Name : ";
                                echo "<a href='view_profile.php?email=$d_email'>";
                                echo $req->getDevName();
                                echo "</a>";
                            echo "</p>";
                            echo "<p>";
                                echo "Developer's Email : ";
                                echo $req->getDevEmail();
                            echo "</p>";
                            echo "<p>";
                                echo "Description : ";
                                echo $req->getDescription();
                            echo "</p>";
                            echo "</p>";
                                echo "Duration : ";
                                echo $req->getDuration();
                            echo "</p>";
                            echo "<p>";
                                echo "Status : ";
                                echo $req->returnState()->getState();
                            echo "</p>";
                            echo "<p>";
                            echo "Developer Rating         :";
                            if($req->returnState()->getState()=='finished' and $req->getDevRating()=='not yet' ){
                                $num=$row['id'];
                                echo "<form name='row' action='request_box.php' method=post>";
                                echo "<select name='rate'>";
                                echo "<option>Rate Developer</option>";
                                echo "<option value='1'>1</option>";
                                echo "<option value='2'>2</option>";
                                echo "<option value='3'>3</option>";
                                echo "<option value='4'>4</option>";
                                echo "<option value='5'>5</option>";
                                echo "</select>";
                                echo "<input type='submit' id=$num name=$num value='Rate' href='javascript:location.reload()'/>";
                                echo "</form>";
                            }else{
                                echo $req->getDevRating();
                            }
                            echo "</p>";
                            echo "<p>";
                            echo "Request will auto cancel in ";
                            echo $req->getCTime();
                            echo "</p>";
                            echo time()-($req->getTimeStamp());
                            if((time()-($req->getTimeStamp()))>600 and $req->returnState()->getState()=='pending'){
                                $id=$row['id'];
                                $req->setState(new CancelState());
                                $req=serialize($req);
                                $q1="UPDATE objreq
                                SET req = '{$req}'
                                WHERE id='{$id}'";
                                mysqli_query($connection,$q1);
                            }
                        echo "</div>";
                        echo "<br>";
                    echo "</div>";
                echo "</div>";
            }}
            echo "";
            ?>
            <?php
            $query = "SELECT * FROM objreq";
            $db = Database::getInstance();
            $connection = $db->getConnection();
            $result_set = mysqli_query($connection,$query);

            

            while ($row=mysqli_fetch_array($result_set,MYSQLI_ASSOC)){
                $req=unserialize($row['req']);
                if ($req->getClientEmail()==$email){
                    $x=$row['id'];
                    $n=$row['id']."co";
                    if(isset($_POST[$x])){
                        $rating='';
                        print($x);
                        $rating=mysqli_real_escape_string($connection,$_POST['rate']);
                        echo $rating;
                        if($rating=='Rate Developer'){
                            print('xxx');
                        }else{
                        $req->setDevRating($rating);
                        $req=serialize($req);
                        $q1="UPDATE objreq
                        SET req = '{$req}'
                        WHERE id='{$x}'";
                        mysqli_query($connection,$q1);
                        header("Refresh:0");
                        header("Refresh:0");
                    }
                }
            }}
            ?>
            </div>
        </article>
        </main>
<footer>
<p>
        WebX | Moratuwa | 2 729 729
    </p>
  <a href="about-us.php">About us</a>
</footer>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>