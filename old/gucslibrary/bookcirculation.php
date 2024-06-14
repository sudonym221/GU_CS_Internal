<?php require('config.php');
$title = 'Book Circulation';


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
      $sql="INSERT INTO book_circulation (mname,bno,qty,expdate, manfdate,pprice,sprice) VALUES (
        '$mname', $bno, $qty, '$expdate', '$manfdate', '$pprice', '$sprice')";
      
      if (mysql_query($sql, $conn)) {
      ?>
      <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong>  New Medicine Inserted.
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
<h2 align="center"> Book Issue </h2>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="mname">Member ID</label>  
  <div class="col-md-4">
  <input id="mem_id" name="mem_id" type="text" placeholder="Member ID" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="book_accession_no">Book Accession No.</label>  
  <div class="col-md-4">
  <input id="book_accession_no" name="book_accession_no" type="text" placeholder="Book Accession No." class="form-control input-md" required="">
    
  </div>
</div>




<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="manfdate"> Expected Return Date</label> 
  <div class="col-md-4">
              <div class="input-group registration-date-time">
                <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                <input class="form-control" name="exp_return_date" id="exp_return_date" type="date">
              </div>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="manfdate"> Return Date</label> 
  <div class="col-md-4">
              <div class="input-group registration-date-time">
                <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                <input class="form-control" name="return_date" id="return_date" type="date">
              </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Issued Employee Number</label>  
  <div class="col-md-4">
  <input id="issue_emp_no" name="issue_emp_no" type="text" placeholder="Issued Employee Number" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Return Employee Number</label>  
  <div class="col-md-4">
  <input id="return_emp_no" name="return_emp_no" type="text" placeholder="Return Employee Number" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Fine Amount</label>  
  <div class="col-md-4">
  <input id="fine_amt" name="fine_amt" type="text" placeholder="Fine Amount" class="form-control input-md" required="">  
  </div>
</div> 


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pprice">Status</label>  
  <div class="col-md-4">
  <input id="status" name="status" type="text" placeholder="Status" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pprice">Fine Status</label>  
  <div class="col-md-4">
  <input id="fine_status" name="fine_status" type="text" placeholder=" Fine Status" class="form-control input-md" required="">  
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