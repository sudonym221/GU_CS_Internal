<?php require('config.php');
$title = 'Update Course';
include('lock.php');
if(isset($login_session)){
require('logheader.php');
}else{
  require('header.php');
}


//if form has been submitted process it
if(isset($_POST['btnSave'])){

 $ccode=addslashes($_POST['ccode']);
 $id=addslashes($_POST['cid']);
 $cname=addslashes($_POST['cname']);
 $cduration=addslashes($_POST['cduration']);
 $cintake=addslashes($_POST['cintake']);

  if(!isset($error)){

    try {

      //insert into database with a prepared statement
      $sql = "UPDATE `gucslib_db`.`courses` SET ccode='$ccode', cname='$cname', cduration='$cduration', cintake=$cintake WHERE `courses`.`id` = '$id';";
      if (mysql_query($sql, $conn)) {
      ?>
      <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong>  Course Record Updated.
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
<form class="form-horizontal" role="form" method="post" action="" autocomplete="off" novalidate>
<fieldset>

<!-- Form Name -->
<h2 align="center">Update Course </h2>

<!-- Button Drop Down -->
<div class="form-group">
  <label class="col-md-4 control-label" for="ccode">Course Code</label> 
  <div class="col-md-3">
    <div class="input-group">
   <input id="ccode" name="ccode" type="text" placeholder="Course Code" class="form-control input-md" >
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
          Select
          <span class="caret"></span>
        </button>
        <ul id="aclist" class="dropdown-menu pull-right">
                              <?php
$sql="SELECT ccode FROM courses";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)) {      
              echo "<li><a href='#'>".$row['ccode']."</a></li>";
            }?>
        </ul>
 <script type="text/javascript">
 $("#aclist").parent().find("a").on('click', function() {
            var option= $(this).text();
      $("#ccode").val(option);
     var myurl = "http://localhost/gucslibrary/getCourseDetails.php?ccode='"+option+"'";   
      $.ajax({
      url: myurl,
          type: 'GET',   
      error: function() {
         alert("An error has occurred");
      },
      dataType: 'json',
      success: function(data) {
          $("#cid").val(data.id);          
          $('#ccode').val(data.ccode);
          $('#cname').val(data.cname);
          $('#cduration').val(data.cduration);
          $("#cintake").val(data.cintake);          
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
    var option= $("#ccode").val();
      var myurl = "http://localhost/gucslibrary/getCourseDetails.php?ccode='"+option+"'";   
      $.ajax({
      url: myurl,
          type: 'GET',   
      error: function() {
         alert("An error has occurred");
      },
      dataType: 'json',
      success: function(data) {
          $("#cid").val(data.id);          
          $('#ccode').val(data.ccode);
          $('#cname').val(data.cname);
          $('#cduration').val(data.cduration);
      $("#cintake").val(data.cintake);          
      }
   });
    });   

      
 </script>

 </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cid">Course ID</label>  
  <div class="col-md-4">
  <input id="cid" name="cid" type="text" placeholder="Course ID" class="form-control input-md"  >
    
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