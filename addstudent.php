<?php
require 'dbconnect.php';

$roll= $_GET['roll'];
$intrest = $_GET['interest'];
$uid = $_GET['uid'];
$resume = $_GET['resume'];

$sql = "INSERT INTO Student (`student_rollnumber`, `area_interest`, `User_userid`, `resume`) VALUES ('$roll', '$interest', '$uid', '$resume')";
$msg='';
if ($conn->query($sql) === TRUE) {
     $msg = "1";
} else {
    $msg = "0";
}
echo json_encode($msg);
$conn->close();
?>
