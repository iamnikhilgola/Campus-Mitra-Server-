<?php
require 'dbconnect.php';
$start_time= $_GET['starttime'];
$end_time = $_GET['endtime'];
$day = $_GET['day'];
$facultyid= $_GET['facultyid'];
$DND= $_GET['dnd'];
$sql = "INSERT INTO Office_hours (`start_time`, `end_time`, `day`,`facultyid`,`DND`) VALUES ('$starttime', '$endtime','$day','$facultyid','$dnd')";
$msg='';
if ($conn->query($sql) === TRUE) {
     $msg = "1";
} else {
    $msg = "0";
}
echo json_encode($msg);
$conn->close();
?>
