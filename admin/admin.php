<?php
include('session.php');
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="http://localhost/mfs/resources/images/favicon.ico" type="image/vnd.microsoft.icon" />
  <title>Lecturer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://localhost/mfs/css/style.css">


</head>

<body>

<div class="container-fluid">


<!-- Navigation Starts -->
<nav class="navbar navbar-inverse materialize">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" data-toggle="tooltip" data-placement="auto" title="CDU Marking and Feedback System">CDU MFS</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="admin.php" data-toggle="tooltip" data-placement="auto" title="Dashboard"><span class="glyphicon glyphicon-home"></span></a></li>
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
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome, <?php echo $login_firstnameadmin; ?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<!-- Navigation Ends -->

</div>



<div class="container-fluid">

  <!-- ADMIN SIDEMENU LEFT STARTS -->
  <div class="admin-sidemenu">
     <img src="http://localhost/mfs/resources/images/cdu-logo.png" alt="Charles Darwin University" title="Charles Darwin University">
     <div class="admin-side-menu-right">
      <div class="list-group">
        <a href="admin.php" class="list-group-item">Dashboard</a>
        <a href="admin.php?view=pview" class="list-group-item">Presentation</a>
        <a href="admin.php?view=lview" class="list-group-item">Lecturers</a>
        <a href="admin.php" class="list-group-item">Student</a>
        <a href="admin.php?view=report" class="list-group-item">Report</a>
      </div>
     </div>
  </div>
  <!-- ADMIN SIDEMENU LEFT ENDS -->

  <!-- ADMIN PANEL RIGHT STARTS -->
<?php   //to control the view based on view parameter
if(isset($_GET['view'])){

        $view = $_GET['view'];

      if ($view=="students"){
      echo "okies";
      } elseif($view=="view") {
        include "view/student_individual_view.php";
      }
      elseif($view=="edit") {
        include "view/student_individual_edit.php";
      }
      elseif($view=="add") {
        include "view/student_individual_add.php";
      }
      elseif($view=="lview") {
        include "view/lecturers-view.php";
      }
      elseif($view=="ledit") {
        include "view/lecturers-edit.php";
      }
      elseif($view=="lviewindi") {
        include "view/lecturers_individual_view.php";
      }
      elseif($view=="ladd") {
        include "view/lecturer_individual_add.php";
      }
      elseif($view=="pview") {
        include "view/presentation-view.php";
      }
      elseif($view=="pedit") {
        include "view/presentation-edit.php";
      }
      elseif($view=="padd") {
        include "view/presentation_add.php";
      }
      elseif($view=="report") {
        include "view/reports-view.php";
      }

} else

include "view/dashboard.php";

?>
  <!-- ADMIN PANEL RIGHT ENDS -->

</div>

<footer class="container-fluid">
  <p class="footy">Copyright © 2017 Charles Darwin University. <?php echo $today = date("F j, Y"); ?></p>
</footer>

<!-- Initialize Tooltips Starts -->
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<!-- Initialize Tooltips Ends -->
<!-- Table Search Starts -->
<script src="http://localhost/mfs/js/w3.js"></script>
<!-- Table Search Ends -->
</body>
</html>
