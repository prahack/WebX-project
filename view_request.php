<?php
session_start();
$Islogged=false;
if (isset($_SESSION['email'])){
    $Islogged=true;
    $type=$_SESSION['userType'];
$username=$_SESSION['username'];
} 
  require_once ('class.Database.php');
  require_once ('class.Request.php');
  require_once ('class.PendingState.php');
  require_once ('class.ConfirmState.php');
  require_once ('class.FinishState.php');
  require_once ('class.CancelState.php');
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

<head>
    <meta charset="UTF-8">
    <meta name="description" content="uza - Model Agency HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Web-X project</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <!-- ***** Top Search Area Start ***** -->
    <div class="top-search-area">
        <!-- Search Modal -->
        <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- Close Button -->
                        <button type="button" class="btn close-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        <!-- Form -->
                        <form action="index.php" method="post">
                            <input type="search" name="top-search-bar" class="form-control" placeholder="Search and hit enter...">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Top Search Area End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="uzaNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="index.php"><img src="./img/core-img/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul id="nav">
                                <li><a href="./index.php">Home</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="./index.php">- Home</a></li>
                                        <li><a href="./start-exploring.php">- Start Exploring</a></li>
                                        <li><a href="./about.php">- About</a></li>
                                        <li><a href="./services.php">- Services</a></li>
                                        <li><a href="#">- Developer List</a>
                                            <ul class="dropdown">
                                                <li><a href="./allDevelopers.php">- All Developers</a>
                                                    <ul class="dropdown">
                                                        <li><a href="./android.php">- Android Developing</a></li>
                                                        <li><a href="./graphic.php">- Graphic Designing</a></li>
                                                        <li><a href="./ios.php">- iOS Developing</a></li>
                                                        <li><a href="./website.php">- Website Developing</a></li>
                                                        <li><a href="./video.php">- Video Editing</a></li>
                                                    </ul>
                                                </li>
                                                <!--li><a href="#">- Dropdown Item</a></li>
                                                <li><a href="#">- Dropdown Item</a></li-->
                                            </ul>
                                        </li>
                                        <li><a href="./portfolio.php">- Portfolio</a></li>
                                       
                                    </ul>
                                </li>
                                <!--li><a href="./portfolio.php">Portfolio</a></li-->
                                <li><a href="./about.php">About</a></li>
                                <li><a href="#">DeveloperList</a>
                                    <ul class="dropdown">
                                        <li><a href="./allDevelopers.php">- All Developers</a></li>
                                        <li><a href="./android.php">- Android Developing</a></li>
                                        <li><a href="./graphic.php">- Graphic Designing</a></li>
                                        <li><a href="./ios.php">- iOS Developing</a></li>
                                        <li><a href="./website.php">- Website Developing</a></li>
                                        <li><a href="./video.php">- Video Editing</a></li>
                                    </ul>
                                </li>
                              
                            </ul>

                            <!-- Profile -->
                            <div class="get-a-quote" <?php if(!$Islogged){
                                echo"style='display:none'";
                            }?>>
                                <a href="./<?php echo $type?>-profile.php" class="btn uza-btn">Profile </a>
                            </div>

                            <!-- Login / Register -->
                            <div class="login-register-btn mx-3" <?php if($Islogged){
                                echo "style='display:none'";
                            }?>>
                                <a href="login.php">Login<i class="icon_lock-open_alt"></i></a>    
                            </div>
                            <div class="login-register-btn mx-3" <?php if($Islogged){
                                echo"style='display:none'";
                            }?>>
                                <a href="register.php">Register<i class="icon_gift_alt"></i></a>
                            </div>

                            <div class="login-register-btn mx-3" <?php if(!$Islogged){
                                echo"style='display:none'";
                            }?>>
                                <a href="logout.php">LogOut<i class="icon_lock_alt"></i></a>
                            </div>

                            <!-- Search Icon -->
                            <div class="search-icon" data-toggle="modal" data-target="#searchModal">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
            <?php
            if($Islogged){
                echo "<p style='text-align:right'>";
                echo "<font size='4' color='#6666ff'>";
                echo "you logged in as :  ";
                echo "<b>";
                echo $username;
                echo "</b></p>";
            }
            ?>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    
