  <div class="admin-right">

 <!--  Dashboard Information Display Starts -->
<?php
$con = mysql_connect("localhost", "root", "");  
$selectdb = mysql_select_db("mfs",$con);  
$result = mysql_query("SELECT ID FROM students");  
$number_of_students = mysql_num_rows($result); 
mysql_free_result($result); 
$result = mysql_query("SELECT DISTINCT LID FROM lecturers");  
$number_of_lecturers = mysql_num_rows($result); 
mysql_free_result($result); 
$result = mysql_query("SELECT MID FROM marksheet");  
$number_of_markings = mysql_num_rows($result);
mysql_free_result($result); 
$result = mysql_query("SELECT SessionID FROM lecturers WHERE SessionID IS NOT NULL");  
$number_of_sessions = mysql_num_rows($result);
mysql_free_result($result);
echo '
<div class="container-fluid">
  <div class="dashboard-info row">
    <div class="col-md-3 col-sm-3 col-xs-3 dashboard-info-displays">
      <div class="dashboard-info-display-colone">
        <div class="dashboard-info-display">
          <div class="dashboard-granular">
            <div><span class="glyphicon glyphicon-education"></span></div>
            <h3>No. of Students </h3>
            <h2>'.$number_of_students.'</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-3 dashboard-info-displays">
      <div class="dashboard-info-display-coltwo">
        <div class="dashboard-info-display">
          <div class="dashboard-granular">
            <div><span class="glyphicon glyphicon-user"></span></div>
            <h3>No. of Lecturers </h3>
            <h2>'.$number_of_lecturers.'</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-3 dashboard-info-displays">
      <div class="dashboard-info-display-colthree">
        <div class="dashboard-info-display">
          <div class="dashboard-granular">
            <div><span class="glyphicon glyphicon-th-list"></span></div>
            <h3>Total Markings</h3>
            <h2>'.$number_of_markings.'</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-3 dashboard-info-displays">
      <div class="dashboard-info-display-colfour">
        <div class="dashboard-info-display">
            <div><span class="glyphicon glyphicon-hdd"></span></div>
            <h3>Total Sessions Created</h3>
            <h2>'.$number_of_sessions.'</h2>
        </div>
      </div>
    </div>
  </div>
 </div> 
  <div class="clearfix"></div>';
mysql_close($con);
  ?>
 <!--  Dashboard Information Display Ends -->

<div class="lecturer-view-page-heading">
  <h4>Students</h4>
</div>
<div class="lecturer-view-page-add-button">
<a href="admin.php?view=add" class="btn btn-primary btn-large">Add New Student</a>
</div>
<div class="clearfix"></div>
<!-- TABLE Starts -->
<div class="dasboard-table-display">
  <!-- Table Search Starts -->
  <div class="search-table col-xs-3">
  <input oninput="w3.filterHTML('#lecturertable', '.item', this.value)" type="text" placeholder="Search Student">
  </div>
  <!-- Table Search Ends -->

            
  <table id="lecturertable" class="table table-bordered table-hover table-condensed table-responsive materialize">
    <thead>
        <tr>
        <th>Time <span class="glyphicon glyphicon-time"></span></th>
        <th>Family Name</th>
        <th>First Name</th>
        <th>Presentation</th>
        <th>Status <span class="glyphicon glyphicon-stats"></span></th>
      </tr>
    </thead>
    <tbody>
<?php
$sql = "SELECT * FROM students Orders LIMIT 10";
$result = mysql_query($sql, $connection);

if (mysql_num_rows($result) > 0) {
     // output data of each row
     while($row = mysql_fetch_assoc($result)) {
        $lastname = $row["LastName"];
        $presentid = $row["PresentID"];
        $studentidstart = $row["ID"];
        //stripping Last 3 Characters of the Time data type 00:0:00 Starts
         $pstart = substr($row["PreTimeStart"], 0, -3);
         $pEnd   = substr($row["PreTimeStart"], 0, -3);
        //stripping Last 3 Characters of the Time data type 00:0:00 Ends
        echo "<tr class='item'>
              <td>".$pstart." - ".$pEnd."</td>
              <td>". $row["LastName"]."</td>
              <td>". $row["FirstName"] ."</td>
              <td>". $row["PresentID"] ."</td>";

        $slastname = $row["FirstName"];
        $countresult = mysql_query("SELECT SIDstart, COUNT(*) FROM marksheet WHERE Sln='$lastname' AND PresID='$presentid' AND SIDstart=$studentidstart", $connection);
        $count = mysql_fetch_assoc($countresult);
        $totalcount = $count["COUNT(*)"];
        if ($totalcount == 0) {
          echo "<td><span class='label label-danger'>Not Marked </span><a href='admin.php?view=view&studid=".$studentidstart."' class='btn btn-info btn-xs pull-right'><span class='glyphicon glyphicon-edit'></span> View</a><a href='admin.php?view=edit&studid=".$studentidstart."' class='btn btn-info btn-xs pull-right'><span class='glyphicon glyphicon-edit'></span> Edit</a></td></tr>";
        }else {
          echo "<td><span class='badge'>".$totalcount."</span><span> Lecturers Marked </span><a href='admin.php?view=view&studid=".$studentidstart."' class='btn btn-info btn-xs pull-right'><span class='glyphicon glyphicon-edit'></span> View</a><a href='admin.php?view=edit&studid=".$studentidstart."' class='btn btn-info btn-xs pull-right'><span class='glyphicon glyphicon-edit'></span> Edit</a></td></tr>";
        }
       
          
        


     }
} else {
     echo "<b>0 results</b>";
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
</div>
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