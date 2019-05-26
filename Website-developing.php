<?php include('includes/client-header.php');
  require_once ('class.Database.php');
  require_once ('class.DevelopersListAdapter.php');
  require_once ('class.DevelopersList.php');
?>
    <main>
        <article>
            <h1>Website Developing</h1>
            <table>
            <tr>
            <th>Name</th>
            <th>Email</th>
            <!--th>LinkedIn</th-->
            </tr>
            <?php
            $query = "SELECT * FROM developer WHERE profession='web developer'";
            $db = Database::getInstance();
            $connection = $db->getConnection();
            $result_set = mysqli_query($connection,$query);
            $developerList=new DevelopersListAdapter(new DevelopersList());
            $developerList->viewDevelopersList($result_set);
            

            /*while ($row=mysqli_fetch_array($result_set,MYSQLI_ASSOC)){
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
            }*/

            ?>
            </table>
        </article>
    </main>
<?php include('includes/footer.php');?>