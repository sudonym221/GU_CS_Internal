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

 $pub_code=addslashes($_POST['pub_code']);
 $pub_name=addslashes($_POST['pub_name']);
 $pub_address=addslashes($_POST['pub_address']);

  if(!isset($error)){

    try {

      //insert into database with a prepared statement
      $sql="INSERT INTO publishers (pub_code, pub_name, pub_address) VALUES (
        '$pub_code', '$pub_name', '$pub_address')";
      
      if (mysql_query($sql, $conn)) {
      ?>
      <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong>  New Publisher Inserted.
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
<h2 align="center"> Add New Publisher </h2>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pub_code">Publisher Code</label>  
  <div class="col-md-4">
  <input id="pub_code" name="pub_code" type="text" placeholder="Publisher Code" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pub_name">Publisher Name</label>  
  <div class="col-md-4">
  <input id="pub_name" name="pub_name" type="text" placeholder="Publisherr Name" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="pub_address">Publisher Address</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="pub_address" name="pub_address" placeholder="Publisher Address"></textarea>
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