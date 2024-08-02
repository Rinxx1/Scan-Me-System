<?php  
	include 'connection.php';
	$statusMsg = '';

	$uid = $_GET['uid'];
	$targetDir = "img/dis_req/";
	$idfront = basename($_FILES["idfrnt"]["name"]);
	$idback = basename($_FILES["idbck"]["name"]);

	$targetFilePath1 = $targetDir . $idfront;
	$targetFilePath2 = $targetDir . $idback;

	$fileType1 = pathinfo($targetFilePath1,PATHINFO_EXTENSION);
	$fileType2 = pathinfo($targetFilePath2,PATHINFO_EXTENSION);


	if(isset($_POST['app']) && (!empty($_FILES["idfrnt"]["name"]) && !empty($_FILES["idbck"]["name"]))){

		$allowTypes = array('jpg','png','jpeg','gif','pdf');

		if(!empty($_POST['disc'])) {
			$selectedd = $_POST['disc'];

			if(in_array($fileType1, $allowTypes) && in_array($fileType2, $allowTypes)){

				if(move_uploaded_file($_FILES["idfrnt"]["tmp_name"], $targetFilePath1) && move_uploaded_file($_FILES["idbck"]["tmp_name"], $targetFilePath2)){

				    $insertPic = $con->query("INSERT INTO apply_disc (user_id,id_f,id_b,disc_type) VALUES ('$uid','$targetFilePath1','$targetFilePath2','$selectedd')");

				    if($insertPic>0){
				    	$con->query("UPDATE users SET disc_status = 0 WHERE user_id = '$user'");

				        echo '<script>alert("Successful");window.location="users/User.php?uid='.$uid.'";</script>';
				    }else{
				        $statusMsg = "File upload failed, please try again.";
				        echo '<script>alert("'.$statusMsg.'");';
				    } 
				}else{
				    $statusMsg = "Sorry, there was an error uploading your file.";
				    echo '<script>alert("'.$statusMsg.'");';
				}
			}else{
			    $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
			    echo '<script>alert("'.$statusMsg.'");';
			}
		}else{
			$statusMsg = 'Please select a discount type.';
			echo '<script>alert("'.$statusMsg.'");window.location="users/User.php?uid='.$user_id.'";</script>';
		}

	}else{
		$statusMsg = 'Please select a file to upload.';
		echo '<script>alert("'.$statusMsg.'");';
	}


?>