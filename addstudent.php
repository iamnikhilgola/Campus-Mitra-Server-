<?php
require 'dbconnect.php';

$roll= $_GET['roll'];
$intrest = $_GET['interest'];
$uid = $_GET['uid'];
$resume = $_GET['resume'];

$sql = "INSERT INTO Student (`student_rollnumber`, `area_interest`, `User_userid`, `resume`) VALUES ('$roll', '$interest', '$uid', '$resume')";

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
