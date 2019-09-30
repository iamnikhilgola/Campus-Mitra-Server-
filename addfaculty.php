<?php
require 'dbconnect.php';

$profile= $_GET['profile'];
$availstatus = $_GET['availstatus'];
$uid = $_GET['uid'];

$sql = "INSERT INTO faculty (`User_userid`, `faculty_profile`, `availability_status`) VALUES ('$uid', '$profile', '$availstatus')";



$response = array();
if ($conn->query($sql) === TRUE) {
     //$msg = "1";
     $response["success"]=1;
     $response["message"]="Data added Successfully";
} else {
	$response["success"]=0;
     $response["message"]="Oops! An error occurred.";
}
echo json_encode($response);

$conn->close();
?>
