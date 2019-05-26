<?php include('server.php'); 
  require_once ('class.Database.php');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view_request.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <h1>Requests</h1>
        <table>
            <tr>
            <th>Client's Name</th>
            <th>Client's Email</th>
            <th>Discription</th>
            <th>Duration</th>
            <th>Type</th>
            <th>Status</th>
            <th>Rating</th>
            </tr>
            <?php
            $query = "SELECT * FROM requests WHERE developers_email='$email'";
            $db = Database::getInstance();
            $connection = $db->getConnection();
            $result_set = mysqli_query($connection,$query);

            

            while ($row=mysqli_fetch_array($result_set,MYSQLI_ASSOC)){
                //$query0="SELECT * FROM users WHERE email='{$row['email']}' LIMIT 1";
                //$result_set0 = mysqli_query($connection,$query0);
                //$req = mysqli_fetch_assoc($result_set0);
                $c_email=$row['clients_email'];
                echo "<tr><td>";
                echo "<a href='view_profile.php?email=$c_email'>";
                echo $row['clients_name'];
                echo "</a>";
                echo "</td><td>";
                echo $row['clients_email'];
                echo "</td><td>";
                echo $row['description'];
                echo "</td><td>";
                echo $row['duration'];
                echo "</td><td>";
                echo $row['type'];
                echo "</td><td>";
                if ($row['status']=='pending'){
                    //echo gettype($row["id"]);
                    $num=$row['id']."cn";
                    $num1=$row['id']."c";
                    echo "<form name='row' action='view_request.php' method=post>";
                    echo "<input type='submit' id=$num name=$num value='Confirm' href='javascript:location.reload()'/>";
                    echo "<input type='submit' id=$num1 name=$num1 value='Cancel'/>";
                    echo "</form>";
                    //echo "if(isset($_POST[$num])){";
                        //echo "print($num);";
                    //echo "}";
                   // echo "<input type='submit' id='btn1' name= value='Cancel'/>";
                }else if($row['status']=='confirmed'){ 
                    $num=$row['id']."co";
                    echo "<form name='row' action='view_request.php' method=post>";
                    echo "<input type='submit' id=$num name=$num value='Finish' href='javascript:location.reload()'/>";
                    echo "</form>";
                }else{
                    echo $row['status'];
                }
                echo "</td><td>";
                
                if($row['status']=='finished' and $row['rating']=='not yet' ){
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
                    echo "<input type='submit' id=$num name=$num value='Rate'/>";
                    echo "</form>";
                }else{
                    echo $row['rating'];
                }
                echo "</td></tr>";
            }

            ?>
            </table>
            <!--form name="row" action="view_request.php" method=post>
                <input type="submit" id="btn1" name="btn1" value="changer"/>
            </form!-->
            <?php
                if(isset($_POST["btn1"])){
                    print("hiiiii");
                }
            ?>
            <?php
            $query = "SELECT * FROM requests WHERE developers_email='$email'";
            $db = Database::getInstance();
            $connection = $db->getConnection();
            $result_set = mysqli_query($connection,$query);

            

            while ($row=mysqli_fetch_array($result_set,MYSQLI_ASSOC)){
                $x=$row['id'];
                $c="confirmed";
                $cl="canceled";
                $f="finished";
                $n=$row['id']."cn";
                if(isset($_POST[$n])){
                    print($n);
                    $q1="UPDATE requests
                    SET status = '{$c}'
                    WHERE id='{$x}'";
                    mysqli_query($connection,$q1);

                }
                $n=$row['id']."c";
                if(isset($_POST[$n])){
                    print($n);
                    $q1="UPDATE requests
                    SET status = '{$cl}'
                    WHERE id='{$x}'";
                    mysqli_query($connection,$q1);
                    header("Refresh:0");
                }
                $n=$row['id']."co";
                if(isset($_POST[$n])){
                    print($n);
                    $q1="UPDATE requests
                    SET status = '{$f}'
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
                        $q1="UPDATE requests
                    SET rating = '{$rating}'
                    WHERE id='{$x}'";
                    mysqli_query($connection,$q1);
                    header("Refresh:0");
                    }
                    /*$q1="UPDATE requests
                    SET status = '{$f}'
                    WHERE id='{$x}'";
                    mysqli_query($connection,$q1);*/
                }
            
            }

            ?>

    </div>
</body>
</html>