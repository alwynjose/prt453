  <div class="admin-right">
<?php

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

$querytoinsertpresentation = "INSERT INTO presentation(Presentation_name, c_1, c_1_max, c_2, c_2_max, c_3, c_3_max, c_4, c_4_max, c_5, c_5_max) VALUES ('$presentationname', '$crit1', $crit1max, '$crit2', $crit2max, '$crit3', $crit3max, '$crit4', $crit4max, '$crit5', $crit5max)";

$con = mysql_connect("localhost", "root", "");  
$selectdb = mysql_select_db("mfs",$con);  
$result = mysql_query("SELECT Presentation_name FROM presentation WHERE Presentation_name='$presentationname'");

$number_of_results = mysql_num_rows($result); 
if ($number_of_results>0) {
  echo "<b>Presentation details already exist in the name:".$presentationname."</b>"; 
} else {

$insertstudentdetails = mysql_query($querytoinsertpresentation,$con);


mysql_close($con);
header("location: admin.php?view=pview");
}

} else {


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
            <input class="form-control" type="text" name="presentationname" placeholder="" required="required" "/>
          </div>
        </div>
        <div class="form-group">  
          <label class="col-sm-2 control-label">Criteria One</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="Criteria1" placeholder="" required="required" />
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-2 control-label">Max Marks for Criteria One</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="number" name="Criteria1max" placeholder="" />
          </div>           
        </div>
        <div class="form-group">  
          <label class="col-sm-2 control-label">Criteria Two</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="Criteria2" placeholder="" required="required" />
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-2 control-label">Max Marks for Criteria Two</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="number" name="Criteria2max" placeholder="" />
          </div>           
        </div>
        <div class="form-group">  
          <label class="col-sm-2 control-label">Criteria Three</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="Criteria3" placeholder="" required="required" />
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-2 control-label">Max Marks for Criteria Three</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="number" name="Criteria3max" placeholder="" />
          </div>           
        </div>
       <div class="form-group">  
          <label class="col-sm-2 control-label">Criteria Four</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="Criteria4" placeholder="" required="required" />
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-2 control-label">Max Marks for Criteria Four</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="number" name="Criteria4max" placeholder="" />
          </div>           
        </div>
       <div class="form-group">  
          <label class="col-sm-2 control-label">Criteria Five</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="text" name="Criteria5" placeholder="" required="required" />
          </div> 
        </div> 
        <div class="form-group">
          <label class="col-sm-2 control-label">Max Marks for Criteria Five</label>
          <div class="col-sm-5"> 
          <input class="form-control" type="number" name="Criteria5max" placeholder="" />
          </div>           
        </div>

     
      <div class="add-student-form-submite-button">
        <button type="submit" name="submit" class="btn btn-primary btn-large">ADD CRITERIA</button>
      </div>
  </form>
  </div>
</div>';

}
  



?>
 </div>

