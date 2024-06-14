<?php
 
include("../config.php");

//$title = 'Personal Accounting Package';

include('lock.php');
if(isset($login_session)){
require('../logheader.php');
}else {
	require('adminheader.php');
}

//if form has been submitted process it
if(isset($_POST['btnSave'])){
 
 $tname=addslashes($_POST['tname']);
 $total_marks=addslashes($_POST['total_marks']);
 $pass_marks=addslashes($_POST['pass_marks']);
 $test_duration=addslashes($_POST['test_duration']);
 $test_date=addslashes($_POST['test_date']);
 $description=addslashes($_POST['description']);

  if(!isset($error)){

    try {

      //insert into database with a prepared statement
      $sql="INSERT INTO tests (tname,total_marks,pass_marks,test_duration,test_date,description) VALUES (
        '$tname', $total_marks, $pass_marks, '$test_duration', '$test_date', '$description')";
      

 if (mysql_query($sql, $conn)) {
 	?>

		  <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong>  New Test Inserted.
</div>
<?php
          //echo "New record created successfully";
      } else {
          echo "Error: " . $sql . "<br>" . mysql_error($conn);
      }
      header('Location: adminhome.php');
      exit;

    } catch(PDOException $e) {
        $error[] = $e->getMessage();
    }

  }

}


?>

<div class="container">
<div class="row">
<form class="form-horizontal" role="form" method="post" action="" autocomplete="off">
<fieldset>

<!-- Form Name -->
<legend>Add New Test</legend>

<!-- Text input-->
<!--div class="form-group">
  <label class="col-md-4 control-label" for="uid">User ID</label>  
  <div class="col-md-4">
  <input id="uid" name="uid" type="text" placeholder="<?php echo $login_uid.' ('.$login_session.')'; ?>" class="form-control input-md" disabled="true">
    
  </div>
</div>

<!-- Text input-->
<!--div class="form-group">
  <label class="col-md-4 control-label" for="tid">Transaction ID</label>  
  <div class="col-md-4">
  <input id="tid" name="tid" type="text" placeholder="<!?php  $sql="SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'personal_accounting_package' AND TABLE_NAME = 'transactions' ";
 $result=mysql_query($sql);$row=mysql_fetch_array($result); $tid=$row['AUTO_INCREMENT'];
echo $tid; ?>" class="form-control input-md">   
  </div>
</div-->

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="tname">Test Name</label>
  <div class="col-md-4">
	<input type="text" name="tname" id="tname" placeholder="Test Name" class="form-control input-md">
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="total_marks">Total Marks</label>
  <div class="col-md-4">
	<input type="text" name="total_marks" id="total_marks" placeholder="Total Marks" class="form-control input-md">
  </div>
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="pass_marks">Pass Marks</label>
  <div class="col-md-4">
	<input type="text" name="pass_marks" id="pass_marks" placeholder="Pass Marks" class="form-control input-md">
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="test_date">Test Date</label> 
  <div class="col-md-4">
            	<div class="input-group registration-date-time">
            		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
            		<input class="form-control" name="test_date" id="test_date" type="date">
            	</div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="test_duration">Test Duration</label> 
  <div class="col-md-4">
	<input type="text" name="test_duration" id="test_duration" placeholder="hour:min:sec (00:00:00)" class="form-control input-md">
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="description" name="description" placeholder="Describe The Test"></textarea>
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnCancel"></label>
  <div class="col-md-8">
    <button id="btnCancel" name="btnCancel" class="btn btn-danger">Cancel</button>
    <button id="btnSave" name="btnSave" class="btn btn-success">Add New Test</button>
  </div>
</div>

</fieldset>
</form>

</div>


	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-9 col-sm-offset-2 col-md-offset-1">
<div class="table-responsive">
    <table class="table table-fixedheader table-bordered table-striped table-hover  ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Total Marks</th>
                <th>Pass Marks</th>
                <th>Duration</th>
                <th>Test Date</th>
  				      <th>Description</th>
            </tr>
        </thead>
        <tbody>
                   <?php
                    
$sql="SELECT * FROM tests"; // WHERE uid='$login_uid' ";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)) {
              echo "<tr><td>".$row['tid']."</td>";
              echo "<td>".$row['tname']."</td>";
              echo "<td>".$row['total_marks']."</td>";
              echo "<td>".$row['pass_marks']."</td>";
              echo "<td>".$row['test_duration']."</td>";
      			  echo "<td>".$row['test_date']."</td>";
              echo "<td>".$row['description']."</td></tr>";

            } ?>  
        </tbody>
    </table>
</div>

		</div>
	</div>
</div>
