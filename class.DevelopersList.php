<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="developer.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html><?php
class DevelopersList{
    
    function displayDevelopersList($result_set){
        while ($row=mysqli_fetch_array($result_set,MYSQLI_ASSOC)){
            //$query0="SELECT * FROM users WHERE email='{$row['email']}' LIMIT 1";
            //$result_set0 = mysqli_query($connection,$query0);
            //$user = mysqli_fetch_assoc($result_set0);
            $d_email=$row['email'];
            echo "<div class='raw'>";
                echo "<div class='column'>";
                    echo "<div class='card'>";
                        echo "<p>";
                        echo "Name : ";
                        echo "<a href='view_developer_profile.php?email=$d_email'>";
                        echo $row['username'];
                        echo "</a>";
                        echo "</p>";
                        echo "<p>";
                        echo "email : ";
                        echo $row['email'];
                        echo "</p>";
                    echo "</div>";
                echo "<br>";
                echo "</div>";
            echo "</div>";
        }
    }
}

?>