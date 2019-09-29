<?php
require 'dbconnect.php';
$LectureRoomCapacity= $_GET['lectureroomcapacity'];
$LectureRoomcol= $_GET['lectureroomcol'];
$Room_Roomid= $_GET['roomid'];
$sql = "INSERT INTO LectureRoom (`LectureRoomCapacity`,'LectureRoomcol','Room_Roomid') 
VALUES ('$lectureroomcapacity','$lectureroomcol','$roomid')";
$msg='';
if ($conn->query($sql) === TRUE) {
     $msg = "1";
} else {
    $msg = "0";
}
echo json_encode($msg);
$conn->close();
?>
