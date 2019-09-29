<?php
require 'dbconnect.php';

//$type=$_GET['type']	;
$roomnumber = $_GET['roomnumber'];

$sql = "
Select RoomType  from Room where RoomNumber='$roomnumber'";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_assoc();
$roomtype = $outp["RoomType"];

//echo $result;
//echo json_encode($outp);
$Sql1="";
if($roomtype=='0'){
	//Lecture Room
	$Sql1 = "Select * from Room,LectureRoom where Room.Roomid=LectureRoom.Room_Roomid";
}
elseif ($roomtype=='1') {
	//Discussion Room
	$Sql1="Select * from Room,DiscussionRoom where Room.Roomid=DiscussionRoom.Room_Roomid";
}
elseif ($roomtype=='2') {
	# code...
	//MEETING ROOM
	$Sql1="Select * from Room,MeetingRoom where Room.Roomid=MeetingRoom.Room_Roomid";
}
elseif($roomtype=='3'){
	$Sql1="Select * from faculty,faculty_office,Room where Room.Roomid=faculty_office.Roomid and faculty_office.facultyid = faculty.facultyid";
	//faculty office	
}
elseif ($roomtype=='4') {
	# code...
	//Lab
	$Sql1 ="Select * from Room,Lab where Room.Roomid = Lab.Room_Roomid";

}
elseif($roomtype=='5'){
	$Sql1 = "Select * from Room,ResearchLabs,faculty where Room.Roomid = ResearchLabs.Room_Roomid and faculty.facultyid=ResearchLabs.faculty_facultyid";
}
else{
	$Sql1="";
}

$stmt = $conn->prepare($Sql1);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($outp);

$conn->close();
?>

