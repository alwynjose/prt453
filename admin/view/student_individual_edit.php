  <div class="admin-right">
<?php
$studentidedit = $_GET['studid'];
if(isset($_POST['submit'])){


$stdlnameadd=$_POST['studlnameadd'];
$stdfnameadd=$_POST['studfnameadd'];
$stdpresentadd=$_POST['presentnameadd'];
$stdtimeadd=$_POST['presenttimestart'];
$stdtimeaddstop=$_POST['presenttimeend'];


//checking if student ID is empty
  if (!isset($_POST['studidadd']) || empty($_POST['studidadd'])) {
    $stdidadd="NULL";
    $querytoupdatenull = "UPDATE students SET LastName='$stdlnameadd', FirstName='$stdfnameadd', StudentID=$stdidadd, PresentID='$stdpresentadd', PreTimeStart='$stdtimeadd', PreTimeEnd='$stdtimeaddstop'  WHERE ID=$studentidedit";
    
    } else {
    $stdidadd=$_POST['studidadd'];
    $querytoupdatenull = "UPDATE students SET LastName='$stdlnameadd', FirstName='$stdfnameadd', StudentID='$stdidadd', PresentID='$stdpresentadd', PreTimeStart='$stdtimeadd', PreTimeEnd='$stdtimeaddstop'  WHERE ID=$studentidedit";
    } 

$con = mysql_connect("localhost", "root", "");  
$selectdb = mysql_select_db("mfs",$con);  

$updatestudentdetails = mysql_query($querytoupdatenull,$con);
header("location: admin.php");
} else {

  
  $con = mysql_connect("localhost", "root", "");  
  $selectdb = mysql_select_db("mfs",$con); 
  $sql = "SELECT * FROM students WHERE ID=$studentidedit";
  $result = mysql_query($sql, $con);

if (mysql_num_rows($result) > 0) {
     // output data of each row
     while($rowedit = mysql_fetch_assoc($result)) {
      $lastnameedit = $rowedit["LastName"];
      $firstnameedit = $rowedit["FirstName"];
      $presentidedit = $rowedit["PresentID"];
      $studidedit = $rowedit["StudentID"];
        //stripping Last 3 Characters of the Time data type 00:0:00 Starts
      $pstartedit = substr($rowedit["PreTimeStart"], 0, -3);
      $pEndedit   = substr($rowedit["PreTimeStart"], 0, -3);
        //stripping Last 3 Characters of the Time data type 00:0:00 Ends
      echo '
<div class="add-student-details">
  <div class="add-student-form-detail">
  <p>ENTER STUDENT DETAILS</p>
  </div>
  <div class="add-student-form">
  <form method="post" class="form-horizontal">
      
        <div class="form-group">
          <label class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-5"> 
            <input class="form-control" type="text" name="studlnameadd" placeholder="" required="required" value="'.$lastnameedit.'"/>
          </div>
        </div>
        <div class="form-group">  
          <label class="col-sm-2 control-label">First Name</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="studfnameadd" placeholder="" required="required" value="'.$firstnameedit.'"/>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-2 control-label">Student ID</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="studidadd" placeholder="" value="'.$studidedit.'"/>
          <span class="help-block" style="color:white;">Enter Student ID starting with "s". Eg: s200010</span>
          </div> 
          
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Presentation Name</label>
          <div class="col-sm-5"> ';

          // <input class="form-control" type="text" name="presentnameadd" placeholder="" required="required" value="'.$presentidedit.'"/>

          $sql1 = "SELECT Presentation_name FROM presentation WHERE Presentation_name <> '$presentidedit'";
          $result1 = mysql_query($sql1,$connection);

          echo '<select name="presentnameadd" class="form-control">
          <option value="'.$presentidedit.'">'.$presentidedit.'</option>
          <option value=""></option>';
          while ($row = mysql_fetch_array($result1)) {
              echo '<option value="'. $row['Presentation_name'] .'">' . $row['Presentation_name'] .'</option>';
          }
          echo '</select>';


          echo '
          <span class="help-block" style="color:white;">If you cannot find the presentation name in the drop down list, <a href="admin.php?view=padd"></br>create one here.</a></span>
          </div> 

        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Time Starts</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="time" name="presenttimestart" placeholder=""  value="'.$pstartedit.'"/>
          </div> 
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Time Ends</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="time" name="presenttimeend" placeholder=""  value="'.$pEndedit.'"/>
          </div> 
        </div>
      
      <div class="add-student-form-submite-button">
        <button type="submit" name="submit" class="btn btn-primary btn-large">UPDATE STUDENT</button>
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

