
<?php
//include db configuration file
include('session.php');

if(isset($_POST["content_txt"]) && strlen($_POST["content_txt"])>0) 
{ 
  $contentToSave = filter_var($_POST["content_txt"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); 
  
  if(mysql_query("SELECT LastName FROM students WHERE ID='$contentToSave"))
  {
      
      echo $contentToSave;

  }

}
?>


<div class="container1">

<!-- Marking Criteria Starts -->
<form>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Presentation Skills <span style="float:right;" id="demo1"></span></a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
        	<div class="col-xs-2">
			  <label for="ex1">Maximum Score 15</label>
			  <input class="form-control" id="ex1" type="number" min="0" max="15">
			</div>
		</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Structure of Presentation <span style="float:right;" id="demo2"></span></a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
        	<div class="col-xs-2">
			  <label for="ex1">Maximum Score 25</label>
			  <input class="form-control" id="ex2" type="number" min="0" max="25">
			</div>
		</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Technical Depth <span style="float:right;" id="demo3"></span></a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
        	<div class="col-xs-2">
			  <label for="ex1">Maximum Score 30</label>
			  <input class="form-control" id="ex3" type="number" min="0" max="30">
			</div>
		</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Appropriate Level For Audience <span style="float:right;" id="demo4"></span></a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
        	<div class="col-xs-2">
			  <label for="ex1">Maximum Score 10</label>
			  <input class="form-control" id="ex4" type="number" min="0" max="10">
			</div>
		</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Response to Questions <span style="float:right;" id="demo5"></span></a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">
        	<div class="col-xs-2">
			  <label for="ex1">Maximum Score 20</label>
			  <input class="form-control" id="ex5" type="number" min="0" max="20">
			</div>
		</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Feedback</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">
        	<div class="col-xs-12">
			  <label for="ex1">Write your feedback below:</label>
			  <input class="form-control" id="feedbackform" type="text" maxlength="350">
			</div>
		</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse7" onclick="myFunction1()">View Total Score <span style="float:right;" class="glyphicon glyphicon-list-alt"></span></a>
        </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse">
        <div class="panel-body">
        	<div class="col-xs-2">
			  <p id="demototal"></p>
			</div>
			<span style="float:right;" id="test"></span>
		</div>
      </div>
    </div>
  </div> 
 </form> 
 <!-- Validator Starts -->
<script>
function myFunction() {
    var x1, x2, x3, x4, x5, text1, text2, text3, text4, text5;
    var total = 0;
    // Get the value of the input field with id="ex1"
    x1 = document.getElementById("ex1").value;

    // If x1 is Not a Number or less than one or greater than 15
    if (isNaN(x1) || x1 < 1 || x1 > 15) {
        text1 = "<span class='label label-warning'>Enter a valid score</span>";
    } else {
        text1 = "<span class='label label-primary'>Validated</span>";
    }
    document.getElementById("demo1").innerHTML = text1;
    
     // Get the value of the input field with id="ex2"
    x2 = document.getElementById("ex2").value;

    // If x2 is Not a Number or less than one or greater than 25
    if (isNaN(x2) || x2 < 1 || x2 > 25) {
        text2 = "<span class='label label-warning'>Enter a valid score</span>";
    } else {
        text2 = "<span class='label label-primary'>validated</span>";
    }
    document.getElementById("demo2").innerHTML = text2;

    // Get the value of the input field with id="ex3"
    x3 = document.getElementById("ex3").value;

    // If x3 is Not a Number or less than one or greater than 30
    if (isNaN(x3) || x3 < 1 || x3 > 30) {
        text3 = "<span class='label label-warning'>Enter a valid score</span>";
    } else {
        text3 = "<span class='label label-primary'>validated</span>";
    }
    document.getElementById("demo3").innerHTML = text3;

    // Get the value of the input field with id="ex4"
    x4 = document.getElementById("ex4").value;

    // If x4 is Not a Number or less than one or greater than 10
    if (isNaN(x4) || x4 < 1 || x4 > 10) {
        text4 = "<span class='label label-warning'>Enter a valid score</span>";
    } else {
        text4 = "<span class='label label-primary'>validated</span>";
    }
    document.getElementById("demo4").innerHTML = text4;

    // Get the value of the input field with id="ex5"
    x5 = document.getElementById("ex5").value;

    // If x5 is Not a Number or less than one or greater than 20
    if (isNaN(x5) || x5 < 1 || x5 > 20) {
        text5 = "<span class='label label-warning'>Enter a valid score</span>";
    } else {
        text5 = "<span class='label label-primary'>validated</span>";
    }
    document.getElementById("demo5").innerHTML = text5;

    
    	
}
function myFunction1() { 
	myFunction();	
	document.getElementById("demototal").innerHTML = "";
	var x1, x2, x3, x4, x5;
    var total = 0;
    x1 = document.getElementById("ex1").value;
    x2 = document.getElementById("ex2").value;
    x3 = document.getElementById("ex3").value;
    x4 = document.getElementById("ex4").value;
    x5 = document.getElementById("ex5").value;
    total = parseInt(x1)+parseInt(x2)+parseInt(x3)+parseInt(x4)+parseInt(x5);
       // If x is Not a Number or less than one or greater than 100
    if (isNaN(total) || total < 1 || total > 100) {
        text6 = "<span class='label label-warning'>Enter a valid score</span>";
        document.getElementById("test").innerHTML = "<button type='submit' class='btn btn-default' onclick='myFunction()'>Validate</button>";
    } else {
        // document.getElementById("demototal").innerHTML = total;
        
    }

    if ((isNaN(x1) || x1 < 1 || x1 > 15) || (isNaN(x2) || x2 < 1 || x2 > 25) || (isNaN(x3) || x3 < 1 || x3 > 30) || (isNaN(x4) || x4 < 1 || x4 > 10) || (isNaN(x5) || x5 < 1 || x5 > 20)) {
    	document.getElementById("test").innerHTML = "";
    } else {
    	document.getElementById("test").innerHTML = "<input class='btn btn-primary' type='Submit' onclick=''>";
    	document.getElementById("demototal").innerHTML = total;
    }
}

</script>
<!-- Validator Ends -->
<!-- Marking Crteria Ends -->

</div>

<!-- Initialize Tooltips Starts -->
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<!-- Initialize Tooltips Ends -->


