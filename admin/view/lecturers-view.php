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
	<h4>Lecturers</h4>
</div>
<div class="lecturer-view-page-add-button">
<a href="admin.php?view=ladd" class="btn btn-primary btn-large">Add New Lecturer</a>
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
        <th>Last Name</th>
        <th>First Name</th>
        <th>Session ID</th>
        <th>Presentation Alloted</th>
        </tr>
    </thead>
    <tbody>
<?php
$sql = "SELECT * FROM lecturers LIMIT 10";
$result = mysql_query($sql, $connection);

if (mysql_num_rows($result) > 0) {
     // output data of each row
     while($row = mysql_fetch_assoc($result)) {
        $lastname = $row["LLastName"];
        $firstname = $row["LFirstName"];
        $presentid = $row["LPresentID"];
        $lectureridentno = $row["LID"];
        

        echo "<tr class='item'>
              <td>".$lastname."</td>
              <td>". $firstname."</td>";

         if (empty($row["SessionID"]) || is_null($row["SessionID"])) {
         	$lsessionid = "No Session";
         	echo "<td>". $lsessionid."</td>";
         } else {
         	$lsessionid = $row["SessionID"];
         	echo "<td>". $lsessionid."<a href='admin.php?view=lview&sessioniddel=".$lsessionid."' class='btn btn-info btn-xs pull-right'><span class='glyphicon glyphicon-remove'></span> Delete Session</a></td> ";
         }

        

        echo "<td>". $presentid."<a href='admin.php?view=lviewindi&lectid=".$lectureridentno."' class='btn btn-info btn-xs pull-right'><span class='glyphicon glyphicon-edit'></span> View</a><a href='admin.php?view=ledit&lectid=".$lectureridentno."' class='btn btn-info btn-xs pull-right'><span class='glyphicon glyphicon-edit'></span> Edit</a></td>";

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