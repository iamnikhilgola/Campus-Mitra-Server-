<?php
require 'dbconnect.php';

$username=$_GET['uname']	;
$pass = $_GET['pass'];

$sql = "
SELECT * FROM campusmitra.user where username='$username' and userpassword='$pass';";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);

$conn->close();
?>
