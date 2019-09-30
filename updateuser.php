<?php
require 'dbconnect.php';


//There is no option to update USERNAME and IIITD Email


//$type=$_GET['type']	;

$utype = $_GET['utype']; //update type
$newValue = $_GET['newvalue']; // new value to be replaced
$userid = $_GET['uid'];
$sql="";
if($utype=='0'){
	// to change first name 
	$sql = "Update User set userfirstname='$newValue' where userid = '$userid'";
}
elseif($utype=='1'){
	// to change last name
	$sql = "Update User set userlastname='$newValue' where userid = '$userid'";
}
elseif($utype=='2'){
	//to change dob
	$sql = "Update User set userdob='$newValue' where userid = '$userid'";
}
elseif($utype=='3') {
	// to change password
	$sql = "Update User set userpassword='$newValue' where userid = '$userid'";
}
elseif($utype=='4'){
	// to change personal mail
	$sql = "Update User set userpersonalmail='$newValue' where userid = '$userid'";
}
elseif ($utype=='5') {
	# code...
	// to update fb link
	$sql = "Update User set userfb='$newValue' where userid = '$userid'";
}
elseif($utype=='6'){
	// to update linkedin profile
	$sql = "Update User set userlinkedin='$newValue' where userid = '$userid'";
}
else{
	$sql = "";
}

$response = array();
if ($conn->query($sql) === TRUE) {
     //$msg = "1";
     $response["success"]=1;
     $response["message"]="Updated added Successfully";
} else {
	$response["success"]=0;
     $response["message"]="Oops! An error occurred.";
}
echo json_encode($response);
$conn->close();
?>

