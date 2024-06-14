<?php require('config.php');
$title = 'Add Courses';


include('lock.php');
if(isset($login_session)){
require('logheader.php');
}else{
  require('header.php');
}


//if form has been submitted process it
if(isset($_POST['btnSave'])){

 $ccode=addslashes($_POST['ccode']);
 $cname=addslashes($_POST['cname']);
 $cduration=addslashes($_POST['cduration']);
 $cintake=addslashes($_POST['cintake']);

  if(!isset($error)){

    try {

      //insert into database with a prepared statement
      $sql="INSERT INTO courses (ccode, cname, cduration, cintake) VALUES (
        '$ccode', '$cname', '$cduration', '$cintake')";
      
      if (mysql_query($sql, $conn)) {
      ?>
      <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong>  New Course Inserted.
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
<h2 align="center"> Add New Course </h2>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ccode">Course Code</label>  
  <div class="col-md-4">
  <input id="ccode" name="ccode" type="text" placeholder="Course Code" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cname">Course Name</label>  
  <div class="col-md-4">
  <input id="cname" name="cname" type="text" placeholder="Course Name" class="form-control input-md" required="">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cduration">Course Duration</label>  
  <div class="col-md-4">
  <input id="cduration" name="cduration" type="text" placeholder="Course Duration" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cintake">Course Intake</label>  
  <div class="col-md-4">
  <input id="cintake" name="cintake" type="text" placeholder="Course Intake" class="form-control input-md" required="">
    
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