  <div class="admin-right">
<?php
$lectureridedit = $_GET['pid'];
if(isset($_POST['submit'])){


$presentationname=$_POST['presentationname'];
$crit1=$_POST['Criteria1'];
$crit1max=$_POST['Criteria1max'];
$crit2=$_POST['Criteria2'];
$crit2max=$_POST['Criteria2max'];
$crit3=$_POST['Criteria3'];
$crit3max=$_POST['Criteria3max'];
$crit4=$_POST['Criteria4'];
$crit4max=$_POST['Criteria4max'];
$crit5=$_POST['Criteria5'];
$crit5max=$_POST['Criteria5max'];





$querytoupdatenull = "UPDATE presentation SET Presentation_name='$presentationname', c_1='$crit1', c_1_max=$crit1max, c_2='$crit2', c_2_max=$crit2max, c_3='$crit3', c_3_max=$crit3max, c_4='$crit4', c_4_max=$crit4max, c_5='$crit5', c_5_max=$crit5max WHERE id=$lectureridedit";


$con = mysql_connect("localhost", "root", "");  
$selectdb = mysql_select_db("mfs",$con);    
$updatelecturerdetails = mysql_query($querytoupdatenull,$con);

// $checkpresentationduplicate = "SELECT Presentation_name FROM presentation WHERE Presentation_name='$presentationname'";
// $result = mysql_query($checkpresentationduplicate, $con);
// if (mysql_num_rows($result) > 0) {
//   echo "<b>Presentation Already Exists</b>";
// } else {
//   $updatelecturerdetails = mysql_query($querytoupdatenull,$con);
header("location: admin.php?view=pview");
mysql_close($con);



} else {

  
  $con = mysql_connect("localhost", "root", "");  
  $selectdb = mysql_select_db("mfs",$con); 
  $sql = "SELECT * FROM presentation WHERE id=$lectureridedit";
  $result = mysql_query($sql, $con);

  if (mysql_num_rows($result) > 0) {
     // output data of each row
     while($rowedit = mysql_fetch_assoc($result)) {
        $presentationid = $rowedit["id"];
        $Presentationname = $rowedit["Presentation_name"];
        $Criteria1 = $rowedit["c_1"];
        $Criteria1max = $rowedit["c_1_max"];
        $Criteria2 = $rowedit["c_2"];
        $Criteria2max = $rowedit["c_2_max"];
        $Criteria3 = $rowedit["c_3"];
        $Criteria3max = $rowedit["c_3_max"];
        $Criteria4 = $rowedit["c_4"];
        $Criteria4max = $rowedit["c_4_max"];
        $Criteria5 = $rowedit["c_5"];
        $Criteria5max = $rowedit["c_5_max"];

      

      echo '
<div class="add-student-details">
  <div class="add-student-form-detail">
  <p>ENTER PRESENTATION DETAILS</p>
  </div>
  <div class="add-student-form">
  <form method="post" class="form-horizontal">
      
        <div class="form-group">
          <label class="col-sm-2 control-label">Presentation Name</label>
          <div class="col-sm-5"> 
            <input class="form-control" type="text" name="presentationname" placeholder="" required="required" value="'.$Presentationname.'"/>
          </div>
        </div>
        <div class="form-group">  
          <label class="col-sm-2 control-label">Criteria One</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="Criteria1" placeholder="" required="required" value="'.$Criteria1.'"/>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-2 control-label">Max Marks for Criteria One</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="number" name="Criteria1max" placeholder="" value="'.$Criteria1max.'"/>
          </div>           
        </div>
        <div class="form-group">  
          <label class="col-sm-2 control-label">Criteria Two</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="Criteria2" placeholder="" required="required" value="'.$Criteria2.'"/>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-2 control-label">Max Marks for Criteria Two</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="number" name="Criteria2max" placeholder="" value="'.$Criteria2max.'"/>
          </div>           
        </div>
        <div class="form-group">  
          <label class="col-sm-2 control-label">Criteria Three</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="Criteria3" placeholder="" required="required" value="'.$Criteria3.'"/>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-2 control-label">Max Marks for Criteria Three</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="number" name="Criteria3max" placeholder="" value="'.$Criteria3max.'"/>
          </div>           
        </div>
       <div class="form-group">  
          <label class="col-sm-2 control-label">Criteria Four</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="Criteria4" placeholder="" required="required" value="'.$Criteria4.'"/>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-2 control-label">Max Marks for Criteria Four</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="number" name="Criteria4max" placeholder="" value="'.$Criteria4max.'"/>
          </div>           
        </div>
       <div class="form-group">  
          <label class="col-sm-2 control-label">Criteria Five</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="Criteria5" placeholder="" required="required" value="'.$Criteria5.'"/>
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-2 control-label">Max Marks for Criteria Five</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="number" name="Criteria5max" placeholder="" value="'.$Criteria5max.'"/>
          </div>           
        </div>

     
      <div class="add-student-form-submite-button">
        <button type="submit" name="submit" class="btn btn-primary btn-large">UPDATE CRITERIA</button>
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

