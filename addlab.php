<?php
require 'dbconnect.php';
$LabName= $_GET['labname'];
$LabPage= $_GET['labpage'];
$Lab_image= $_GET['labimage'];
$system_count= $_GET['systemcount'];
$Room_Roomid= $_GET['roomid'];
$sql = "INSERT INTO LectureRoom (`LabName`,'LabPage','Lab_image','system_count','Room_Roomid') 
VALUES ('$labname','$labpage','$labimage','$systemcount','$roomid')";
$msg='';
if ($conn->query($sql) === TRUE) {
     $msg = "1";
} else {
    $msg = "0";
}
echo json_encode($msg);
$conn->close();
?>
