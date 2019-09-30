<?php
require 'dbconnect.php';
$RoomNumber= $_GET['roomnumber'];
$RoomBuilding = $_GET['roombuilding'];
$RoomType = $_GET['roomtype'];
$sql = "INSERT INTO Room (`RoomNumber`, `RoomBuilding`, `RoomType`) VALUES ('$roomnumber', '$roombuilding','$roomtype')";


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
