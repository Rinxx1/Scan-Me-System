<?php 
 session_start();
 include 'connection.php';

 if(isset($_POST['login'])) {
 	$uname = $_POST['uname'];
 	$pw = $_POST['pass'];
 	

 	$sql = $con->query("SELECT * FROM users WHERE uname = '$uname' AND password = '$pw'");
	$row = $sql->fetch_array();

	if($row>0){
		$uid = $row['user_id'];
		$name = $row['uname'];
		$type = $row['user_type'];
		$stat = $row['user_status'];

		$_SESSION['session_uid'] = $uid;
		$_SESSION['session_name'] = $name;

		if($type == 0){
			echo '<script>alert("Welcome ADMIN");location.href = "adminn/dashboard.php";</script>';

		}elseif ($type == 1) {
			echo '<script>
					alert("Welcome PASSENGER '.$name.'");
					location.href = "users/User.php?uid='.$uid.'";
				</script>';
			

		}elseif ($type == 2) {
			if($stat == 1){
				echo '<script>alert("Welcome DRIVER '.$name.'");window.location="users/Driver.php?uid='.$uid.'";</script>';
			}elseif ($stat == 0) {
				echo '<script>alert("Pending Application");window.location="../technoS";</script>';
			}elseif ($stat == 2) {
				echo '<script>alert("Application Declined");window.location="../technoS";</script>';
			}
		}
					

	}else{
		echo '<script> alert("Incorrect username or password!");window.location="../technoS";</script>';
	}
	

	/*if($row>0){
		

		if($row['user_type'] == 1){
			echo '<script> alert("Welcome '.$uname.'"); window.location="dashboard.php"</script>';
		}
	}*/
 }

?>