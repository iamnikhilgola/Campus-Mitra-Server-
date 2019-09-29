<?php
require 'dbconnect.php';
$DiscussionRoomCapacity= $_GET['discussionroomcapacity'];
$Room_Roomid= $_GET['roomid'];
$sql = "INSERT INTO DiscussionRoom (`DiscussionRoomCapacity`,'Room_Roomid') VALUES ('$discussionroomcapacity','$roomid')";
$msg='';
if ($conn->query($sql) === TRUE) {
     $msg = "1";
} else {
    $msg = "0";
}
echo json_encode($msg);
$conn->close();
?>
