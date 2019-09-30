<?php
require 'dbconnect.php';
$LabName= $_GET['labname'];
$LabPage= $_GET['labpage'];
$Lab_image= $_GET['labimage'];
$system_count= $_GET['systemcount'];
$Room_Roomid= $_GET['roomid'];
$sql = "INSERT INTO LectureRoom (`LabName`,'LabPage','Lab_image','system_count','Room_Roomid') 
VALUES ('$labname','$labpage','$labimage','$systemcount','$roomid')";

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
