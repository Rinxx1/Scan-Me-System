<?php 
	include 'connection.php';

	if(isset($_POST['add'])){
		$desti1 = $_POST['d1'];
		$desti2 = $_POST['d2'];
		$rate = floatval($_POST['rate']);
		$def = "[Vice Versa]";

		$rname = $desti1." - ".$desti2." ".$def;

		$random = rand(01,99);
		$rid = "R".$random;

		$sql = $con->query("SELECT * FROM routes WHERE rname = '$rname'");
		$row = $sql->fetch_array();

		$ins = $con->query("INSERT INTO routes(route_id, rname, rrate) VALUES('$rid', '$rname', '$rate')");

		if($ins > 0){
			echo "<script>alert('Route Successfully Added');window.location='adminn/addroute.php';</script>";
		}else{
			echo "<script>alert('Added Unsuccessfully ');window.location='adminn/routelist.php';</script>";
		}
		
		
	}

	if(isset($_POST['update'])){
		$rid = $_GET['rid'];

        $rname = $_POST['rname'];
        $rrate = $_POST['rrate'];

        $sql = $con->query("UPDATE routes SET rname = '$rname', rrate = ' $rrate'");

        if ($sql > 0) {
        	echo "<script>alert('Route Successfully Updated');window.location='adminn/dashboard.php';</script>";
        }
	}

	
?>