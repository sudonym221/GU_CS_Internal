<?php require('config.php');
$title = 'Add New UserGroup';


include('lock.php');
if(isset($login_session)){
require('logheader.php');
}else{
  require('header.php');
}



//if form has been submitted process it
if(isset($_POST['btnSave'])){

 $group_name=addslashes($_POST['group_name']);
 //$permission_create='';//
$permission_create = $_POST['permission_create'];
$permission_read = $_POST['permission_read'];
$permission_update = $_POST['permission_update'];
$permission_delete = $_POST['permission_delete'];
 //$pub_address=addslashes($_POST['pub_address']);

  if(!isset($error)){

    try {

      //insert into database with a prepared statement
      $sql="INSERT INTO users_groups (group_name, permission_create, permission_read, permission_update, permission_delete) VALUES (
        '$group_name', '$permission_create', '$permission_read', '$permission_update', '$permission_delete')";
      
      if (mysql_query($sql, $conn)) {
      ?>
      <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong>  New UserGroup Created.
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
<h2 align="center"> Add New User Group </h2>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="group_name">User Group Name</label>  
  <div class="col-md-4">
  <input id="group_name" name="group_name" type="text" placeholder="Group Name" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="permissions">Permissions</label>  
  <div class="col-md-4">
    <label class="radio-inline"><input type="checkbox" checked="" name="permission_create" value="1">Create</label>
    <label class="radio-inline"><input type="checkbox" name="permission_read" value="1">Read</label>
    <label class="radio-inline"><input type="checkbox" name="permission_update" value="1">Update</label>
    <label class="radio-inline"><input type="checkbox" name="permission_delete" value="1">Delete</label> </div>
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