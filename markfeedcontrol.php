
<?php
//include db configuration file
include_once("config.php");

if(isset($_POST['student_id'])) 
{ 
 $student_id=$_POST['student_id']; 
  
$query = mysql_query("SELECT LastName FROM students WHERE ID='$student_id'", $connection);

while($row = mysql_fetch_array($query))
{

      $lastname = $row["LastName"];
      echo $lastname;

  }

}
mysql_close($connection); // Closing Connection
?>




