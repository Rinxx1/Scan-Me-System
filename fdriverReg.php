<?php  
	include 'connection.php';
	$statusMsg = '';

	$targetDir = "img/driver_req/";
	$lf = basename($_FILES["lf"]["name"]);
	$lb = basename($_FILES["lb"]["name"]);
	$orcr = basename($_FILES["orcr"]["name"]);
	$nbi = basename($_FILES["nbi"]["name"]);

	$targetFilePath1 = $targetDir . $lf;
	$targetFilePath2 = $targetDir . $lb;
	$targetFilePath3 = $targetDir . $orcr;
	$targetFilePath4 = $targetDir . $nbi;

	$fileType1 = pathinfo($targetFilePath1,PATHINFO_EXTENSION);
	$fileType2 = pathinfo($targetFilePath2,PATHINFO_EXTENSION);
	$fileType3 = pathinfo($targetFilePath3,PATHINFO_EXTENSION);
	$fileType4 = pathinfo($targetFilePath4,PATHINFO_EXTENSION);

	
	if(isset($_POST['reg']) && (!empty($_FILES["lf"]["name"]) && !empty($_FILES["lb"]["name"]) && !empty($_FILES["orcr"]["name"]) && !empty($_FILES["nbi"]["name"]))){

		$allowTypes = array('jpg','png','jpeg','gif','pdf');

		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$mname = $_POST['mname'];
		$gg = $_POST['gender'];
		$add = $_POST['add'];
		$bdate = $_POST['bdate'];

		if($gg == "Male")
		{
		    $gender = "Male";
		}
		else if ($gg == "Female")
		{
		    $gender = "Female";
		}


		$cn = $_POST['cn'];
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];

		$person_id= rand(1000,9999);
		$user_id = "US".$person_id;
		$veh_id = "VE".$person_id;

		$brand = $_POST['brand'];
		$pnum = $_POST['pnum'];
		$enum = $_POST['enum'];


		include 'phpqrcode/qrlib.php';
		$text = $person_id;
			  
		$path = 'img/qrcodes/';
		$file = $path.$person_id.".png";

		$ecc = 'L';
		$pixel_Size = 20;
		$frame_Size = 2;
		QRcode::png($text, $file, $ecc, $pixel_Size, $frame_Size);

		$sql = $con->query("SELECT * FROM users where uname = '$uname'");
		$row = $sql->fetch_array();


		if($row > 0){
			echo "<script> alert('Username Already Exist');window.location='users/DriverReg.php';</script>";
		}else{

			if(in_array($fileType1, $allowTypes) && in_array($fileType2, $allowTypes) && in_array($fileType3, $allowTypes) && in_array($fileType4, $allowTypes)){

			    if(move_uploaded_file($_FILES["lf"]["tmp_name"], $targetFilePath1) && move_uploaded_file($_FILES["lb"]["tmp_name"], $targetFilePath2) && move_uploaded_file($_FILES["orcr"]["tmp_name"], $targetFilePath3) && move_uploaded_file($_FILES["nbi"]["tmp_name"], $targetFilePath4)){

			        $insertPic = $con->query("INSERT INTO driver_req (user_id,license_f,license_b,vehicle_or,nbi_clearance) VALUES ('$user_id','$targetFilePath1','$targetFilePath2','$targetFilePath3','$targetFilePath4')");

					$con->query("INSERT INTO personinfo(person_id,fname,lname,mname,gender,address,contact_num,bdate,qr_code,wallet)VALUES($person_id,'$fname','$lname','$mname','$gender','$add','$cn','$bdate','$file',0)");

					$con->query("INSERT INTO users(user_id,person_id,uname,password,user_type,user_status) VALUES('$user_id','$person_id','$uname','$pass',2,0)");

					$con->query("INSERT INTO vehicle(vehicle_id,user_id,brand,plate_num,engine_num) VALUES('$veh_id','$user_id','$brand','$pnum','enum')");


			        if($insertPic){
			            echo "<script>alert('Registered Successfully');window.location='../technoS';</script>";
			        }else{
			            $statusMsg = "File upload failed, please try again.";
			        } 
			    }else{
			        $statusMsg = "Sorry, there was an error uploading your file.";
			    }
			}else{
			    $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
			}

		}

	}else{
		$statusMsg = 'Please select a file to upload.';
	}

	echo '<script>alert("'.$statusMsg.'");window.location="users/DriverReg.php";</script>';


?>