<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h4 class="title" position="centre">My Request Box</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">My Request Box</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Curve -->
        <div class="breadcrumb-bg-curve">
            <img src="./img/core-img/curve-5.png" alt="">
        </div>
    </div>
    <!-- ***** Breadcrumb Area End ***** -->

    <!-- ***** Request Box Area Start ***** -->
    <div class="post-content text-center mb-50">
        <h2>All requests I received</h2>
        <h5>Requests will auto cancelled after 24 hours</h5>
    </div>
            <?php
            $query = "SELECT * FROM objreq ";
            $db = Database::getInstance();
            $connection = $db->getConnection();
            $result_set = mysqli_query($connection,$query);
            if(mysqli_num_rows($result_set)==0){
                echo"<h5><center><font size='6' color=#d6d6c2>";
                echo"No requests yet &#9785;";
                echo"</font></center></h5>";
            }
            $list=array();
            while($row=mysqli_fetch_array($result_set,MYSQLI_ASSOC)){
                array_push($list,$row);
            }
            $result_set=array_reverse($list);
            echo "<div class='uza-blog-area section-padding-80'>";
            echo "<div class='container'>";
            echo "<div class='row'>";
            foreach ($result_set as $row){
                $req=unserialize($row['req']);
                if ($req->getDevEmail()==$email){
                    //echo $req->getClientEmail();
                    $c_email=$req->getClientEmail();
                    echo "<div class='col-12 col-lg-4'>";
                        echo "<div class='single-blog-post bg-img mb-80' style='background-image: url(./img/bg-img/8.jpg);'>";
                            echo "<div class='post-content'>";
                                echo "<a href='view_client_profile.php?email=$c_email'>";
                                echo "<span class='post-date'><span>";
                                    echo $req->getClientName();
                                    echo "</span>";
                                    echo "</a>";
                                    echo "<span class='post-date'><span>";
                                    echo "";
                                    echo "</span>";
                                    echo "A client";
                                    echo "</span>";
                                    echo "<a href='#' class='post-title'>";
                                    echo "client's Email : ";
                                    echo $req->getClientEmail();
                                    echo "</a>";
                                    echo "<p>";
                                    echo "Description : ";
                                    echo $req->getDescription();
                                    echo "</p>";
                                    echo "<p>";
                                    echo "Duration       :";
                                    echo $req->getDuration();
                                    echo "</p>";
                                    echo "<p>";
                                    echo "Request in ";
                                    echo $req->getRTime();
                                    echo "</p>";
                            //echo time()-($req->getTimeStamp());
                            if((time()-($req->getTimeStamp()))>86400 and $req->returnState()->getState()=='pending'){
                                $id=$row['id'];
                                $req->setState(new CancelState());
                                $req=serialize($req);
                                $q1="UPDATE objreq
                                SET req = '{$req}'
                                WHERE id='{$id}'";
                                mysqli_query($connection,$q1);
                            }
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
                                echo "<option>Rate Client</option>";
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
                    echo "</div>";
                echo "</div>";
            }}
            echo "</div>";
        echo "</div>";
        echo "</div>";
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
                    //print($n);
                    $req->setState(new ConfirmState());
                    $req=serialize($req);
                    $q1="UPDATE objreq
                    SET req = '{$req}'
                    WHERE id='{$x}'";
                    mysqli_query($connection,$q1);
                    //header("Refresh:0");
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
                   // header("Refresh:0");
                }
                $n=$row['id']."co";
                if(isset($_POST[$n])){
                    //print($n);
                    $req->setState(new FinishState());
                    $req=serialize($req);
                    $q1="UPDATE objreq
                    SET req = '{$req}'
                    WHERE id='{$x}'";
                    mysqli_query($connection,$q1);
                    //header("Refresh:0");
                }
                if(isset($_POST[$x])){
                    $rating='';
                    //print($x);
                    $rating=mysqli_real_escape_string($connection,$_POST['rate']);
                    echo $rating;
                    if($rating=='Rate Developer'){
                        //print('xxx');
                    }else{
                    $req->setClientRating($rating);
                    $req=serialize($req);
                    $q1="UPDATE objreq
                    SET req = '{$req}'
                    WHERE id='{$x}'";
                    mysqli_query($connection,$q1);
                    //header("Refresh:0");
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
     <!-- ***** Request Box Area End ***** -->
<!-- ***** Footer Area Start ***** -->
<footer class="footer-area section-padding-80-0">
        <div class="container">
            <div class="row justify-content-between">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">Contact Us</h4>

                        <!-- Footer Content -->
                        <div class="footer-content mb-15">
                            <h3>2 729 729</h3>
                            <p>University of Moratuwa <br> connectin@gmail.com</p>
                        </div>
                        <p class="mb-0">Mon - Fri: 9:00 - 19:00 <br>
                            Closed on Weekends</p>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">Quick Link</h4>

                        <!-- Nav -->
                        <nav>
                        <ul class="our-link">
                                <li><a href="about.php">About Us</a></li>
                                <li <?php if($Islogged){
                                echo "style='display:none'";
                            }?>><a href="register.php">Forum Registeration</a></li>
                                <li <?php if($Islogged){
                                echo "style='display:none'";
                            }?>><a href="login.php">Forum LogIn</a></li>
                            <li <?php if(!$Islogged){
                                echo"style='display:none'";
                            }?>><a href="logout.php">LogOut</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">Resources</h4>

                        <!-- Nav -->
                        <nav>
                            <ul class="our-link">
                                <li><a href="#">Customer Support</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Media &amp; Press</a></li>
                                <li><a href="#">Our Team</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-80">
                        <!-- Widget Title -->
                        <h4 class="widget-title">About Us</h4>
                        <p>We are a resourcefull team who interested to working with teams.</p>

                        <!-- Copywrite Text -->
                        <div class="copywrite-text mb-30">
                            <p>&copy; Copyright 2019 <a href="#">Web-X team</a>.</p>
                        </div>

                        <!-- Social Info -->
                        <div class="footer-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>
                </div>

            </div>

 <div class="row" style="margin-bottom: 30px;">
                
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved<i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://Web-X.com" target="_blank">Web-X</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>

        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- ******* All JS Files ******* -->
    <!-- jQuery js -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js -->
    <script src="js/uza.bundle.js"></script>
    <!-- Active js -->
    <script src="js/default-assets/active.js"></script>

</body>

</html>