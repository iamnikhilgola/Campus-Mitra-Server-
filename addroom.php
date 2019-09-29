<?php
require 'dbconnect.php';
$RoomNumber= $_GET['roomnumber'];
$RoomBuilding = $_GET['roombuilding'];
$RoomType = $_GET['roomtype'];
$sql = "INSERT INTO Room (`RoomNumber`, `RoomBuilding`, `RoomType`) VALUES ('$roomnumber', '$roombuilding','$roomtype')";
$msg='';
if ($conn->query($sql) === TRUE) {
     $msg = "1";
} else {
    $msg = "0";
}
echo json_encode($msg);
$conn->close();
?>
