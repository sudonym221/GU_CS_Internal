<?php require('config.php');
$title = 'Update Book Categories';


include('lock.php');
if(isset($login_session)){
require('logheader.php');
}else{
  require('header.php');
}


//if form has been submitted process it
if(isset($_POST['btnSave'])){

 $book_cat_id=addslashes($_POST['book_cat_id']);
 
 $book_cat_name=addslashes($_POST['book_cat_name']);

  if(!isset($error)){

    try {

      //insert into database with a prepared statement
      $sql="INSERT INTO book_categories (book_cat_id, book_cat_name) VALUES (
        '$book_cat_id', '$book_cat_name')";
      
      if (mysql_query($sql, $conn)) {
      ?>
      <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong>  New Book Category Inserted.
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
<h2 align="center"> Update Book Categories </h2>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="book_cat_id">Category ID</label>  
  <div class="col-md-4">
  <input id="book_cat_id" name="book_cat_id" type="text" placeholder="Category ID" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="book_cat_name">Category Name</label>  
  <div class="col-md-4">
  <input id="book_cat_name" name="book_cat_name" type="text" placeholder="Category Name" class="form-control input-md" required="">
    
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