<?php
require_once('interface.Search.php');

class SearchByName implements Search{
    public function search($name,$type){
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
                if($row['developer_type']==$type){
                $d_email=$row['email'];
                $d_username=$row['username'];
                $output = "Developer's Name : <a href=#>$d_username </a><br />Developer's email : $d_email";
            }}
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
    }
}
?>