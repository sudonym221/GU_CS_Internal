<?php require('config.php');
$title = 'Add New Publisher';


include('lock.php');
if(isset($login_session)){
require('logheader.php');
}else{
  require('header.php');
}


//if form has been submitted process it
if(isset($_POST['btnSave'])){

 $title=addslashes($_POST['title']);
 $submitted_by=addslashes($_POST['submitted_by']);
 $guide=addslashes($_POST['guide']);
 $co_guide=addslashes($_POST['co_guide']);
 $duration=addslashes($_POST['duration']);
 $session=addslashes($_POST['session']);

  if(!isset($error)){

    try {

      //insert into database with a prepared statement
      $sql="INSERT INTO theses_dissertations (title, submitted_by, guide, co_guide, duration, session) VALUES (
        '$title', '$submitted_by', '$guide', '$co_guide', '$duration', '$session')";
      
      if (mysql_query($sql, $conn)) {
      ?>
      <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong>  New Thesis Inserted.
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
<h2 align="center"> Add New Thesis/Dissertation </h2>

<!-- Text input-->
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="title">Title</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="title" name="title" placeholder="Title"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="submitted_by">Submitted By</label>  
  <div class="col-md-4">
  <input id="submitted_by" name="submitted_by" type="text" placeholder="Submitted By" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="guide">Guide</label>  
  <div class="col-md-4">
    <textarea class="form-control" id="guide" name="guide" placeholder="Guide"></textarea>
    
  </div>
</div>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="co_guide">Co-Guide</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="co_guide" name="co_guide" placeholder="Co-Guide"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="duration">Duration</label>  
  <div class="col-md-4">
  <input id="duration" name="duration" type="text" placeholder="Duration" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="session">Session</label>  
  <div class="col-md-4">
  <input id="session" name="session" type="text" placeholder="Session" class="form-control input-md" required="">
    
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