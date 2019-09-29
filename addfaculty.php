<?php
require 'dbconnect.php';

$profile= $_GET['profile'];
$availstatus = $_GET['availstatus'];
$uid = $_GET['uid'];

$sql = "INSERT INTO faculty (`User_userid`, `faculty_profile`, `availability_status`) VALUES ('$uid', '$profile', '$availstatus')";
$msg='';
if ($conn->query($sql) === TRUE) {
     $msg = "1";
} else {
    $msg = "0";
}
echo json_encode($msg);
$conn->close();
?>
