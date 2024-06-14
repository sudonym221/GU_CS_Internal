<?php require('config.php');
$title = 'Update Publisher';


include('lock.php');
if(isset($login_session)){
require('logheader.php');
}else{
  require('header.php');
}


//if form has been submitted process it
if(isset($_POST['btnSave'])){
 $id=addslashes($_POST['pid']);
  if(!isset($error)){

    try {

      //insert into database with a prepared statement
      $sql="DELETE FROM publishers  WHERE id='$id'";     
      if (mysql_query($sql, $conn)) {
      ?>
      <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong>  Publisher Updated.
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
<h2 align="center"> Update Publisher </h2>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="id">Publisher Name</label>  
  <div class="col-md-4">
  <input id="pid" name="pid" type="text" placeholder="Publisher Id" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button Drop Down -->
<div class="form-group">
  <label class="col-md-4 control-label" for="pub_code">Publisher Code</label> 
  <div class="col-md-3">
    <div class="input-group">
   <input id="pub_code" name="pub_code" type="text" placeholder="Publisher Code" class="form-control input-md" >
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
          Select
          <span class="caret"></span>
        </button>
        <ul id="aclist" class="dropdown-menu pull-right">
                              <?php
$sql="SELECT pub_code FROM publishers";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)) {      
              echo "<li><a href='#'>".$row['pub_code']."</a></li>";
            }?>
        </ul>
 <script type="text/javascript">
 $("#aclist").parent().find("a").on('click', function() {
            var option= $(this).text();
      $("#pub_code").val(option);
     var myurl = "http://localhost/gucslibrary/getPublishers.php?pub_code="+option+"";   
      $.ajax({
      url: myurl,
          type: 'GET',   
      error: function() {
         alert("An error has occurred");
      },
      dataType: 'json',
      success: function(data) {
          $("#pid").val(data.id);
          $("#pub_name").val(data.pub_name);          
          $('#pub_code').val(data.pub_code);
          $('#pub_address').val(data.pub_address);         
      }
   });
    });   

      
 </script>

      </div>
    </div>
  </div>
    <div class="col-md-1"> 
 <button type="button" id="btnLoadByID" name="btnLoadByID" class="btn btn-success">Load </button>  
 
<script type="text/javascript">
 $("#btnLoadByID").on('click', function() {
    var option= $("#pub_code").val();
     var myurl = "http://localhost/gucslibrary/getPublishers.php?pub_code="+option+"";   
      $.ajax({
      url: myurl,
          type: 'GET',   
      error: function() {
         alert("An error has occurred");
      },
      dataType: 'json',
      success: function(data) {
          $("#id").val(data.id);
          $("#pub_name").val(data.pub_name);          
          $('#pub_code').val(data.pub_code);
          $('#pub_address').val(data.pub_address);}
   });
    });   

      
 </script>

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