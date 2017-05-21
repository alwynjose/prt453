  <?php
  include('session.php');
  //delete student with id from table students
  if(isset($_GET['studentiddel'])){ 
  $studentiddellect = $_GET['studentiddel'];
  $querytodeletestudent = "DELETE FROM students WHERE ID=$studentiddellect";
  
  $deletestudentidlect = mysql_query($querytodeletestudent, $connection);
  header("location: admin.php");
} else if (isset($_GET['lectureiddel'])){ 
  //delete lecturer with id from table students
  $lectureiddellect = $_GET['lectureiddel'];
  $querytodeletelecturer = "DELETE FROM lecturers WHERE LID=$lectureiddellect";
  
  $deletelectureridlect = mysql_query($querytodeletelecturer, $connection);
  header("location: admin.php?view=lview");
  } else if (isset($_GET['presentiddel'])){ 
    //delete presentation with id from table students
  $presentationiddelpres = $_GET['presentiddel'];
  $querytodeletepresentation = "DELETE FROM presentation WHERE id=$presentationiddelpres";
  
  $deletepresentationidpres = mysql_query($querytodeletepresentation, $connection);
  header("location: admin.php?view=pview");
  }

?>
