<?php
require 'dbconnect.php';





//$type=$_GET['type']	;

$utype = $_GET['utype']; //update type
$newValue = $_GET['newvalue']; // new value to be replaced
$uid = $_GET['fid'];
$sql="";
if($utype==0){
	// to change profile link
	$sql = "Update faculty set faculty_profile='$newValue' where facultyid = '$uid'";
}
elseif($utype==1){
	// to availability status
	$sql = "Update faculty set availability_status='$newValue' where facultyid = '$uid'";
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

