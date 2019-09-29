<?php
require 'dbconnect.php';

//$type=$_GET['type']	;
$roomnumber = $_GET['roomnumber'];

$sql = "
Select RoomType  from Room where RoomNumber='$roomnumber'";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo $result;
//echo json_encode($outp);

$conn->close();
?>

