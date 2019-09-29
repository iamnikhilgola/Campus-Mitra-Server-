<?php
require 'dbconnect.php';
$MeetingRoomCapacity= $_GET['meetingroomcapacity'];
$Room_Roomid= $_GET['roomid'];
$sql = "INSERT INTO MeetingRoom (`MeetingRoomCapacity`,'Room_Roomid') VALUES ('$meetingroomcapacity','$roomid')";
$msg='';
if ($conn->query($sql) === TRUE) {
     $msg = "1";
} else {
    $msg = "0";
}
echo json_encode($msg);
$conn->close();
?>
