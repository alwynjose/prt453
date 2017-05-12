<?php
include('session.php');
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="http://localhost/cdu/resources/images/favicon.ico" type="image/vnd.microsoft.icon" />
  <title>Lecturer</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://localhost/cdu/css/style.css">
</head>

<body>
  
 <div class="container">

 <img src="http://localhost/cdu/resources/images/cdu-logo.png" alt="Charles Darwin University" title="Charles Darwin University" width="230" height="120">
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
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome, <?php echo $login_session; ?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<!-- Navigation Ends -->

</div>

<div class="container">

  
</div>

<footer class="container">
  <p class="footy">Copyright © 2017 Charles Darwin University</p>
</footer>

<!-- Initialize Tooltips Starts -->
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<!-- Initialize Tooltips Ends -->
<!-- Table Search Starts -->
<script src="http://localhost/cdu/js/w3.js"></script>
<!-- Table Search Ends -->
</body>
</html>
