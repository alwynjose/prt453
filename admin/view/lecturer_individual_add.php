  <div class="admin-right">
<?php

if(isset($_POST['submit'])){
$leclnameadd=$_POST['leclnameadd'];
$lecfnameadd=$_POST['lecfnameadd'];
$lecpresentadd=$_POST['lecpresentnameadd'];


//checking if Session ID is empty
  if (!isset($_POST['lecsessionidadd']) || empty($_POST['lecsessionidadd'])) {
    $lecsesidadd="NULL";
    $querytoaddnull = "INSERT INTO lecturers(LLastName, LFirstName, SessionID, LPresentID) VALUES ('$leclnameadd', '$lecfnameadd', $lecsesidadd, '$lecpresentadd')";
    
    } else {
    $lecsesidadd=$_POST['lecsessionidadd'];
    $querytoaddnull = "INSERT INTO lecturers(LLastName, LFirstName, SessionID, LPresentID) VALUES ('$leclnameadd', '$lecfnameadd', '$lecsesidadd', '$lecpresentadd')";
    }




$con = mysql_connect("localhost", "root", "");  
$selectdb = mysql_select_db("mfs",$con);  
$result = mysql_query("SELECT * FROM lecturers WHERE (LLastName='$leclnameadd' AND LFirstName='$lecfnameadd') AND LPresentID='$lecsesidadd'");
$number_of_results = mysql_num_rows($result); 
if ($number_of_results>0) {
  echo "<b>Lecturer details already exist for Presentation:".$lecpresentadd."</b>"; 
} else {

$insertstudentdetails = mysql_query($querytoaddnull,$con);


mysql_close($con);
header("location: admin.php?view=lview");
}

} else {

echo '
<div class="add-student-details">
  <div class="add-student-form-detail">
  <p>ENTER LECTURER DETAILS</p>
  </div>
  <div class="add-student-form">
  <form method="post" class="form-horizontal">
      
        <div class="form-group">
          <label class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-5"> 
            <input class="form-control" type="text" name="leclnameadd" placeholder="" required="required">
          </div>
        </div>
        <div class="form-group">  
          <label class="col-sm-2 control-label">First Name</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="lecfnameadd" placeholder="" required="required">
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-2 control-label">Session Key</label>
          <div class="col-sm-5"> 
          <input id="sessionnumberenter" class="form-control" type="text" name="lecsessionidadd" placeholder=""/>
          <span class="help-block" style="color:white;">You can use the session key generated through "GENERATE SESSION KEY" button below.</span>
          </div> 
          
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Presentation Allotted</label>
          <div class="col-sm-5"> 
          ';

          $sql1 = "SELECT Presentation_name FROM presentation";
          $result1 = mysql_query($sql1,$connection);

          echo '<select name="lecpresentnameadd" class="form-control">
          <option value=""></option>';
          while ($row = mysql_fetch_array($result1)) {
              echo '<option value="'. $row['Presentation_name'] .'">' . $row['Presentation_name'] .'</option>';
          }
          echo '</select>';

          echo '
          <span class="help-block" style="color:white;">If you cannot find the presentation name in the drop down list, <a href="admin.php?view=padd"></br>create one here.</a></span>
          </div> 

        </div>
      
      <div class="add-student-form-submite-button">
        <button type="submit" name="submit" class="btn btn-primary btn-large">ADD LECTURER</button>
      </div>
  </form>
  </div>
</div>';

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
    document.getElementById("sessionnumberenter").value = x.innerHTML;
}
</script>
 </div>

