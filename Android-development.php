<?php include('includes/client-header.php');?>
<?php 
	//checking if a user is logged in
	if (!isset($_SESSION['username'])){
		header('Location: index.php');
    }

    //$email=$_SESSION['email'];
    $username=$_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="developer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    
    <?php
    $search="";
    $output = NULL;
    if (isset($_POST['submit'])){
        //connect to the database
        $mysqli = NEW MySQLi("localhost","root","","registration");
        //query the database
        $resultSet = $mysqli ->query("SELECT * FROM developer WHERE username = '$search'");
        if($resultSet -> num_rows > 0){

        }else{
            $output = "No results";
        }
        $search=mysqli_real_escape_string($connection,$_POST['search']);
        //$search = $mysqli ->real_escape_string($_POST['search']);
        echo $search;
    }
    ?>
    <form method="POST" class="example" action="Android-development.php"style="margin:auto;max-width:300px;float:right">
    <input type="text" placeholder="Search.." name="search"/>
    <button type="submit" name="submit" value="Search"/><i class="fa fa-search"></i></button>
    </form>

    <?php echo $output;

    ?>
</body>
</html>


    <main>
        <article>
            <h1>Android Developing</h1>
            <table>
            <tr>
            <th>Name</th>
            <th>Email</th>

            </tr>
            <?php
            $query = "SELECT * FROM developer WHERE profession='android developer'";
            $connection=mysqli_connect('localhost','root','','registration');
            $result_set = mysqli_query($connection,$query);

            

            while ($row=mysqli_fetch_array($result_set,MYSQLI_ASSOC)){
                //$query0="SELECT * FROM users WHERE email='{$row['email']}' LIMIT 1";
                //$result_set0 = mysqli_query($connection,$query0);
                //$user = mysqli_fetch_assoc($result_set0);
                $d_email=$row['email'];
                echo "<tr><td>";
                echo "<a href='view_profile.php?email=$d_email'>";
                echo $row['username'];
                echo "</a>";
                echo "</td><td>";
                echo $row['email'];
                //echo "</td><td>";
                //echo $row['linkedin'];
                echo "</td></tr>";
            }

            ?>
            </table>
        </article>
    </main>
<?php include('includes/footer.php');?>