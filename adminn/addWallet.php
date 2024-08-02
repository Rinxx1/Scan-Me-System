<?php  
	include '../connection.php';

	if (isset($_POST['addWallet'])) {

    	$pid = $_GET['pid'];
	 	$inwallet = $_POST['wall'];
	 	$num = (int)$inwallet;

	 	$sql = $con->query("SELECT * FROM personinfo WHERE person_id = '$pid' ");
    	$row = $sql->fetch_array();

    	$wallet = $row['wallet'];

    	$total = $wallet + $num;

	 	$con->query("UPDATE personinfo SET wallet = $total WHERE person_id = '$pid'");

	 	echo '<script>alert("Wallet Added");location.href = "user.php?pid=<?php echo $pid?>"</script>';
	 }


?>