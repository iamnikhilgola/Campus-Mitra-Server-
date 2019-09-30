<?php
require 'dbconnect.php';

$contact= $_GET['contact'];
$uid = $_GET['uid'];

$sql = "INSERT INTO user_contact (`usercontactnumber`, `userid`) VALUES ('$contact', '$uid')";

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

