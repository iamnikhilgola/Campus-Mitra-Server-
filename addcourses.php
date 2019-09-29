<?php
require 'dbconnect.php';

$coursname= $_GET['coursename'];
$fid = $_GET['fid'];

$sql = "INSERT INTO Courses (`course_name`, `faculty_facultyid`) VALUES ('$coursename', '$fid')";
$msg='';
if ($conn->query($sql) === TRUE) {
     $msg = "1";
} else {
    $msg = "0";
}
echo json_encode($msg);
$conn->close();
?>
