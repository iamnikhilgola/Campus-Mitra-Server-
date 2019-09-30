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
