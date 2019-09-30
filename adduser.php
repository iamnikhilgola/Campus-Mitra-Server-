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
$gender = $_GET['gender'];
if(isset($_GET['fb'])){
$userfb = $_GET['fb'];}
else{
	$userfb = "";
}
if(isset($_GET['lindedin'])){
$userlink = $_GET['lindedin'];
}
else{
	$userlink="";
}
$sql = "INSERT INTO user (`username`, `userfirstname`, `userlastname`,`gender`, `userdob`, `userpassword`, `usertype`, `useremail`, `userpersonalmail`,`userfb`,`userlinkedin`) VALUES ('$username', '$firstname', '$lastname','$gender', '$dob','$userpassword', '$usertype', '$email', '$personalmail','$userfb','$userlink')";
$msg='';
if ($conn->query($sql) === TRUE) {
     $msg = "1";
} else {
    $msg = "0";
}
echo json_encode($msg);
$conn->close();
?>
