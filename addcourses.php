<?php
require 'dbconnect.php';

$coursname= $_GET['coursename'];
$fid = $_GET['fid'];

$sql = "INSERT INTO Courses (`course_name`, `faculty_facultyid`) VALUES ('$coursename', '$fid')";


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
