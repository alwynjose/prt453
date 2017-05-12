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
  
 <div class="container">

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
$con=mysqli_connect("localhost","root","","mfs");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// SQL Query To Fetch Complete Information Of students
$result = mysqli_query($con,"SELECT * FROM students");
while($row = mysqli_fetch_array($result))
{
  //stripping Last 3 Characters of the Time data type 00:0:00 Starts
$pretimestart = substr($row["PreTimeStart"], 0, -3);
$pretimeend = substr($row["PreTimeEnd"], 0, -3);
  //stripping Last 3 Characters of the Time data type 00:0:00 Ends
$lastname = $row["LastName"];
$studentid = $row["ID"];
echo "<tr class='item'>
      <td>". $pretimestart."-".$pretimeend."</td>
        <td>" . $row["LastName"] ."</td>
        <td>" . $row["FirstName"]."</td>
        <td>";

        $markcheck = mysqli_query($con,"SELECT TotalM FROM marksheet WHERE Sln='$lastname'");
        $markedornot = mysqli_fetch_assoc($markcheck);
        $totalmark =$markedornot['TotalM'];
        if (!isset($totalmark)) {
          echo "<span class='label label-danger'>Not Marked</span><!-- Trigger/Open The Modal -->
          <button id='myBtn1' onclick='loadDoc($studentid)'>Open Modal</button></td></tr>";
        } else {
          echo "<span class='label label-primary'>Marked</span></td></tr>";
        }
        
      
}
mysqli_close($con);
?>

      <!-- <tr class="item">
        <td>9:00am - 9:15am</td>
        <td>Sebastian</td>
        <td>Emil</td>
        <td><span class="label label-primary">Marked</span></td>
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

<!-- The Modal Begins-->

<script>
function loadDoc(stdid) {
  var xhttp = new XMLHttpRequest();
  var studentid = "student_id="+stdid;
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      modal.style.display = "block";
      document.getElementById("demo").innerHTML =
      this.responseText;
      
    }
  };
  xhttp.open("POST", "markfeedcontrol.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("student_id="+stdid);
  console.log(studentid);
}
</script>

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div id="demo">
           
    </div>
    <p>something here</p>
    
  </div>

</div>
<!-- The Modal Ends-->
  
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

<!-- MODAL BOXES BEGIN -->
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
// btn.onclick = function() {
//     modal.style.display = "block";

// }

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<!-- MODAL BOXES ENDS -->

<!-- Table Search Starts -->
<script src="http://localhost/mfs/js/w3.js"></script>
<!-- Table Search Ends -->
</body>
</html>
