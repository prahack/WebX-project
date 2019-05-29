<?php include('includes/client-header.php');
require_once ('class.Database.php');
require_once ('class.DevelopersListViewAdapter.php');
require_once ('class.DevelopersList.php');
require_once ('interface.ViewAdapter.php');

?>
<?php 
    $db = Database::getInstance();
    $connection = $db->getConnection();
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
    <header><h1>iOS Development</h1>
</header>
    <main>
    <article>
    <div class="fixed">        
<form method="POST" class="example" action="iOS-developing.php"style="margin:auto;max-width:300px;float:right;y-index:0">
    <input type="text" placeholder="Search.." name="search"/>
    <button type="submit" name="submit" value="Search"/><i class="fa fa-search"></i></button>
    </form>
    
    <?php
    
    $output = NULL;
    if (isset($_POST['submit'])){
        $search=mysqli_real_escape_string($connection,$_POST['search']);
        //connect to the database
        //$mysqli = mysqli_connect("localhost","root","","registration");
        //test if connection failed
        if(mysqli_connect_errno()){
            die("connection failed: ". mysqli_connect_error()."(". mysqli_connect_errno().")");
        }
        //query the database
        $query = "SELECT * FROM developer WHERE username='$search'";
        $resultSet = mysqli_query($connection,$query);
        if(mysqli_num_rows($resultSet)>0){
            while($row = $resultSet->fetch_assoc()){
                $d_email=$row['email'];
                $d_username=$row['username'];
                $output = "Developer's Name : $d_username <br />Developer's email : $d_email";
            }
        }else{
            $output = "No results";
        }
        echo"<br>";
        echo"<br>";
        echo "<b>";
        echo "Search results for ";
        echo $search;
        echo "</b>";
        echo "<br>";
        echo $output;
        //$mysqli->close();
    }
    ?>
    </div>
    <div class="column">
         
        <?php
                $query = "SELECT * FROM developer WHERE developer_type='IOSDeveloper'";
                $db = Database::getInstance();
                $connection = $db->getConnection();
                $result_set = mysqli_query($connection,$query);
                $developerList=new DevelopersListAdapter(new DevelopersList());
                $developerList->view($result_set);
            ?>
   

</div> 
</article>
</main> 
<footer>
<p>
        WebX | Moratuwa | 2 729 729
    </p>
    
</footer>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>   
</body>
</html>