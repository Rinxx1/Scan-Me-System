<?php
	include 'connection.php';

	$uid = $_GET['uid'];
	$sql = $con->query("SELECT * FROM personinfo INNER JOIN users ON personinfo.person_id  = users.person_id WHERE users.user_id = '$uid' ");
	$row = $sql->fetch_array();

	$pid = $row['person_id'];

	if(isset($_POST['scanner'])){
		echo '<script>location.href = "qrScanner.php?pid='.$pid.'"; </script>';
	}

	if(isset($_POST['scanner'])){
		echo '<script>location.href = "userdataform.php?pid='.$pid.'"; </script>';
	}

?>