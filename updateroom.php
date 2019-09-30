<?php
require 'dbconnect.php';





//$type=$_GET['type']	;

$utype = $_GET['utype']; //update type
$newValue = $_GET['newvalue']; // new value to be replaced
$uid = $_GET['sid'];
$sql="";
if($utype=='0'){
	// to change ROOM NUMBER
	$sql = "Update Room set RoomNumber='$newValue' where Roomid = '$uid'";
}
elseif($utype=='1'){
	// to change AREA OF INTEREST
	$sql = "Update Room set RoomBuilding='$newValue' where Roomid = '$uid'";
}
elseif ($utype=='2') {
	// To change 
	$sql = "Update Room set RoomType='$newValue' where Roomid = '$uid'";
}
else{
	$sql = "";
}

if ($conn->query($sql) === TRUE) {
     $msg = "1";
} else {
    $msg = "0";
}
echo json_encode($msg);
$conn->close();
echo json_encode($outp);

$conn->close();
?>

