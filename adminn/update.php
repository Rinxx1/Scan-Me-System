<?php  
	include '../connection.php';

	if($_SESSION['spid']){
		$pid = $_GET['pid'];

		if (isset($_POST['wallet'])) {
			$newwallet = $_POST['wall'];

			$con->query("UPDATE personinfo SET wallet = '$newwallet' WHERE person_id = '$pid'");

			echo '<script>alert("Wallet Added");location.href = "adminn/user.php?pid=<?php echo $pid?>"</script>';
		}

		if (isset($_POST['del'])) {
			$con->query("DELETE FROM personinfo WHERE person_id = '$pid'");
			$con->query("DELETE FROM users WHERE person_id = '$pid'");

			echo '<script>alert("Wallet Added");location.href = "adminn/userlist.php"</script>';
		}

	}

?>