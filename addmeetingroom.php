<?php
require 'dbconnect.php';
$MeetingRoomCapacity= $_GET['meetingroomcapacity'];
$Room_Roomid= $_GET['roomid'];
$sql = "INSERT INTO MeetingRoom (`MeetingRoomCapacity`,'Room_Roomid') VALUES ('$meetingroomcapacity','$roomid')";


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
