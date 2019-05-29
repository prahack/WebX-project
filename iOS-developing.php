<?php include('includes/client-header.php');
 require_once ('class.Database.php');
 require_once ('class.DevelopersListViewAdapter.php');
require_once ('class.DevelopersList.php');
?>
    <main>
        <article>
            <h1>IOs Developing</h1>
            <table>
            <tr>
            <th>Name</th>
            <th>Email</th>
            </tr>
            <?php
            $query = "SELECT * FROM developer WHERE developer_type='IOSDeveloper'";
            $db = Database::getInstance();
            $connection = $db->getConnection();
            $result_set = mysqli_query($connection,$query);
            $developerList=new DevelopersListAdapter(new DevelopersList());
            $developerList->view($result_set);

            ?>
            </table>
        </article>
    </main>
<?php include('includes/footer.php');?>