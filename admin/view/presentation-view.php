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
	<h4>Presentation</h4>
</div>
<div class="lecturer-view-page-add-button">
<a href="admin.php?view=padd" class="btn btn-primary btn-large">Add New Presentation</a>
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
        <th>Criteria 1</th>
        <th>Max Mark for Criteria 1</th>
        <th>Criteria 2</th>
        <th>Max Mark for Criteria 2</th>
        <th>Criteria 3</th>
        <th>Max Mark for Criteria 3</th>
        <th>Criteria 4</th>
        <th>Max Mark for Criteria 4</th>
        <th>Criteria 5</th>
        <th>Max Mark for Criteria 5</th>
        </tr>
    </thead>
    <tbody>
<?php
$sql = "SELECT * FROM presentation LIMIT 10";
$result = mysql_query($sql, $connection);

if (mysql_num_rows($result) > 0) {
     // output data of each row
     while($row = mysql_fetch_assoc($result)) {
        $presentationid = $row["id"];
        $Presentationname = $row["Presentation_name"];
        $Criteria1 = $row["c_1"];
        $Criteria1max = $row["c_1_max"];
        $Criteria2 = $row["c_2"];
        $Criteria2max = $row["c_2_max"];
        $Criteria3 = $row["c_3"];
        $Criteria3max = $row["c_3_max"];
        $Criteria4 = $row["c_4"];
        $Criteria4max = $row["c_4_max"];
        $Criteria5 = $row["c_5"];
        $Criteria5max = $row["c_5_max"];
        
        

        echo "<tr class='item'>
              <td style='color:blue;font-weight:bold;'><span>".$Presentationname." </span><span style='float:left;'><a style='margin-bottom:5px;' href='admin.php?view=pedit&pid=".$presentationid."' class='btn btn-info btn-xs pull-right'><span class='glyphicon glyphicon-edit'></span> Edit</a><a href='admincontroldelete.php?presentiddel=".$presentationid."' class='btn btn-info btn-xs pull-right'><span class='glyphicon glyphicon-remove-circle'></span> Delete</a></span></td>
              <td>". $Criteria1."</td>
              <td>". $Criteria1max."</td>
              <td>". $Criteria2."</td>
              <td>". $Criteria2max."</td>
              <td>". $Criteria3."</td>
              <td>". $Criteria3max."</td>
              <td>". $Criteria4."</td>
              <td>". $Criteria4max."</td>
              <td>". $Criteria5."</td>
              <td>". $Criteria5max."</td>";

         // if (empty($row["SessionID"]) || is_null($row["SessionID"])) {
         // 	$lsessionid = "No Session";
         // 	echo "<td>". $lsessionid."</td>";
         // } else {
         // 	$lsessionid = $row["SessionID"];
         // 	echo "<td>". $lsessionid."<a href='admin.php?view=lview&sessioniddel=".$lsessionid."' class='btn btn-info btn-xs pull-right'><span class='glyphicon glyphicon-remove'></span> Delete Session</a></td> ";
         // }

        

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