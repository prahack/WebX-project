<?php include('includes/client-header.php');
  require_once ('class.Database.php');
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


    <main>
        <article>
            <h1>My Request Box</h1>
            <table>
            <tr>
            <th>Developer's Name</th>
            <th>Developer's Email</th>
            <th>Discription</th>
            <th>Duration</th>
            <th>Type</th>
            </tr>
            <?php
            $query = "SELECT * FROM requests WHERE clients_email='$email'";
            $db = Database::getInstance();
            $connection = $db->getConnection();

            $result_set = mysqli_query($connection,$query);

            

            while ($row=mysqli_fetch_array($result_set,MYSQLI_ASSOC)){
                //$query0="SELECT * FROM users WHERE email='{$row['email']}' LIMIT 1";
                //$result_set0 = mysqli_query($connection,$query0);
                //$req = mysqli_fetch_assoc($result_set0);
                $d_email=$row['developers_email'];
                echo "<tr><td>";
                echo "<a href='view_profile.php?email=$d_email'>";
                echo $row['developers_name'];
                echo "</a>";
                echo "</td><td>";
                echo $row['developers_email'];
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
        </article>
    </main>
<?php include('includes/footer.php');?>