<?php
include('session.php');
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="http://localhost/mfs/resources/images/favicon.ico" type="image/vnd.microsoft.icon" />
  <title>Student Feedback</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://localhost/mfs/css/style.css">
</head>

<body>
  
 <div class="container-fluid">

 <img src="http://localhost/mfs/resources/images/cdu-logo.png" alt="Charles Darwin University" title="Charles Darwin University" width="230" height="120">
<!-- Navigation Starts -->
<nav class="navbar navbar-inverse materialize">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" data-toggle="tooltip" title="CDU Marking and Feedback System">CDU MFS</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
      <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li> -->
      <!-- <li><a href="#">Page 1</a></li> -->
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#" data-toggle="tooltip" data-placement="auto" title="Date"><span class="glyphicon glyphicon-calendar"></span> <?php echo $today = date("F j, Y"); ?></a></li>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome, <?php echo $login_session; ?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<!-- Navigation Ends -->

</div>

<div class="container-fluid">
 


<div class="student-right">
<?php
if(isset($login_studentid)){

$studidview = $login_studentid;

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
    echo '<div class="view-student-details-grid">
          <div class="view-student-details-heading">
            <h4><span class="glyphicon glyphicon-education"></span> Your Details</h4>
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
            </div>
          </div>' ;
mysql_free_result($result); 

 
echo '
      <div class="view-student-details-heading">
            <h4><span class="glyphicon glyphicon-list-alt"></span> Your Feedback From Lecturers</h4>
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
            
              
              <h4>Presentation Skills Feedback:</h4>
              <p>'.$lectmarkm1feed.'</p>
              
              <h4>Structure of Presentation Feedback:</h4>
              <p>'.$lectmarkm2feed.'</p>
              
              <h4>Technical Depth Feedback:</h4>
              <p>'.$lectmarkm3feed.'</p>
              
              <h4>Appropriate Level For Audience Feedback:</h4>
              <p>'.$lectmarkm4feed.'</p>
              
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
 

</body>
</html>
