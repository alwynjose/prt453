
<?php
//include db configuration file
include_once("config.php");

if(isset($_POST['student_id']) || isset($_POST['present_id'])) 
{ 
 $student_id=$_POST['student_id']; 
 $present_id=$_POST['present_id']; 
  
// $query = mysql_query("SELECT LastName, PresentID FROM students WHERE ID='$student_id'", $connection);
$query = mysql_query("SELECT students.LastName, students.FirstName, students.StudentID, students.PresentID, presentation.* FROM students, presentation WHERE students.ID ='$student_id' AND students.PresentID = presentation.Presentation_name", $connection);

while($row = mysql_fetch_assoc($query))
{

      $lastname = $row["LastName"];   
      $firstname = $row["FirstName"]; 
      $studentno = $row["StudentID"];    
      $presentid = $row["PresentID"];      
      $criteria1 = $row["c_1"];
      $criteria2 = $row["c_2"];
      $criteria3 = $row["c_3"];
      $criteria4 = $row["c_4"];
      $criteria5 = $row["c_5"];
      $criteria1_max = $row["c_1_max"];
      $criteria2_max = $row["c_2_max"];
      $criteria3_max = $row["c_3_max"];
      $criteria4_max = $row["c_4_max"];
      $criteria5_max = $row["c_5_max"];
      $overallfeed = $row["feedback"];

      $firstname = strtoupper($firstname);
      $lastname = strtoupper($lastname);


echo '
<div class="feedbackform">
<div class="feedbackform-student-details">
  <p><span class="glyphicon glyphicon-education"></span> STUDENT NAME: <span style="font-weight:bold;">'.$firstname.' '.$lastname.' </span> || STUDENT NO: <span style="font-weight:bold;">'.$studentno.'</span> || PRESENTATION: <span style="font-weight:bold;">'.$presentid.'</span></p>
</div>
<!-- Marking Criteria Starts -->
<form action="markfeedsave.php?stid='.$student_id.'&preid='.$presentid.'" method="post">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><span class="glyphicon glyphicon-circle-arrow-down" style="padding-right:5px;"></span>'.$criteria1.'<span style="float:right;" id="demo1"></span></a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
        	<div class="col-xs-2 col-md-3">
			  <label for="ex1">Maximum Score '.$criteria1_max.'</label>
			  <input name="crit1" class="form-control" id="ex1" type="number" min="0" max="'.$criteria1_max.'">
			  <label for="ex1">Feedback for '.$criteria1.'</label>
			  <textarea name="feed1" class="form-control" rows="2" id="comment"></textarea>
			  <!-- <input rows="2" class="form-control" id="ex1" type="text"> -->
			</div>
		</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span class="glyphicon glyphicon-circle-arrow-down" style="padding-right:5px;"></span>'.$criteria2.'<span style="float:right;" id="demo2"></span></a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
        	<div class="col-xs-2 col-md-3">
			  <label for="ex1">Maximum Score '.$criteria2_max.'</label>
			  <input name="crit2" class="form-control" id="ex2" type="number" min="0" max="'.$criteria2_max.'">
			  <label for="ex1">Feedback for '.$criteria2.'</label>
			  <textarea name="feed2" class="form-control" rows="2" id="comment"></textarea>
			  <!-- <input name="feed2" class="form-control" id="ex1" type="text"> -->
			</div>
		</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><span class="glyphicon glyphicon-circle-arrow-down" style="padding-right:5px;"></span>'.$criteria3.' <span style="float:right;" id="demo3"></span></a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
        	<div class="col-xs-2 col-md-3">
			  <label for="ex1">Maximum Score '.$criteria3_max.'</label>
			  <input name="crit3" class="form-control" id="ex3" type="number" min="0" max="'.$criteria3_max.'">
			  <label for="ex1">Feedback for '.$criteria3.'</label>
			  <textarea name="feed3" class="form-control" rows="2" id="comment"></textarea>
			  <!-- <input name="feed3" class="form-control" id="ex1" type="text"> -->
			</div>
		</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><span class="glyphicon glyphicon-circle-arrow-down" style="padding-right:5px;"></span>'.$criteria4.'<span style="float:right;" id="demo4"></span></a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
        	<div class="col-xs-2 col-md-3">
			  <label for="ex1">Maximum Score '.$criteria4_max.'</label>
			  <input name="crit4" class="form-control" id="ex4" type="number" min="0" max="'.$criteria4_max.'">
			  <label for="ex1">Feedback for '.$criteria4.'</label>
			  <textarea name="feed4" class="form-control" rows="2" id="comment"></textarea>
			  <!-- <input name="feed4" class="form-control" id="ex1" type="text"> -->
			</div>
		</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"><span class="glyphicon glyphicon-circle-arrow-down" style="padding-right:5px;"></span>'.$criteria5.'<span style="float:right;" id="demo5"></span></a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">
        	<div class="col-xs-2 col-md-3">
			  <label for="ex1">Maximum Score '.$criteria5_max.'</label>
			  <input name="crit5" class="form-control" id="ex5" type="number" min="0" max="'.$criteria5_max.'">
			  <label for="ex1">Feedback for '.$criteria5.'</label>
			  <textarea name="feed5" class="form-control" rows="2" id="comment"></textarea>
			  <!-- <input name="feed5" class="form-control" id="ex1" type="text"> -->
			</div>
		</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6"><span class="glyphicon glyphicon-circle-arrow-down" style="padding-right:5px;"></span>'.$overallfeed.'</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">
        	<div class="col-xs-12 col-md-6">
			  <label for="ex1">Write your feedback below:</label>
			  <textarea name="feedfinal" class="form-control" rows="5" id="comment"></textarea>
			  <!-- <input name="feedfinal" class="form-control" id="feedbackform" type="text" maxlength="350"> -->
			</div>
		</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <span style="padding-right:5px;" class="glyphicon glyphicon-list-alt pull-left"></span><a style="font-weight:bold;" data-toggle="collapse" data-parent="#accordion" href="#collapse7" onclick="myFunction1('.$criteria1_max.','.$criteria2_max.','.$criteria3_max.','.$criteria4_max.','.$criteria5_max.')"> View Total Score</a>
        </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse">
        <div class="panel-body">
        	<div class="col-xs-2 col-md-3">
			  <p id="demototal"></p>
			</div>
			<span style="float:right;" id="test"></span>
		</div>
      </div>
    </div>
  </div> 
 </form> 

</div>


<!-- Marking Crteria Ends -->

</div>';


}



}
mysql_close($connection); // Closing Connection
?>




