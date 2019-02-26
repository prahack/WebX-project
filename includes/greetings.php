<?php 
    function display_greetings(){
        $hour= date('h'); //gives the hour of current time
        if ($hour >=0 and $hour<=11){
            echo "Good Morning...!";
        }elseif($hour>=12 and $hour<=17) {
            echo "Good Afternoon..!";
        }elseif($hour>=18 and $hour<=20) {
            echo "Good Evening...!";
        }else{
            echo "Good Night...!";
        }
    }
?>