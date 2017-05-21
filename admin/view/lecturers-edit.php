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
          <label class="col-sm-2 control-label">Session Key</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="lectsessionidadd" placeholder="" value="'.$sessionidedit.'"/>
          <span class="help-block" style="color:white;">You can use the session key generated through "GENERATE SESSION KEY" button below.</span>
          </div> 
          
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Presentation Name</label>
          <div class="col-sm-5">'; 
          // <input class="form-control" type="text" name="lectpresentnameadd" placeholder="" required="required" value="'.$lpresentidedit.'"/>
          
          $sql1 = "SELECT Presentation_name FROM presentation WHERE Presentation_name <> '$lpresentidedit'";
          $result1 = mysql_query($sql1,$connection);

          echo '<select name="lectpresentnameadd" class="form-control">
          <option value="'.$lpresentidedit.'">'.$lpresentidedit.'</option>
          <option value=""></option>';
          while ($row = mysql_fetch_array($result1)) {
              echo '<option value="'. $row['Presentation_name'] .'">' . $row['Presentation_name'] .'</option>';
          }
          echo '</select>';


          echo '<span class="help-block" style="color:white;">If you cannot find the presentation name in the drop down list, <a href="admin.php?view=padd"></br>create one here.</a></span>
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
<div class="create-session">
    <div class="create-session-button">
      <button class="btn btn-default btn-large" onclick="createSession()">CLICK TO GENERATE SESSION KEY</button>
    </div>
    <div class="create-session-number">
      <p id="sessionnumber"></p>
    </div>
</div>
<script>
function createSession() {
    var x = document.getElementById("sessionnumber")
    x.innerHTML = Math.floor((Math.random() * 1000000) + 10000);
}
</script>
 </div>

