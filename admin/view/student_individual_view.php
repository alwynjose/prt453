  <div class="admin-right">
<?php
if(isset($_GET['studid'])){

$studidview = $_GET['studid'];

$sql = "SELECT * FROM students WHERE ID=$studidview";
$result = mysql_query($sql, $connection);

if (mysql_num_rows($result) > 0) {
     // output data of each row
     while($row = mysql_fetch_assoc($result)) {
      $lastnameview = strtoupper($row["LastName"]);
      $firstnameview = strtoupper($row["FirstName"]);
      $presentidview = $row["PresentID"];
      
      if (empty($row["StudentID"]) || is_null($row["StudentID"])) {
        $Studentidview="Not Provided";
      } else {
        $Studentidview = $row["StudentID"];
      }

      
        //stripping Last 3 Characters of the Time data type 00:0:00 Starts
      $pstartview = substr($row["PreTimeStart"], 0, -3);
      $pEndview   = substr($row["PreTimeStart"], 0, -3);
        //stripping Last 3 Characters of the Time data type 00:0:00 Ends
    echo '<div class="view-student-details-heading">
            <h4><span class="glyphicon glyphicon-education"></span> Student Details</h4>
          </div>
          <div class="view-student-details">
            <div class="view-student-details-basic">
            
              <h4>Student Last Name:</h4>
              <p>'.$lastnameview.'</p>
              <h4>Student First Name:</h4>
              <p>'.$firstnameview.'</p>
              <h4>Student ID:</h4>
              <p>'.$Studentidview.'</p>
              <h4>Presentation Name:</h4>
              <p>'.$presentidview.'</p>
              <h4>Presentation Time:</h4>
              <p>'.$pstartview.' to '.$pEndview.' (24hrs Format)</p>

            
            </div>
          </div>' ;
mysql_free_result($result); 

$sql2 = "SELECT AverageScore, MarkingsNumber FROM average WHERE studentidavg=$studidview";
$result = mysql_query($sql2, $connection);       
        if (mysql_num_rows($result) > 0) {
     // output data of each row
          while($row = mysql_fetch_assoc($result)) {  

             $averagescore = $row["AverageScore"];
             $numberofmarkers = $row["MarkingsNumber"];
              
              echo '
              <div class="view-student-details">
                <div class="view-student-details-basic">
                
                  <h4>Average Score:</h4>
                  <p>'.$averagescore.'</p>
                  <h4>Number of Lecturers Marked:</h4>
                  <p>'.$numberofmarkers.'</p>
                              
                </div>
              </div>';

          }
        } else {
          echo '<div class="view-student-details">
                      <div class="view-student-details-basic">
                      <b>Not yet marked for calculating average</b>
                      </div>
                    </div>';
                }
mysql_free_result($result); 
echo '<div class="clearfix"></div>
      <div class="view-student-details-heading">
            <h4><span class="glyphicon glyphicon-list-alt"></span> Student Score Cards</h4>
          </div>';

$sql3 = "SELECT * FROM marksheet WHERE SIDstart=$studidview";
$result = mysql_query($sql3, $connection);       
        if (mysql_num_rows($result) > 0) {
     // output data of each row
          while($row = mysql_fetch_assoc($result)) {

              $lectlnamemark = strtoupper($row["Lln"]);
             $lectfnamemark  = strtoupper($row["Lfn"]);
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
            <div class="view-student-details materialize">
            <div class="view-student-details-basic">
            
              <h4>Marked By:</h4>
              <p>'.$lectfnamemark.' '.$lectlnamemark.'</p>
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
          </div>';  

          }
        } else {
            echo '<div class="view-student-details">
                      <div class="view-student-details-basic">
                      <b>No Marksheet Available</b>
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

