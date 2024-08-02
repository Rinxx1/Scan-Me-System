<!DOCTYPE html>
<html>
<head>
	<title>Apply Discount</title>
</head>
<body>
	<h1>Apply for Discount</h1>
	<form action="fapplyDis.php" method="post" enctype="multipart/form-data">
		<label>Type of Discount</label><br>
		<select name="discount" >
			<option value="" disabled selected>Select type of discount</option>
			<option value="0">Student</option>
			<option value="1">Senior Citizen</option>
			<option value="2">Person's with Disability (PWD)</option>
    	</select><br><br>
		
		<h4>Discount Requirements</h4>
		<label>Valid ID (FRONT) </label><br>
			<input type="file" name="idf"><br>

		<label>Valid ID (BACK) </label><br>
		<input type="file" name="idb"><br>
		
		<button name="apply"> Apply </button>

	</form>
	
</body>
</html>