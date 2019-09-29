<?php
require 'dbconnect.php';

$contact= $_GET['contact'];
$uid = $_GET['uid'];

$sql = "INSERT INTO user_contact (`usercontactnumber`, `userid`) VALUES ('$contact', '$uid')";
$msg='';
if ($conn->query($sql) === TRUE) {
     $msg = "1";
} else {
    $msg = "0";
}
echo json_encode($msg);
$conn->close();
?>
