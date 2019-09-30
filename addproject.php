<?php
require 'dbconnect.php';
$name= $_GET['name'];
$description = $_GET['description'];
$project_link = $_GET['projectlink'];
$researchLabsid= $_GET['researchlabid'];
$sql = "INSERT INTO Project (`name`,`description`, `project_link`, `ResearchLabs_researchLabsid`) VALUES ('$name','$description', '$projectlink','$researchlabid')";
$msg='';
if ($conn->query($sql) === TRUE) {
     $msg = "1";
} else {
    $msg = "0";
}
echo json_encode($msg);
$conn->close();
?>
