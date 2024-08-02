<?php
	include '../connection.php';

	$pid = $_GET['pid'];

	$psql = $con->query("SELECT * FROM users WHERE person_id = '$pid'");
	$prow = $psql->fetch_assoc();
	$uid = $prow['user_id'];

	$con->query("DELETE FROM personinfo WHERE person_id = '$pid'");
	$con->query("DELETE FROM users WHERE person_id = '$pid'");

	if ($prow['user_type'] == 1) {
		$con->query("DELETE FROM apply_disc WHERE user_id = '$uid'");

	}elseif ($prow['user_type'] == 2) {
		$con->query("DELETE FROM driver_req WHERE user_id = '$uid'");
		$con->query("DELETE FROM vehicle WHERE user_id = '$uid'");
	}

	echo '<script>alert("User Deleted");location.href = "../userlist.php"</script>';


?>