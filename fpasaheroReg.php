<?php  
	include 'connection.php';


	if(isset($_POST['reg'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		// $mname = $_POST['mname'];
		// $gender = $_POST['gender'];
		$add = $_POST['add'];
		$bdate = $_POST['bdate'];

		$cn = $_POST['cn'];
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];

		$person_id= rand(1000,9999);
		$user_id = "US".$person_id;

		//QR CODE GENERATOR
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
			echo "<script> alert('Username Already Exist');window.location='../technoS';</script>";
		}else{
			$con->query("INSERT INTO personinfo(person_id,fname,lname,mname,gender,address,contact_num,bdate,qr_code,wallet)VALUES($person_id,'$fname','$lname','','','$add','$cn','$bdate','$file',0)");
			$con->query("INSERT INTO users(user_id,person_id,uname,password,user_type,user_status,disc_status) VALUES('$user_id','$person_id','$uname','$pass',1,1,3)");

			echo "<script>alert('Successfully Added your ID is $user_id');window.location='../technoS';</script>";
			
		}

		
	}

	

	?>