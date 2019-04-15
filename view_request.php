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
                echo "</td></tr>";
            }

            ?>
            </table>
    </div>
</body>
</html>