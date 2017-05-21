  <div class="admin-right">
<?php

if(isset($_POST['submit'])){
$stdlnameadd=$_POST['studlnameadd'];
$stdfnameadd=$_POST['studfnameadd'];
$stdpresentadd=$_POST['presentnameadd'];
$stdtimeadd=$_POST['presenttimestart'];
$stdtimeaddstop=$_POST['presenttimeend'];



//checking if student ID is empty
  if (!isset($_POST['studidadd']) || empty($_POST['studidadd'])) {
    $stdidadd="NULL";
    $querytoaddnull = "INSERT INTO students(LastName, FirstName, StudentID, PresentID, PreTimeStart, PreTimeEnd) VALUES ('$stdlnameadd', '$stdfnameadd', $stdidadd, '$stdpresentadd', '$stdtimeadd', '$stdtimeaddstop')";
    
    } else {
    $stdidadd=$_POST['studidadd'];
    $querytoaddnull = "INSERT INTO students(LastName, FirstName, StudentID, PresentID, PreTimeStart, PreTimeEnd) VALUES ('$stdlnameadd', '$stdfnameadd', '$stdidadd', '$stdpresentadd', '$stdtimeadd', '$stdtimeaddstop')";
    }




$con = mysql_connect("localhost", "root", "");  
$selectdb = mysql_select_db("mfs",$con);  
$result = mysql_query("SELECT * FROM students WHERE (LastName='$stdlnameadd' AND FirstName='$stdfnameadd') AND PresentID='$stdpresentadd'");
$number_of_results = mysql_num_rows($result); 
if ($number_of_results>0) {
  echo "<b>Student details already exist for Presentation:".$stdpresentadd."</b>";
} else {

$insertstudentdetails = mysql_query($querytoaddnull,$con);


mysql_close($con);
header("location: admin.php");
}

} else {

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
            <input class="form-control" type="text" name="studlnameadd" placeholder="" required="required">
          </div>
        </div>
        <div class="form-group">  
          <label class="col-sm-2 control-label">First Name</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="studfnameadd" placeholder="" required="required">
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-2 control-label">Student ID</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="studidadd" placeholder=""  />
          <span class="help-block" style="color:white;">Enter Student ID starting with "s". Eg: s200010</span>
          </div> 
          
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Presentation Name</label>
          <div class="col-sm-5"> ';

          // <input class="form-control" type="text" name="presentnameadd" placeholder="" required="required" />

           $sql1 = "SELECT Presentation_name FROM presentation";
          $result1 = mysql_query($sql1,$connection);

          echo '<select name="presentnameadd" class="form-control">
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
          <label class="col-sm-2 control-label">Time Start</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="time" name="presenttimestart" placeholder=""  />
          </div> 
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Time Stop</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="time" name="presenttimeend" placeholder=""  />
          </div> 
        </div>
      
      <div class="add-student-form-submite-button">
        <button type="submit" name="submit" class="btn btn-primary btn-large">ADD STUDENT</button>
      </div>
  </form>
  </div>
</div>';

}
  



?>
 </div>

