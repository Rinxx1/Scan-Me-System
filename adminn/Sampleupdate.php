<?php  
	include '../connection.php';


	$pid = $_GET['pid'];

	if(isset($_POST['update'])){
		$uname = $_POST['uname'];
		$pw = $_POST['pass'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$address = $_POST['address'];
		$gender = $_POST['gender'];
		$bd = $_POST['bdate'];
		$cn = $_POST['cn'];

		$con->query("UPDATE personinfo SET 
			fname = '$fname',
			mname = '$mname',
			lname = '$lname',
			gender = '$gender',
			address = '$address',
			contact_num = '$cn',
			bdate = '$bd'
			WHERE person_id = '$pid'");

		echo '<script>alert("Update Successful");location.href = "userlist.php";</script>';
	}

	if (isset($_POST['addWallet'])) {

    	// $pid = $_GET['pid'];
	 	$inwallet = $_POST['wall'];
	 	$num = (int)$inwallet;

	 	$sql = $con->query("SELECT * FROM personinfo WHERE person_id = '$pid' ");
    	$row = $sql->fetch_array();

    	$wallet = $row['wallet'];

    	$total = $wallet + $num;

	 	$con->query("UPDATE personinfo SET wallet = $total WHERE person_id = '$pid'");

	 	echo '<script>alert("Wallet Added");location.href = "user.php?pid='.$pid.'"</script>';
	}

	if (isset($_POST['acc'])) {

    	$qry = $con->query("SELECT * FROM users WHERE person_id = '$pid' ");
    	$rw = $qry->fetch_array();

    	if($rw['user_type']==1){
    		$con->query("UPDATE users SET disc_status = 1 WHERE person_id = '$pid'");

	 		echo '<script>alert("Application Accepted");location.href = "applylist.php"</script>';

    	}elseif ($rw['user_type']==2) {
    		$con->query("UPDATE users SET user_status = 1 WHERE person_id = '$pid'");

	 		echo '<script>alert("Application Accepted");location.href = "applylist.php"</script>';
    	}

	}

	if (isset($_POST['dec'])) {

	 	$qry = $con->query("SELECT * FROM users WHERE person_id = '$pid' ");
    	$rw = $qry->fetch_array();

    	if($rw['user_type']==1){
    		$con->query("UPDATE users SET disc_status = 2 WHERE person_id = '$pid'");

	 		echo '<script>alert("Application Declined");location.href = "applylist.php"</script>';

    	}elseif ($rw['user_type']==2) {
    		$con->query("UPDATE users SET user_status = 2 WHERE person_id = '$pid'");

	 		echo '<script>alert("Application Accepted");location.href = "applylist.php"</script>';
    	}
	}

	
?>