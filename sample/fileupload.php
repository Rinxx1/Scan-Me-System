<?php
// Include the database configuration file
include 'connection.php';
$statusMsg = '';

// File upload path
$targetDir = "uploads/";
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

if(isset($_POST["submit"]) && !empty($_FILES["lf"]["name"]) && !empty($_FILES["lb"]["name"]) && !empty($_FILES["orcr"]["name"]) && !empty($_FILES["nbi"]["name"])){

    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    if(in_array($fileType1, $allowTypes) && in_array($fileType2, $allowTypes) && in_array($fileType3, $allowTypes) && in_array($fileType4, $allowTypes)){

        if(move_uploaded_file($_FILES["lf"]["tmp_name"], $targetFilePath1) && move_uploaded_file($_FILES["lb"]["tmp_name"], $targetFilePath2) && move_uploaded_file($_FILES["orcr"]["tmp_name"], $targetFilePath3) && move_uploaded_file($_FILES["nbi"]["tmp_name"], $targetFilePath4)){

            $statusMsg = "The file has been uploaded successfully.";
            

            /*$insert = $db->query("INSERT into driver_req (user_id,license_f,license_b,vehicle_or,nbi_clearance) VALUES ('".$fileName."', NOW())");

            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } */

        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}
echo '<script>alert("'.$statusMsg.'");</script>';

// Display status message
/*echo "<script>alert()</script>";*/
?>

<!-- <?php
//display img from db
// Include the database configuration file
include 'dbConfig.php';

// Get images from the database
$query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");

if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>
<?php } ?> -->

