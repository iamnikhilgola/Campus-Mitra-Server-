<?php
require 'dbconnect.php';
$DiscussionRoomCapacity= $_GET['discussionroomcapacity'];
$Room_Roomid= $_GET['roomid'];
$sql = "INSERT INTO DiscussionRoom (`DiscussionRoomCapacity`,'Room_Roomid') VALUES ('$discussionroomcapacity','$roomid')";



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
