<?php
require 'dbconnect.php';





//$type=$_GET['type']	;

$utype = $_GET['utype']; //update type
$newValue = $_GET['newvalue']; // new value to be replaced
$uid = $_GET['sid'];
$sql="";
if($utype=='0'){
	// to change ROOM NUMBER
	$sql = "Update Lab set LabName='$newValue' where Labid = '$uid'";
}
elseif($utype=='2'){
	// to change AREA OF INTEREST
	$sql = "Update Lab set LabPage='$newValue' where Labid = '$uid'";
}
elseif ($utype=='2') {
	// To change 
	$sql = "Update Lab set system_count='$newValue' where Labid = '$uid'";
}
else{
	$sql = "";
}

$response = array();
if ($conn->query($sql) === TRUE) {
     //$msg = "1";
     $response["success"]=1;
     $response["message"]="Updated Successfully";
} else {
	$response["success"]=0;
     $response["message"]="Oops! An error occurred.";
}
echo json_encode($response);

$conn->close();
?>

