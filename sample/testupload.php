<!DOCTYPE html>
<html>
<head>
	<title>Sample</title>
</head>
<body>
		<form action="fileupload.php" method="post" enctype="multipart/form-data">

			<label>Driver's License (FRONT) </label><br>
			<input type="file" name="lf"><br>

			<label>Driver's License (BACK) </label><br>
			<input type="file" name="lb"><br>

			<label>Vehicle's OR/CR</label><br>
			<input type="file" name="orcr"><br>

			<label>NBI Clearance </label><br>
			<input type="file" name="nbi"><br>

  			<input type="submit" value="Upload Image" name="submit"><br>

		</form>

			
			<!-- <?php  
				include 'connection.php';
				$sql = "SELECT qr FROM tbl_users";
				$result = $con->query($sql);

				if ($result->num_rows > 0) {
				  while($row = $result->fetch_assoc()) { ?>
				<img src="<?php echo $row['qr']; ?>" /> 

				<?php
				  }
				} else {
				  echo "0 results";
				}
			?> -->
	</form>
	
</body>
</html>