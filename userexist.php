<?php
require 'dbconnect.php';

$usertype=$_GET['type']	;
$email = $_GET['email'];

$sql = "SELECT * FROM user where useremail='$email'  and usertype=$usertype";
$msg='';

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);

$conn->close();
?>
