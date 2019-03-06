<?php 
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'webx';

	$connection = mysqli_connect('localhost','root','','webx');

	//checking the connection
	if (mysqli_connect_errno()){
		die('database connection failed ' . mysql_connect_error());

	} 

 ?>