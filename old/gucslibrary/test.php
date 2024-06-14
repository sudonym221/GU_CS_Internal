<?php require('config.php');
$title = 'Add new Student';


include('lock.php');
if(isset($login_session)){
require('logheader.php');
}else{
  require('header.php');
}


//if form has been submitted process it
if(isset($_POST['btnSave'])){

 $sid=addslashes($_POST['sid']);
 
 $rollno=addslashes($_POST['rollno']);
 $fname=addslashes($_POST['fname']);
 $mname=addslashes($_POST['mname']);
 $lname=addslashes($_POST['lname']);
$city=addslashes($_POST['city']);
$state=addslashes($_POST['state']);
$country=addslashes($_POST['country']);
 $address=addslashes($_POST['address']);
 $pin=addslashes($_POST['pin']);
 $landline=addslashes($_POST['landline']);
$mobile=addslashes($_POST['mobile']);
$bloodgroup=addslashes($_POST['bloodgroup']);
$email=addslashes($_POST['email']);
$gurdain_name=addslashes($_POST['gurdain_name']);
$gurdain_contact=addslashes($_POST['gurdian_contact']);
$session=addslashes($_POST['session']);
$doa=addslashes($_POST['doa']);
$photo=addslashes($_POST['photo']);
$course_id=addslashes($_POST['course_id']);
$current_status=addslashes($_POST['current_status']);

  if(!isset($error)){

    try {

      //insert into database with a prepared statement
      $sql="INSERT INTO medicine (mname,bno,qty,expdate, manfdate,pprice,sprice) VALUES (
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
<h2 align="center"> Add new Student</h2>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="mid">Student ID</label>  
  <div class="col-md-4">
  <input id="sid" name="sid" type="text" placeholder="<?php
 $sql="SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'medicine_stock' AND TABLE_NAME = 'medicine' ";
 $result=mysql_query($sql);$row=mysql_fetch_array($result); $mid=$row['AUTO_INCREMENT'];echo $mid;
  ?>" class="form-control input-md" disabled="true">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="mname">Roll No</label>  
  <div class="col-md-4">
  <input id="rollno" name="rollno" type="text" placeholder="Roll No" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="bno">First name</label>  
  <div class="col-md-4">
  <input id="fname" name="fname" type="text" placeholder="First name" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="qty">Middle Name</label>  
  <div class="col-md-4">
  <input id="mname" name="mname" type="text" placeholder="Quantity" class="form-control input-md" required="">  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="expdate">Expiry Date</label> 
  <div class="col-md-4">
              <div class="input-group registration-date-time">
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                <input class="form-control" name="expdate" id="expdate" type="date">
              </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pprice">last Name</label>  
  <div class="col-md-4">
  <input id="lname" name="lname" type="text" placeholder="Purchase Price" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">City</label>  
  <div class="col-md-4">
  <input id="city" name="city" type="text" placeholder="Selling Price" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">State</label>  
  <div class="col-md-4">
  <input id="state" name="state" type="text" placeholder="Selling Price" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Country</label>  
  <div class="col-md-4">
  <input id="country" name="country" type="text" placeholder="Selling Price" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Address</label>  
  <div class="col-md-4">
  <input id="address" name="address" type="text" placeholder="Selling Price" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Pin No</label>  
  <div class="col-md-4">
  <input id="pin" name="pin" type="text" placeholder="Selling Price" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice"> Land Line No </label>  
  <div class="col-md-4">
  <input id="landline" name="landline" type="text" placeholder="Selling Price" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Mobile</label>  
  <div class="col-md-4">
  <input id="mobile" name="mobile" type="text" placeholder="Selling Price" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="Selling Price" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Blood Group</label>  
  <div class="col-md-4">
  <input id="bloodgroup" name="bloodgroup" type="text" placeholder="Selling Price" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Gurdian Name</label>  
  <div class="col-md-4">
  <input id="gurdain_name" name="gurdain_name" type="text" placeholder="Selling Price" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Gurdian contact</label>  
  <div class="col-md-4">
  <input id="gurdain_contact" name="gurdain_contact" type="text" placeholder="Selling Price" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Session</label>  
  <div class="col-md-4">
  <input id="session" name="session" type="text" placeholder="Selling Price" class="form-control input-md" required="">  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="manfdate"> Date of Admission</label> 
  <div class="col-md-4">
              <div class="input-group registration-date-time">
                <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                <input class="form-control" name="doa" id="doa" type="date">
              </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Photo</label>  
  <div class="col-md-4">
  <input id="photo" name="photo" type="image" placeholder="Selling Price" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Course ID</label>  
  <div class="col-md-4">
  <input id="course_id" name="course_id" type="text" placeholder="Selling Price" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Current Status</label>  
  <div class="col-md-4">
  <input id="current_status" name="current_status" type="text" placeholder="Selling Price" class="form-control input-md" required="">  
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
