<?php
require 'dbconnect.php';
$date= $_GET['date'];
$time = $_GET['time'];
$day = $_GET['day'];
$facultyid= $_GET['facultyid'];
$appointment_status= $_GET['appointmentstatus'];
$Student_student_id= $_GET['studentid'];
$remarks = $_GET['remarks'];
$sql = "INSERT INTO Appointment (`date`, `time`,`facultyid`,`appointment_status`,`Student_student_id`,`appointment_remarks`) VALUES ('$date', '$time','$facultyid','$appointmentstatus','$studentid',$remarks)";
$msg='';
if ($conn->query($sql) === TRUE) {
     $msg = "1";
} else {
    $msg = "0";
}
echo json_encode($msg);
$conn->close();
?>
