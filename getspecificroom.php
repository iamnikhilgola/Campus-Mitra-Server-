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
	$Sql1 = "Select * from Room,LectureRoom,booking where Room.Roomid=LectureRoom.Room_Roomid and Booking.Room_Roomid=Room.Roomid";
}
else if ($roomtype=='1') {
	//Discussion Room
	$Sql1="Select * from Room,DiscussionRoom,booking where Room.Roomid=DiscussionRoom.Room_Roomid and Booking.Room_Roomid=Room.Roomid";
}
else if ($roomtype=='2') {
	# code...
	//MEETING ROOM
	$Sql1="Select * from Room,MeetingRoom,booking where Room.Roomid=MeetingRoom.Room_Roomid and Booking.Room_Roomid=Room.Roomid";
}
else if($roomtype=='3'){
	$Sql1="Select * from faculty,faculty_office,Room where Room.Roomid=faculty_office.Roomid and faculty_office.facultyid = faculty.facultyid";
	//faculty office	
}


$conn->close();
?>

