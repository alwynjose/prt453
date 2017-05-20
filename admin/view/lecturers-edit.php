  <div class="admin-right">
<?php
$lectureridedit = $_GET['lectid'];
if(isset($_POST['submit'])){


$lectlnameadd=$_POST['lectlnameadd'];
$lectfnameadd=$_POST['lectfnameadd'];
$lectpresentadd=$_POST['lectpresentnameadd'];


//checking if student ID is empty
  if (!isset($_POST['lectsessionidadd']) || empty($_POST['lectsessionidadd'])) {
    $lectsessionid="NULL";
    $querytoupdatenull = "UPDATE lecturers SET LLastName='$lectlnameadd', LFirstName='$lectfnameadd', SessionID=$lectsessionid, LPresentID='$lectpresentadd'  WHERE LID=$lectureridedit";
    
    } else {
    $lectsessionid=$_POST['lectsessionidadd'];
    $querytoupdatenull = "UPDATE lecturers SET LLastName='$lectlnameadd', LFirstName='$lectfnameadd', SessionID=$lectsessionid, LPresentID='$lectpresentadd'  WHERE LID=$lectureridedit";
    } 

$con = mysql_connect("localhost", "root", "");  
$selectdb = mysql_select_db("mfs",$con);  

$updatelecturerdetails = mysql_query($querytoupdatenull,$con);
header("location: admin.php?view=lview");
} else {

  
  $con = mysql_connect("localhost", "root", "");  
  $selectdb = mysql_select_db("mfs",$con); 
  $sql = "SELECT * FROM lecturers WHERE LID=$lectureridedit";
  $result = mysql_query($sql, $con);

if (mysql_num_rows($result) > 0) {
     // output data of each row
     while($rowedit = mysql_fetch_assoc($result)) {
      $llastnameedit = $rowedit["LLastName"];
      $lfirstnameedit = $rowedit["LFirstName"];
      $lpresentidedit = $rowedit["LPresentID"];

      if (is_null($rowedit["SessionID"])||empty($rowedit["SessionID"])){
      $sessionidedit = "";
      } else {
        $sessionidedit = $rowedit["SessionID"];
      }
      

      echo '
<div class="add-student-details">
  <div class="add-student-form-detail">
  <p>ENTER LETURER DETAILS</p>
  </div>
  <div class="add-student-form">
  <form method="post" class="form-horizontal">
      
        <div class="form-group">
          <label class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-5"> 
            <input class="form-control" type="text" name="lectlnameadd" placeholder="" required="required" value="'.$llastnameedit.'"/>
          </div>
        </div>
        <div class="form-group">  
          <label class="col-sm-2 control-label">First Name</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="lectfnameadd" placeholder="" required="required" value="'.$lfirstnameedit.'"/>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-2 control-label">Session ID</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="lectsessionidadd" placeholder="" value="'.$sessionidedit.'"/>
          </div> 
          
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Presentation Name</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="lectpresentnameadd" placeholder="" required="required" value="'.$lpresentidedit.'"/>
          </div> 
        </div>
      
      <div class="add-student-form-submite-button">
        <button type="submit" name="submit" class="btn btn-primary btn-large">UPDATE LECTURER</button>
      </div>
  </form>
  </div>
</div>';

}

} else 
  echo "<b>ID does not Exists</b>";

mysql_close($con);

}

?>
 </div>

