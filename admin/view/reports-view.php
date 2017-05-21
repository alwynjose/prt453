<div class="admin-right">
<?php
if(isset($_GET['sessioniddel'])){ //delete session id from table lecturers
	$sessioniddellect = $_GET['sessioniddel'];
	$querytodeletesession = "UPDATE lecturers SET SessionID=NULL WHERE SessionID=$sessioniddellect";
	//$con = mysql_connect("localhost", "root", "");  
	$selectdb = mysql_select_db("mfs",$connection);  
	$deletesessionidlect = mysql_query($querytodeletesession,$connection);

} else 


?>
<!-- TABLE Starts -->
<div class="lecturer-view-page-heading">
	<h4>Reports</h4>
</div>
<div class="lecturer-view-page-add-button">
<a href="downloadmarksheet.php?name=MFS_Complete_Marksheet" class="btn btn-primary btn-large"><span class="glyphicon glyphicon-download-alt"></span> Download Complete Marksheet</a>
</div>
<div class="clearfix"></div>
<div class="lecturer-view-page-add-button">
<a href="downloadaverage.php?name=MFS_Average_Marksheet" class="btn btn-primary btn-large"><span class="glyphicon glyphicon-download-alt"></span> Download Average Marks</a>
</div>
<div class="clearfix"></div>
<div class="dasboard-table-display">
  <!-- Table Search Starts -->
  <div class="search-table col-xs-3">
  <input oninput="w3.filterHTML('#lecturertable', '.item', this.value)" type="text" placeholder="Search Table">
  </div>
  <!-- Table Search Ends -->

            
  <table id="lecturertable" class="table table-bordered table-hover table-condensed table-responsive materialize">
    <thead>
        <tr>
        <th>Presentation Name</th>
        <th>Student Number</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Number of Markings</th>
        <th>Average Score</th>
        </tr>
    </thead>
    <tbody>
<?php
$sql = "SELECT * FROM average LIMIT 10";
$result = mysql_query($sql, $connection);

if (mysql_num_rows($result) > 0) {
     // output data of each row
     while($row = mysql_fetch_assoc($result)) {
        $studidavg = $row["studentidavg"];
        $studentnumberavg = $row["studentnumberavg"];
        $lastnameavg = $row["stdtavglastname"];
        $firstnameavg = $row["stdavgfirstname"];
        $noofmarkersavg = $row["MarkingsNumber"];
        $presentnameavg = $row["PresentIDavg"];
        $averagescoreavg = $row["AverageScore"];
        

        echo "<tr class='item'>
              <td>".$presentnameavg."</td>
              <td>".$studentnumberavg."</td>
              <td>". $lastnameavg."</td>
              <td>". $firstnameavg."</td>
              <td>". $noofmarkersavg."</td>
              <td>". $averagescoreavg."</td>";

  

        

        // echo "<td>". $presentid."<a href='admin.php?view=lviewindi&lectid=".$lectureridentno."' class='btn btn-info btn-xs pull-right'><span class='glyphicon glyphicon-edit'></span> View</a><a href='admin.php?view=ledit&lectid=".$lectureridentno."' class='btn btn-info btn-xs pull-right'><span class='glyphicon glyphicon-edit'></span> Edit</a></td>";

     }
} else {
     echo "<b>0 results</b>";
}

mysql_close($connection);
?>  


    </tbody>
  </table>
</div>
<!-- Table Ends -->

 </div>