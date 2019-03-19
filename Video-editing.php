<?php include('includes/client-header.php');?>
    <main>
        <article>
            <h1>Video Editing</h1>
            <table>
            <tr>
            <th>Name</th>
            <th>Email</th>
            </tr>
            <?php
            $query = "SELECT * FROM developer WHERE profession='video editor'";
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