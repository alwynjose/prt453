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

$cr1 = $_POST['crit1'];
$cr2 = $_POST['crit2'];
$cr3 = $_POST['crit3'];
$cr4 = $_POST['crit4'];
$cr5 = $_POST['crit5'];	
$fee1 = $_POST['feed1'];
$fee2 = $_POST['feed2'];
$fee3 = $_POST['feed3'];
$fee4 = $_POST['feed4'];
$fee5 = $_POST['feed5'];
$feed = $_POST['feedfinal'];
$total = $cr1+$cr2+$cr3+$cr4+$cr5;


$query1 = mysql_query("SELECT LastName, FirstName, PresentID FROM students WHERE ID ='$stid'", $connection);
while($row = mysql_fetch_assoc($query1)) {

	$lname = $row["LastName"];
	$fname = $row["FirstName"];
}

$query2 = mysql_query("insert into test(b,c,d,e) values ($cr1, '$lname', $cr2, '$fee2')", $connection);
echo "<br/><br/><span>Data Inserted successfully...!!</span>";
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