<?php
include('session.php');
$stid = $_GET['stid'];
$preid = $_GET['preid'];
echo $login_session; 
echo $login_lastname;
echo $stid; 
echo $preid;

include_once("config.php");
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL

//capturing scores from markfeedcontrol
echo $cr1 = $_POST['crit1'];
echo $cr2 = $_POST['crit2'];
echo $cr3 = $_POST['crit3'];
echo $cr4 = $_POST['crit4'];
echo $cr5 = $_POST['crit5'];	
echo $fee1 = $_POST['feed1'];
echo $fee2 = $_POST['feed2'];
echo $fee3 = $_POST['feed3'];
echo $fee4 = $_POST['feed4'];
echo $fee5 = $_POST['feed5'];
echo $feed = $_POST['feedfinal'];
echo $total = $cr1+$cr2+$cr3+$cr4+$cr5;

$query1 = mysql_query("SELECT LastName, FirstName, PresentID, StudentID FROM students WHERE ID ='$stid'", $connection);
while($row = mysql_fetch_assoc($query1)) {

	echo $lname = $row["LastName"];
	echo $fname = $row["FirstName"];
	echo $studentno = $row["StudentID"];
}

$query2 = mysql_query("INSERT INTO marksheet(SIDstart, SID, Sln, Sfn, PresID, Lln, Lfn, M1, M1Feed, M2, M2Feed, M3, M3Feed, M4, M4Feed, M5, M5Feed, OverallFeed, TotalM) values ($stid,'$studentno', '$lname', '$fname', '$preid', '$login_lastname', '$login_session', $cr1, '$fee1', $cr2, '$fee2', $cr3, '$fee3', $cr4, '$fee4', $cr5, '$fee5', '$feed', $total)", $connection);

//calculating and storing average for the student

$queryavg = mysql_query("select * from average where studentidavg='$stid'", $connection); 
$rowsavg = mysql_num_rows($queryavg);
if ($rowsavg == 1) { // check if already exist in the table
$storedaverage = mysql_fetch_assoc($queryavg);
$average = $storedaverage['AverageScore'];
$numberofmarkings = $storedaverage['MarkingsNumber'];
$numberofmarkings = $numberofmarkings + 1;
$average = $average + $total;
$average = $average/$numberofmarkings;
$averagecal = floatval($average);
$querystoreavg = mysql_query("UPDATE average SET MarkingsNumber=$numberofmarkings, AverageScore=$averagecal  WHERE studentidavg=$stid", $connection);
} else { //if it student does not exist in the table then insert
$numberofmarkings = 1;	
$average = $total;
$querystoreavg = mysql_query("INSERT INTO average(studentidavg, stdtavglastname, stdavgfirstname, MarkingsNumber, PresentIDavg, AverageScore) values ($stid, '$lname', '$fname', $numberofmarkings, '$preid', $average)", $connection);
}


header("location: lecturer.php"); // Redirecting To Other Page
// echo "<br/><br/><span>Data Inserted successfully...!!</span>";
// $name = $_POST['name'];
// $email = $_POST['email'];
// $contact = $_POST['contact'];
// $address = $_POST['address'];
// if($name !=''||$email !=''){
// //Insert Query of SQL
// $query = mysql_query("insert into students(student_name, student_email, student_contact, student_address) values ('$name', '$email', '$contact', '$address')");
// echo "<br/><br/><span>Data Inserted successfully...!!</span>";
// }
// else{
// echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";

// }
}
mysql_close($connection); // Closing Connection with Server
?>