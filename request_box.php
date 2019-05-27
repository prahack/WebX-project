<?php include('includes/client-header.php');
  require_once ('class.Database.php');
  require_once ('class.Request.php');
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
</body>
</html>


<div>
    <main>
        <article>
            <h1>My Request Box</h1>
            <?php
            $query = "SELECT * FROM requests WHERE clients_email='$email'";
            $db = Database::getInstance();
            $connection = $db->getConnection();
            $result_set = mysqli_query($connection,$query);
            $q="SELECT * FROM objreq";
            $rs=mysqli_query($connection,$q);
            while ($row=mysqli_fetch_array($result_set,MYSQLI_ASSOC)){
                //$query0="SELECT * FROM users WHERE email='{$row['email']}' LIMIT 1";
                //$result_set0 = mysqli_query($connection,$query0);
                //$req = mysqli_fetch_assoc($result_set0);
                $d_email=$row['developers_email'];
                echo "<div class='raw'>";
                    echo "<div class='column'>";
                        echo "<div class='card'>";
                            echo "<p>";
                                echo "Developer's Name : ";
                                echo "<a href='view_profile.php?email=$d_email'>";
                                echo $row['developers_name'];
                                echo "</a>";
                            echo "</p>";
                            echo "<p>";
                                echo "Developer's Email : ";
                                echo $row['developers_email'];
                            echo "</p>";
                            echo "<p>";
                                echo "Description : ";
                                echo $row['description'];
                            echo "</p>";
                            echo "</p>";
                                echo "Duration : ";
                                echo $row['duration'];
                            echo "</p>";
                            echo "<p>";
                                echo "Type : ";
                                echo $row['type'];
                            echo "</p>";
                            echo "<p>";
                                echo "Status : ";
                                echo $row['status'];
                            echo "</p>";
                        echo "</div>";
                        echo "<br>";
                    echo "</div>";
                echo "</div>";
            }
            while ($row=mysqli_fetch_array($rs,MYSQLI_ASSOC)){
                //echo $row['req'];
                $req=unserialize($row['req']);
                //echo $req;
                echo $req->getClientName();
                echo $req->returnState()->getState();
            }
            ?>
            
        </article>
    </main>
    <hr>
</div>
<?php include('includes/footer.php');?>