<?php require('config.php');
$title = 'Add new Member Information';


include('lock.php');
if(isset($login_session)){
require('logheader.php');
}else{
  require('header.php');
}


//if form has been submitted process it
if(isset($_POST['btnSave'])){

 $eid=addslashes($_POST['mem_id']);
 
 $ecode=addslashes($_POST['mem_ac_no']);
 $fname=addslashes($_POST['mem_type']);
 $mname=addslashes($_POST['created_at']);
 $lname=addslashes($_POST['ac_status']);
$city=addslashes($_POST['close_date']);
$state=addslashes($_POST['emp_id']);
$country=addslashes($_POST['std_id']);

 


  if(!isset($error)){

    try {

      //insert into database with a prepared statement
      $sql="INSERT INTO medicine (mname,bno,qty,expdate, manfdate,pprice,sprice) VALUES (
        '$mname', $bno, $qty, '$expdate', '$manfdate', '$pprice', '$sprice')";
      
      if (mysql_query($sql, $conn)) {
      ?>
      <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong>  New Account Created.
</div>
      
      <?php
          //echo "";
      } else {
          echo "Error: " . $sql . "<br>" . mysql_error($conn);
      }
      //header('Location: add_medicine.php');
     // exit;

    } catch(PDOException $e) {
        $error[] = $e->getMessage();
    }

  }

}

?>

<div class="content_wrapper">
<div id="content_area">

<div class="container">
<div class="row">
<form class="form-horizontal" role="form" method="post" action="" autocomplete="off">
<fieldset>

<!-- Form Name -->
<h2 align="center"> Create New Account</h2>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="mname">Member Account Number</label>  
  <div class="col-md-4">
  <input id="mem_ac_no" name="mem_ac_no" type="text" placeholder="Member Account Number" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="bno">Member Type</label>  
  <div class="col-md-4">
  <input id="mem_type" name="mem_type" type="text" placeholder="Member Type" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="qty">Created At</label>  
  <div class="col-md-4">
  <input id="created_at" name="created_at" type="text" placeholder="Created At" class="form-control input-md" required="">  
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pprice">Account Status</label>  
  <div class="col-md-4">
  <input id="ac_status" name="ac_status" type="text" placeholder="Account Status" class="form-control input-md" required="">  
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="manfdate"> Close Date</label> 
  <div class="col-md-4">
              <div class="input-group registration-date-time">
                <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                <input class="form-control" name="close_date" id="close_date" type="date">
              </div>
  </div>
</div>




<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Employee ID</label>  
  <div class="col-md-4">
  <input id="emp_id" name="emp_id" type="text" placeholder="Employee ID" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Student ID</label>  
  <div class="col-md-4">
  <input id="std_id" name="std_id" type="text" placeholder="Student ID" class="form-control input-md" required="">  
  </div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label " for="btnCancel"></label>
  <div class="col-md-8 pull-right">
    <button id="btnCancel" name="btnCancel" class="btn btn-danger">Cancel</button>
    <button id="btnSave" name="btnSave" class="btn btn-success">Sumbit </button>
  </div>
</div>

</fieldset>
</form>

</div>

<?php include("footer.php");