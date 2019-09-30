<?php
require 'dbconnect.php';
$name= $_GET['name'];
$description = $_GET['description'];
$project_link = $_GET['projectlink'];
$researchLabsid= $_GET['researchlabid'];
$sql = "INSERT INTO Project (`name`,`description`, `project_link`, `ResearchLabs_researchLabsid`) VALUES ('$name','$description', '$projectlink','$researchlabid')";

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
