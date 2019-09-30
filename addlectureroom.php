<?php
require 'dbconnect.php';
$LectureRoomCapacity= $_GET['lectureroomcapacity'];
$LectureRoomcol= $_GET['lectureroomcol'];
$Room_Roomid= $_GET['roomid'];
$sql = "INSERT INTO LectureRoom (`LectureRoomCapacity`,'LectureRoomcol','Room_Roomid') 
VALUES ('$lectureroomcapacity','$lectureroomcol','$roomid')";


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
