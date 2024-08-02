<?php 
	include 'connection.php';

	$uid = $_GET['uid'];

	$con->query("UPDATE users SET user_status = 1 WHERE user_id = '$uid'");

 ?>