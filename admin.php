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

  <!-- Table Search Starts -->
  <div class="search-table col-xs-3">
  <input oninput="w3.filterHTML('#lecturertable', '.item', this.value)" type="text" placeholder="Search Table">
  </div>
  <!-- Table Search Ends -->

            <!-- Table Starts -->
  <table id="lecturertable" class="table table-bordered table-hover table-condensed table-responsive materialize">
    <thead>
      <tr>
        <th>Time</th>
        <th>Family Name</th>
        <th>First Name</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
<?php
$sql = "SELECT ID, LastName, FirstName, PreTimeStart, PreTimeEnd FROM students";
$result = mysql_query($sql, $connection);

if (mysql_num_rows($result) > 0) {
     // output data of each row
     while($row = mysql_fetch_assoc($result)) {
        //stripping Last 3 Characters of the Time data type 00:0:00 Starts
         $pstart = substr($row["PreTimeStart"], 0, -3);
         $pEnd   = substr($row["PreTimeStart"], 0, -3);
        //stripping Last 3 Characters of the Time data type 00:0:00 Ends
        echo "<tr class='item'>
              <td>".$pstart." - ".$pEnd."</td>
              <td>". $row["LastName"]."</td>
              <td>". $row["FirstName"] ."</td>
              <td><span class='label label-primary'>Marked</span></td>
            </tr>";
     }
} else {
     echo "0 results";
}

mysql_close($connection);
?>  




     <!--  <tr class="item">
        <td>9:00am - 9:15am</td>
        <td>Sebastian</td>
        <td>Emil</td>
        <td><span class="label label-primary">Marked</span></td>
      </tr>
      <tr class="item">
        <td>9:15am - 9:30am</td>
        <td>Katuwal</td>
        <td>Naseeb</td>
        <td><span class="label label-primary">Marked</span></td>
      </tr>
      <tr class="item">
        <td>9:30am - 9:45am</td>        
        <td>Kaur</td>
        <td>Navpreet</td>
        <td><span class="label label-primary">Marked</span></td>
      </tr>
      <tr class="item">
        <td>9:45am - 10:00am</td>
        <td>Adhikari</td>
        <td>Pratap</td>
        <td><a href="http://localhost/cdu/lecturer-marking.html"><span class="label label-default">Needs Marking</span></a></td>
      </tr>
      <tr class="item">
        <td>10:00am - 10:15am</td>
        <td>Chen</td>
        <td>Jikang</td>
        <td><span class="label label-default">Needs Marking</span></td>
      </tr>
      <tr class="item">
        <td>10:15am - 11:30am</td>
        <td>Semantha</td>
        <td>Farida</td>
        <td><span class="label label-default">Needs Marking</span></td>
      </tr> -->
    </tbody>
  </table>
<!-- Table Ends -->
<!-- <div>  
      <ul class="pagination">
      <li><a href="#">1</a></li>
      <li class="active"><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
    </ul>
</div> -->

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
