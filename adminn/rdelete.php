<?php
	include '../connection.php';

	$rid = $_GET['rid'];

	$con->query("DELETE FROM routes WHERE route_id = '$rid'");

	echo '<script>alert("Route Deleted");location.href ="routelist.php"</script>';


?>