<?php include('includes/client-header.php');
  require_once ('class.Database.php');
  require_once ('class.DevelopersListAdapter.php');
require_once ('class.DevelopersList.php');
?>
    <main>
        <article>
            <h1>Video Editing</h1>
            <table>
            <tr>
            <th>Name</th>
            <th>Email</th>
            </tr>
            <?php
            $query = "SELECT * FROM developer WHERE profession='VedioEditor'";
            $db = Database::getInstance();
            $connection = $db->getConnection();
            $result_set = mysqli_query($connection,$query);
            $developerList=new DevelopersListAdapter(new DevelopersList());
            $developerList->viewDevelopersList($result_set);

            ?>
            </table>
        </article>
    </main>
<?php include('includes/footer.php');?>