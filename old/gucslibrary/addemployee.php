<?php require('config.php');
$title = 'Add Employee Information';


include('lock.php');
if(isset($login_session)){
require('logheader.php');
}else{
  require('header.php');
}


//if form has been submitted process it
if(isset($_POST['btnSave'])){

 //$eid=addslashes($_POST['eid']);
 
 $ecode=addslashes($_POST['ecode']);
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
$blood_group=addslashes($_POST['blood_group']);
$email=addslashes($_POST['email']);
$designation=addslashes($_POST['designation']);
$job_type=addslashes($_POST['job_type']);

$photo=addslashes($_POST['photo']);
$dob=addslashes($_POST['dob']);
$doj=addslashes($_POST['doj']);
$job_status=addslashes($_POST['job_status']);


  if(!isset($error)){

    try {

      //insert into database with a prepared statement
      $sql="INSERT INTO employees (ecode,fname,mname,lname,address,city,state,country,pin,landline,mobile,email,blood_group,designation,job_type,photo,dob,doj,job_status) VALUES ('$ecode','$fname','$mname','$lname','$address','$city','$state','$country','$pin','$landline','$mobile','$email','$blood_group','$designation','$job_type','$photo','$dob','$doj','$job_status')";
      
      if (mysql_query($sql, $conn)) {
      ?>
      <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong>  New Employee Inserted.
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
<h2 align="center"> Add New Employee </h2>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="mname">Employee Code</label>  
  <div class="col-md-4">
  <input id="ecode" name="ecode" type="text" placeholder="Employee Code" class="form-control input-md" required="">
    
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
  <input id="mname" name="mname" type="text" placeholder="Middle Name" class="form-control input-md" required="">  
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pprice">last Name</label>  
  <div class="col-md-4">
  <input id="lname" name="lname" type="text" placeholder="Last Name" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">City</label>  
  <div class="col-md-4">
  <input id="city" name="city" type="text" placeholder="City" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">State</label>  
  <div class="col-md-4">
  <input id="state" name="state" type="text" placeholder="State" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Country</label>  
  <div class="col-md-4">
  <input id="country" name="country" type="text" placeholder="Country" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Address</label>  
  <div class="col-md-4">
  <input id="address" name="address" type="text" placeholder="Address" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Pin No</label>  
  <div class="col-md-4">
  <input id="pin" name="pin" type="text" placeholder="Pin No" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice"> Land Line No </label>  
  <div class="col-md-4">
  <input id="landline" name="landline" type="text" placeholder="Land Line No" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Mobile</label>  
  <div class="col-md-4">
  <input id="mobile" name="mobile" type="text" placeholder="Mobile No" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Blood Group</label>  
  <div class="col-md-4">
  <input id="blood_group" name="blood_group" type="text" placeholder="Blood Group" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Designation</label>  
  <div class="col-md-4">
  <input id="designation" name="designation" type="text" placeholder="designation" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Job Type</label>  
  <div class="col-md-4">
  <input id="job_type" name="job_type" type="text" placeholder="Job Type" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Photo</label>  
  <div class="col-md-4">
  <input id="photo" name="photo" type="text" placeholder="Photo" class="form-control input-md" required="">  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="manfdate"> Date of Birth</label> 
  <div class="col-md-4">
              <div class="input-group registration-date-time">
                <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                <input class="form-control" name="dob" id="dob" type="date">
              </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="manfdate"> Date of Joining</label> 
  <div class="col-md-4">
              <div class="input-group registration-date-time">
                <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                <input class="form-control" name="doj" id="doj" type="date">
              </div>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sprice">Job Status</label>  
  <div class="col-md-4">
  <input id="job_status" name="job_status" type="text" placeholder="Job Status" class="form-control input-md" required="">  
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