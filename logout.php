<?php 
	
	session_start();                         //start the session

	$_SESSION = array();                   //remove all the values in the session
 //delete the cookie belongs to the session from the browser
	if(isset($_COOKIE[session_name()])){     //check for, is the session is has or has not
		setcookie(session_name(),'',time()-86400,'/');    //set the cookie (cookie name,value,expiration time of the cookie,where to effect this on the website(/-root:means it effects for the whole website))
	}

	session_destroy();         //destroy the session

	header('Location: index.php?logout=yes');    //go back to login page



 ?>