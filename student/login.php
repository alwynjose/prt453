<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username'])) {
$error = "Student ID is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
// $password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
// $password = stripslashes($password);
$username = mysql_real_escape_string($username);
// $password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("mfs", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("SELECT * FROM  Students WHERE StudentID='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: student.php"); // Redirecting To Other Page
} else {
$error = "<p style='color:white; text-align:center;margin-top:50px; font-size:15px;'><b><span class='glyphicon glyphicon-warning-sign'></span> Invalid Session ID</b></p>";
echo $error;
}
mysql_close($connection); // Closing Connection
}
}
?>