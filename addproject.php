<?php
require 'dbconnect.php';
$name= $_GET['name'];
$description = $_GET['description'];
$project_link = $_GET['projectlink'];
$ResearchLabs_researchLabsid= $_GET['researchlabid'];
$sql = "INSERT INTO Project (`description`, `project_link`, `ResearchLabs_researchLabsid`) VALUES ('$description', '$projectlink','$researchlabid')";
$msg='';
if ($conn->query($sql) === TRUE) {
     $msg = "1";
} else {
    $msg = "0";
}
echo json_encode($msg);
$conn->close();
?>
