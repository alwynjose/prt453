  <div class="admin-right">
<?php
if(isset($_GET['lectid'])){

$lectidview = $_GET['lectid'];

$sql = "SELECT * FROM lecturers WHERE LID=$lectidview";
$result = mysql_query($sql, $connection);

if (mysql_num_rows($result) > 0) {
     // output data of each row
     while($row = mysql_fetch_assoc($result)) {
      $lastnameview = strtoupper($row["LLastName"]);
      $firstnameview = strtoupper($row["LFirstName"]);
      $presentidview = $row["LPresentID"];
      
      if (empty($row["SessionID"]) || is_null($row["SessionID"])) {
        $sessionidview="Not Provided";
      } else {
        $sessionidview = $row["SessionID"];
      }


    echo '<div class="view-student-details-grid">
          <div class="view-student-details-heading">
            <h4><span class="glyphicon glyphicon-education"></span> Leturer Details</h4>

          </div>
          <div class="view-student-details">
            <div class="view-student-details-basic">
            
              <h4>Lecturer Last Name:</h4>
              <p>'.$lastnameview.'</p>
              <h4>Lecturer First Name:</h4>
              <p>'.$firstnameview.'</p>
              <h4>Session ID:</h4>
              <p>'.$sessionidview.'</p>
              <h4>Presentation Alloted:</h4>
              <p>'.$presentidview.'</p>            
            </div>
          </div>
          <div class="view-student-details-edit">
          <a href="admin.php?view=ledit&lectid='.$lectidview.'" class="btn btn-info btn-xs pull-right"><span class="glyphicon glyphicon-edit"></span> Edit</a>
          </div>
          </div>' ;
mysql_free_result($result); 



$sql3 = "SELECT * FROM marksheet WHERE (Lln='$lastnameview' AND Lfn='$firstnameview') AND PresID='$presentidview'";
$result = mysql_query($sql3, $connection);       
        if (mysql_num_rows($result) > 0) {
     // output data of each row
          while($row = mysql_fetch_assoc($result)) {

             $studlnamemark = strtoupper($row["Sln"]);
             $studfnamemark  = strtoupper($row["Sfn"]);
             $lectmarkm1  = $row["M1"]; 
             if (empty($row["M1Feed"])) {
              $lectmarkm1feed  = "No Feedback provided";
             } else {
              $lectmarkm1feed  = $row["M1Feed"];   
             }
                       
             $lectmarkm2  = $row["M2"];
             if (empty($row["M2Feed"])) {
              $lectmarkm2feed  = "No Feedback provided";
             } else {
              $lectmarkm2feed  = $row["M2Feed"];   
             }

             $lectmarkm3  = $row["M3"];
             if (empty($row["M3Feed"])) {
              $lectmarkm3feed  = "No Feedback provided";
             } else {
              $lectmarkm3feed  = $row["M3Feed"];   
             }
             
             $lectmarkm4  = $row["M4"];
             if (empty($row["M4Feed"])) {
              $lectmarkm4feed  = "No Feedback provided";
             } else {
              $lectmarkm4feed  = $row["M4Feed"];   
             }

             $lectmarkm5  = $row["M5"];
             if (empty($row["M5Feed"])) {
              $lectmarkm5feed  = "No Feedback provided";
             } else {
              $lectmarkm5feed  = $row["M5Feed"];   
             }

             if (empty($row["OverallFeed"])) {
              $lectoverallfeed  = "No Feedback provided";
             } else {
              $lectoverallfeed  = $row["OverallFeed"];   
             }

             $lecttotalmark = $row["TotalM"];




            echo '
            <div class="view-student-details-grid">
            <div class="view-student-details-heading">
            <h4><span class="glyphicon glyphicon-list-alt"></span> Score Card Available for:</h4>
            </div>
            <div class="view-student-details materialize">
            <div class="view-student-details-basic">
            
              <h4>Marked For Student:</h4>
              <p>'.$studfnamemark.' '.$studlnamemark.'</p>
              <h4>Presentation Skills Mark Received:</h4>
              <p>'.$lectmarkm1.'</p>
              <h4>Presentation Skills Feedback:</h4>
              <p>'.$lectmarkm1feed.'</p>
              <h4>Structure of Presentation Mark Received:</h4>
              <p>'.$lectmarkm2.'</p>
              <h4>Structure of Presentation Feedback:</h4>
              <p>'.$lectmarkm2feed.'</p>
              <h4>Technical Depth Mark Received:</h4>
              <p>'.$lectmarkm3.'</p>
              <h4>Technical Depth Feedback:</h4>
              <p>'.$lectmarkm3feed.'</p>
              <h4>Appropriate Level For Audience Mark Received:</h4>
              <p>'.$lectmarkm4.'</p>
              <h4>Appropriate Level For Audience Feedback:</h4>
              <p>'.$lectmarkm4feed.'</p>
              <h4>Response to Questions Mark Received:</h4>
              <p>'.$lectmarkm5.'</p>
              <h4>Response to Questions Feedback:</h4>
              <p>'.$lectmarkm5feed.'</p>
              <h4>Overall Feedback:</h4>
              <p>'.$lectoverallfeed.'</p>

            </div>
            </div>
          </div>';  

          }
        } else {
            echo '<div class="view-student-details">
                      <div class="view-student-details-basic">
                      <b>No Score Card Available</b>
                      </div>
                    </div>';
        }


        
mysql_close($connection);

     }
} else 
     echo "<b>0 results</b>";





} else 
  echo "<b>student id not set</b>";

?>
 </div>

