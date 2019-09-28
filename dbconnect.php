<?php
header("Content-Type: application/json; charset=UTF-8");
$servername = "localhost:3306";
$username = "root";
$password = "123456";
$dbname  = "campusmitra";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//$stmt = $conn->prepare("SELECT * FROM user LIMIT 10");
//$stmt->execute();
//$result = $stmt->get_result();
//$outp = $result->fetch_all(MYSQLI_ASSOC);

//echo json_encode($outp);
?>