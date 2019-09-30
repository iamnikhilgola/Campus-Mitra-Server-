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

if ($conn->query($sql) === TRUE) {
     $msg = "1";
} else {
    $msg = "0";
}
echo json_encode($msg);
$conn->close();
echo json_encode($outp);

$conn->close();
?>

