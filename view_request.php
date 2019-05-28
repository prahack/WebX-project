<?php include('server.php'); 
  require_once ('class.Database.php');
  require_once ('class.Request.php');
  require_once ('class.PendingState.php');
  require_once ('class.ConfirmState.php');
  require_once ('class.FinishState.php');

?>
<?php 
	//checking if a user is logged in
	if (!isset($_SESSION['username'])){
		header('Location: index.php');
    }

    $email=$_SESSION['email'];
    $username=$_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view_request.css">
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top"> <i class="far fa-hand-point-up"></i></button>
    
<header>
<button class="button" style="vertical-align:middle; float:right;"><span><a href="developer-profile.php?" style= "float:right;">Back</a>
</span></button></header>
    <div class="main">
        <h1>Requests</h1>
            <?php
            $query = "SELECT * FROM objreq ";
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
                if ($req->getDevEmail()==$email){
                    //echo $req->getClientEmail();
                $c_email=$req->getClientEmail();
                echo "<div class='raw'>";
                    echo "<div class='column'>";
                        echo "<div class='card'>";
                            echo "<p>";
                            echo "Client's Name  : ";
                            echo "<a href='view_profile.php?email=$c_email'>";
                            echo $req->getClientName();
                            echo "</a></p>";
                            echo "<p>";
                            echo "Client's Email : ";
                            echo $req->getClientEmail();
                            echo "</p>";
                            echo "<p>";
                            echo "Discription    : ";
                            echo $req->getDescription();
                            echo "</p>";
                            echo "<p>";
                            echo "Duration       :";
                            echo $req->getDuration();
                            echo "</p>";
                            echo "<p>";
                            echo "Status         :";
                            if ($req->returnState()->getState()=='pending'){
                                //echo gettype($row["id"]);
                                //echo $row['id'];
                                $num=$row['id']."cn";
                                $num1=$row['id']."c";
                                echo "<form name='row' action='view_request.php' method=post>";
                                echo "<input type='submit' id=$num name=$num value='Confirm' href='javascript:location.reload()' href='javascript:location.reload()'/>";
                                echo "<input type='submit' id=$num1 name=$num1 value='Cancel'/>";
                                echo "</form>";
                                //echo "if(isset($_POST[$num])){";
                                    //echo "print($num);";
                                //echo "}";
                            // echo "<input type='submit' id='btn1' name= value='Cancel'/>";
                            }else if($req->returnState()->getState()=='confirmed'){ 
                                $num=$row['id']."co";
                                echo "<form name='row' action='view_request.php' method=post>";
                                echo "<input type='submit' id=$num name=$num value='Finish' href='javascript:location.reload()'/>";
                                echo "</form>";
                            }else{
                                echo $req->returnState()->getState();
                            }
                            echo "</p>";
                            echo "<p>";
                            echo "Client Rating         :";
                            if($req->returnState()->getState()=='finished' and $req->getClientRating()=='not yet' ){
                                $num=$row['id'];
                                echo "<form name='row' action='view_request.php' method=post>";
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
                                echo $req->getClientRating();
                            }
                            echo "</p>";
                        echo "</div>";
                        echo "<br>";
                    echo "</div>";
                echo "</div>";
            }}
        ?>
        <?php
            $query = "SELECT * FROM objreq";
            $db = Database::getInstance();
            $connection = $db->getConnection();
            $result_set = mysqli_query($connection,$query);
            //echo gettype($result_set);
            
            //$aa=mysqli_fetch_array($result_set,MYSQLI_ASSOC);
            //$a=array(1,2,3,4,5,6);
            /*$list=array();
            while($row=mysqli_fetch_array($result_set,MYSQLI_ASSOC)){
                array_push($list,$row);
            }
            $result_set=array_reverse($list);*/
            //$b=array();

            while ($row=mysqli_fetch_array($result_set,MYSQLI_ASSOC)){
                $req=unserialize($row['req']);
                if ($req->getDevEmail()==$email){
                $x=$row['id'];
                $c="confirmed";
                $cl="canceled";
                $f="finished";
                $n=$row['id']."cn";
                if(isset($_POST[$n])){
                    print($n);
                    $req->setState(new ConfirmState());
                    $req=serialize($req);
                    $q1="UPDATE objreq
                    SET req = '{$req}'
                    WHERE id='{$x}'";
                    mysqli_query($connection,$q1);
                    header("Refresh:0");
                }
                $n=$row['id']."c";
                if(isset($_POST[$n])){
                    print($n);
                    $req->setState(new CancelState());
                    $req=serialize($req);
                    $q1="UPDATE objreq
                    SET req = '{$req}'
                    WHERE id='{$x}'";
                    mysqli_query($connection,$q1);
                    header("Refresh:0");
                }
                $n=$row['id']."co";
                if(isset($_POST[$n])){
                    print($n);
                    $req->setState(new FinishState());
                    $req=serialize($req);
                    $q1="UPDATE objreq
                    SET req = '{$req}'
                    WHERE id='{$x}'";
                    mysqli_query($connection,$q1);
                    header("Refresh:0");
                }
                if(isset($_POST[$x])){
                    $rating='';
                    print($x);
                    $rating=mysqli_real_escape_string($connection,$_POST['rate']);
                    echo $rating;
                    if($rating=='Rate Developer'){
                        print('xxx');
                    }else{
                    $req->setClientRating($rating);
                    $req=serialize($req);
                    $q1="UPDATE objreq
                    SET req = '{$req}'
                    WHERE id='{$x}'";
                    mysqli_query($connection,$q1);
                    header("Refresh:0");
                    }
                    /*$q1="UPDATE requests
                    SET status = '{$f}'
                    WHERE id='{$x}'";
                    mysqli_query($connection,$q1);*/
                }
            
            }}

            ?>
            


    </div>
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
</body>
</html>