<?php
	session_start(); 
	require 'connection.php';

	if(isset($_POST['pay'])){
		$driverid = $_POST['did'];

		if(!empty($_POST['routes'])) {
		$selectedroute = $_POST['routes'];

			//if (!empty($_POST['noperson'])){
				$pid = $_GET['pid'];

				$usql = $con->query("SELECT * FROM users WHERE person_id = '$pid'");
				$uu = $usql->fetch_array();

				$uid = $uu['user_id'];
				$disc = $uu['disc_status'];

				$rsql = $con->query("SELECT * FROM routes WHERE route_id = '$selectedroute'");
				$psql = $con->query("SELECT * FROM personinfo WHERE person_id = '$pid'");
				$dsql = $con->query("SELECT * FROM personinfo WHERE person_id = '$driverid'");
				$asql = $con->query("SELECT * FROM personinfo WHERE person_id = 1513");

				$rres = $rsql->fetch_array();
				$pres = $psql->fetch_array();
				$dres = $dsql->fetch_array();
				$ares = $asql->fetch_array();

				$dname = $dres['fname']." ".$dres['lname'];	

				//solving pamasahe
				$dedact = $rres['rrate'] * 0.2;
				
				if($disc == 1){
					$fare = $rres['rrate'] - $dedact;
				}else{
					$fare = $rres['rrate'];
				}

				$transacfee = 0.5;
				$dincome = $fare - $transacfee;

				$adminwallet = $ares['wallet'] + $transacfee;
				$pfare = $pres['wallet'] - $fare;
				$dwallet = $dres['wallet'] + $dincome;

				if($pres['wallet'] >= $fare){
					$sfee = $con->query("UPDATE personinfo SET wallet = $adminwallet WHERE person_id = 4678");
					$income = $con->query("UPDATE personinfo SET wallet = $dwallet WHERE person_id = '$driverid'");
					$loss = $con->query("UPDATE personinfo SET wallet = $pfare WHERE person_id = '$pid'");

					echo '<script> alert("Successfully Paid '.$fare.' to '.$dname.'"); location.href = "users/User.php?uid='.$uid.'";</script>';

				}elseif ($pres['wallet'] < $fare) {
					echo '<script> alert("You do not have enough balance on your account. Please reload immediately."); location.href = "users/User.php?uid='.$uid.'";</script>';		
				}

			// }else {
			// 	echo "<script> alert('Please input number of person.');</script>";
			// }
			
		}else {
			$pid = $_GET['pid'];

			$usql = $con->query("SELECT * FROM users WHERE person_id = '$pid'");
			$uu = $usql->fetch_array();

			$uid = $uu['user_id'];

			echo '<script> alert("Please select the value."); location.href = "users/pay.php?uid='.$uid.'";</script>';
		}
	}
	if (isset($_POST['back'])) {

		$pid = $_GET['pid'];
		$usql = $con->query("SELECT * FROM users WHERE person_id = '$pid'");
		$uu = $usql->fetch_array();

		$uid = $uu['user_id'];
		echo '<script>location.href = "users/User.php?uid='.$uid.'";</script>';
	}

	/*
	$dan = "SELECT * FROM balance WHERE user_id = '$uid'";
	$res = mysqli_query($con,$dan);
	$rows = mysqli_fetch_array($res);*/

?>

