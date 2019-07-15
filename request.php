<?php include('server.php') ?>
<?php
$Islogged=false;
if (isset($_SESSION['email'])){
    $Islogged=true;
    $type=$_SESSION['userType'];
$username=$_SESSION['username'];
}?>
<?php 
	//checking if a user is logged in
	if (!isset($_SESSION['username'])){
		header('Location: index.php');
    }

    $email=$_SESSION['email'];
    $username=$_SESSION['username'];
    $dev_name=$_SESSION['developer_name'];
    $dev_email=$_SESSION['developer_email'];
    $project_type=$_SESSION['project_type'];
    
    //echo $_SESSION['project_type'];
?>

<?php
$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
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
    <!-- Preloader -->
    <div id="preloader">
        <div class="wrapper">
            <div class="cssload-loader"></div>
        </div>
    </div>

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
                        <h2 class="title">Send Request</h2>
                        
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

<!-- ***** Login Area Start ***** -->
<section class="uza-contact-area section-padding-80">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Contact Form -->
                <div class="col-12 col-lg-8">
                    <div class="uza-contact-form mb-80">
                        <div class="contact-heading mb-50">
                            <h4>Please fill out the form below to send request.</h4>
                        </div>
                        <form method="post" action="request.php">
                            <?php include('errors.php'); ?>
                            <div class="row">
                                <div class="col-lg-8">
                                    <label>
                                        <h6>Client's Username</h6>
                                    </label><br>
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="clientsName" value="<?php echo $username; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <label>
                                        <h6>Client's Email</h6>
                                    </label><br>
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="clientsEmail" value="<?php echo $email; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <label>
                                        <h6>Developers's Username</h6>
                                    </label><br>
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="developersName" value="<?php echo $dev_name; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <label>
                                        <h6>Developer's Email</h6>
                                    </label><br>
                                    <div class="form-group">
                                    <input type="text" class="form-control mb-30" name="developersEmail" value="<?php echo $dev_email; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <label>
                                        <h6>Description about the project</h6>
                                    </label><br>
                                    <div class="form-group">
                                    <input type="text" class="form-control mb-30" name="description">
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <label>
                                        <h6>Project Type</h6>
                                    </label><br>
                                    <div class="form-group">
                                    <input type="text" class="form-control mb-30" name="type" value="<?php echo $project_type ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <select class="form-control mb-30" name="period" class="select" >
                                        <option>Select Duration</option>
                                        <option value="3 days">3 days</option>
                                        <option value="5 days">5 days</option>
                                        <option value="1 week">1 week</option>
                                        <option value="1.5 weeks">1.5 weeks</option>
                                        <option value="2 weeks">2 weeks</option>
                                        <option value="2.5 week">2.5 weeks</option>
                                        <option value="3 weeks">3 weeks</option>
                                        <option value="3.5 weeks">3.5 weeks</option>
                                        <option value="1 month">1 month</option>
                                        <option value="1.5 months">1.5 months</option>
                                        <option value="2 months">2 months</option>
                                        <option value="3 moths">3 months</option>
                                        <option value="3 moths +">more than 3 moths</option>
                
                                    </select>
                                 </div>


                                
                                <div class="col-12">
                                    <button class="btn uza-btn btn-3 mt-15" type="submit" name="request">Submit Request</button>
                                    <button class="btn uza-btn btn-3 mt-15" type="submit" name="cancel request" ><a href="<?= $previous ?>">Cancel Request</button>
                                </div>
                            </div>
                        </form>
                      
                    </div>
                </div>

                <!-- Single Contact Card -->
                <div class="col-12 col-lg-3">
                    <div class="contact-sidebar-area mb-80">
                        <!-- Single Sidebar Area -->
                        

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Login Area End ***** -->

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