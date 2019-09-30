<?php
require 'dbconnect.php';
$start_time= $_GET['starttime'];
$end_time = $_GET['endtime'];
$day = $_GET['day'];
$facultyid= $_GET['facultyid'];
$DND= $_GET['dnd'];
$sql = "INSERT INTO Office_hours (`start_time`, `end_time`, `day`,`facultyid`,`DND`) VALUES ('$starttime', '$endtime','$day','$facultyid','$dnd')";


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
