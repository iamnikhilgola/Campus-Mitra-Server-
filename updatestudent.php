<?php
require 'dbconnect.php';





//$type=$_GET['type']	;

$utype = $_GET['utype']; //update type
$newValue = $_GET['newvalue']; // new value to be replaced
$uid = $_GET['sid'];
$sql="";
if($utype=='0'){
	// to change ROLL NUMBER
	$sql = "Update Student set student_rollnumber='$newValue' where student_id = '$uid'";
}
elseif($utype=='1'){
	// to change AREA OF INTEREST
	$sql = "Update Student set area_interest='$newValue' where student_id = '$uid'";
}
else{
	$sql = "";
}


$response = array();
if ($conn->query($sql) === TRUE) {
     //$msg = "1";
     $response["success"]=1;
     $response["message"]="Updated added Successfully";
} else {
	$response["success"]=0;
     $response["message"]="Oops! An error occurred.";
}
echo json_encode($response);
$conn->close();
?>

