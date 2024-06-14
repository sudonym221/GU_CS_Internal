<?php require('config.php');
$title = 'Delete Book Category';


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
      $sql="DELETE FROM book_categories WHERE book_cat_id='$book_cat_id' ";
      
      if (mysql_query($sql, $conn)) {
      ?>
      <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong>   Book Category Deleted.
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
<h2 align="center"> Delete Book Category </h2>

<!-- Button Drop Down -->
<div class="form-group">
  <label class="col-md-4 control-label" for="book_cat_id">Category</label> 
  <div class="col-md-4">
    <div class="input-group">
   <input id="book_cat_id" name="book_cat_id" type="text" placeholder="Category ID" class="form-control input-md" >
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
          Select
          <span class="caret"></span>
        </button>
        <ul id="aclist" class="dropdown-menu pull-right">
                              <?php
$sql="SELECT * FROM book_categories";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)) {      
              echo "<li><a >".$row['book_cat_name']."</a></li>";
            }?>
        </ul>
 <script type="text/javascript">
 $("#aclist").parent().find("a").on('click', function() {
            var option= $(this).text();
      $("#book_cat_id").val(option);
      var myurl = "http://localhost/gucslibrary/getBookCategoryDetails.php?book_cat_name='"+option+"'";
     // alert(myurl);    
      $.ajax({
      url: myurl,
          type: 'GET',   
      error: function() {
         alert("An error has occurred");
      },
      dataType: 'json',
      success: function(data) {
          $("#book_cat_id").val(data.book_cat_id);
           $("#book_cat_name").val(data.book_cat_name);       
      }
   });
    });        
 </script>

      </div>
    </div>
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