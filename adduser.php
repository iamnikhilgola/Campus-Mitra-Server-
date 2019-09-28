<?php
require 'dbconnect.php';

$username = $_GET['username'];
$firstname = $_GET['fname'];
$lastname = $_GET['lname'];
$dob = $_GET['dob'];
$userpassword = $_GET['pass'];
$usertype=$_GET['type']	;
$email = $_GET['email'];
$personalmail = $_GET['pemail'];

$sql = "INSERT INTO user (`username`, `userfirstname`, `userlastname`, `userdob`, `userpassword`, `usertype`, `useremail`, `userpersonalmail`) VALUES ('$username', '$firstname', '$lastname', '$dob','$userpassword', '$usertype', '$email', '$personalmail')";
$msg='';
if ($conn->query($sql) === TRUE) {
     $msg = "1";
} else {
    $msg = "0";
}
echo json_encode($msg);
$conn->close();
?>
