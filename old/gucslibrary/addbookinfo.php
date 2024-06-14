<?php require('config.php');
$title = 'Add Book Information';


include('lock.php');
if(isset($login_session)){
require('logheader.php');
}else{
  require('header.php');
}


//if form has been submitted process it
if(isset($_POST['btnSave'])){

 $book_id=addslashes($_POST['book_id']);
 $accession_no=addslashes($_POST['accession_no']);
 $title=addslashes($_POST['title']);
 $book_cat_id=addslashes($_POST['book_cat_id']);
 $isbn_10=addslashes($_POST['isbn_10']);
 $isbn_13=addslashes($_POST['isbn_13']);
 $authors=addslashes($_POST['authors']);
 $edition=addslashes($_POST['edition']);
 $yopub=addslashes($_POST['yopub']);
 $total_pages=addslashes($_POST['total_pages']);
 $purchase_date=addslashes($_POST['purchase_date']);
 $entry_date=addslashes($_POST['entry_date']);
 $price=addslashes($_POST['price']);
 $pub_code=addslashes($_POST['pub_code']);
 $shelf_no=addslashes($_POST['shelf_no']);
 $attachments=addslashes($_POST['attachments']);
 $entry_emp_id=addslashes($_POST['entry_emp_id']);
 $book_status=addslashes($_POST['book_status']);
 $book_type=addslashes($_POST['book_type']);
 
  if(!isset($error)){

    try {

      //insert into database with a prepared statement
      $sql="INSERT INTO books_info (book_id,accession_no,title,book_cat_id, isbn_10,isbn_13,authors, edition, yopub, total_pages, purchase_date, entry_date, price,pub_code, shelf_no, attachments, entry_emp_id, book_status, book_type) VALUES ('$book_id','$accession_no','$title','$book_cat_id', '$isbn_10','$isbn_13','$authors', '$edition', '$yopub', '$total_pages', '$purchase_date', '$entry_date', '$price','$pub_code', '$shelf_no', '$attachments', '$entry_emp_id', '$book_status', '$book_type')";
      
      if (mysql_query($sql, $conn)) {
      ?>
      <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong>  New Book Information Added.
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
<h2 align="center"> Add Book Information </h2>


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
      // $("#book_cat_id").val(option);
      var myurl = "http://10.10.169.26/gucslibrary/getBookCategoryDetails.php?book_cat_name='"+option+"'";
   
      $.ajax({
      url: myurl,
          type: 'GET',

  xhrFields: {
    // The 'xhrFields' property sets additional fields on the XMLHttpRequest.
    // This can be used to set the 'withCredentials' property.
    // Set the value to 'true' if you'd like to pass cookies to the server.
    // If this is enabled, your server must respond with the header
    // 'Access-Control-Allow-Credentials: true'.
    withCredentials: true
  },

  headers: {
    // Set any custom headers here.
    // If you set any non-simple headers, your server must include these
    // headers in the 'Access-Control-Allow-Headers' response header.
  },
   
      error: function() {
         alert("An error has occurred");
      },
      dataType: 'json',
      success: function(data) {
	alert(data);
          $("#book_cat_id").val(data.book_cat_id); 
          $("#accession_no_category").val(data.book_cat_id);  

          var category = data.book_cat_id;   

    var myurl = "http://10.10.169.26/gucslibrary/getAlmirahs.php?category='"+category+"'";
    $.ajax({
      url: myurl,
          type: 'GET',   
      error: function() {
         alert("An error has occurred.....");
      },
      dataType: 'json',
      success: function(data) {
          $("#almirah_no").parent().find("option").remove();
          $("#almirah_no").append("<option>Select Almirah</option>");
          var i = 0;
          while(i< data.length){
            $("#almirah_no").append("<option value ="+ data[i].almirah_no+">"+ category + "-"+data[i].almirah_no +"</option>"); 
            i++;     
          }
      }
   });



      }
   });



    });        
 </script>

      </div>
    </div>
  </div>

</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="almirah_no">Almirah/Rack No.</label>
  <div class="col-md-4">
    <select id="almirah_no" name="almirah_no" class="form-control">
        <option>Please Select a Category First</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="shelf_no">Shelf No.</label>
  <div class="col-md-4">
    <select id="shelf_no" name="shelf_no" class="form-control">
        <option>Please Select Almirah First</option>
    </select>
  </div>
</div>
 <script type="text/javascript">

 $("#almirah_no").on('click', function() {
      $("#accession_no_almirah").val($(this).val());
      $("#accession_no_shelf").val('');
      var option = $("#book_cat_id").val()+"-"+$(this).val();
      var myurl = "http://localhost/gucslibrary/getShelf.php?almirah="+option+"";   
      $.ajax({
      url: myurl,
          type: 'GET',   
      error: function() {
         alert("An error has occurred");
      },
      dataType: 'json',
      success: function(data) {
          $("#shelf_no").parent().find("option").remove();
          $("#shelf_no").append("<option>Select Almirah</option>");
          var i = 0;
         // alert(data);
          while(i< data.length){
            $("#shelf_no").append("<option value ="+ data[i].shelf_no+">"+data[i].shelf_no +"</option>"); 
            i++;     
          }
      }
   });
  

    });      

    $("#shelf_no").on('click', function(){
      $("#accession_no_shelf").val($(this).val());
    })  
 </script>




<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="accession_no">Accesion No.</label>  
  <div class="col-md-1">
  <input id="accession_no_category" name="accession_no" type="text" placeholder="category" class="form-control input-md" required="" disabled="true">
  </div>
  <div class="col-md-1">
  <input id="accession_no_almirah" name="accession_no" type="text" placeholder="rack" class="form-control input-md" required="" disabled="true">
  </div>
    <div class="col-md-1">
  <input id="accession_no_shelf" name="accession_no" type="text" placeholder="shelf" class="form-control input-md" required="" disabled="true">
  </div>
    <div class="col-md-1">
  <input id="accession_no" name="accession_no" type="text" placeholder="<?php
 $sql="SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'gucslib_db' AND TABLE_NAME = 'books_info' ";
 $result=mysql_query($sql);$row=mysql_fetch_array($result); $mid=$row['AUTO_INCREMENT'];echo $mid;
  ?>" class="form-control input-md" required="" disabled="true">
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="title">Book Title</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="title" name="title" placeholder="Book Title"></textarea>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="isbn_10">ISBN 10</label>  
  <div class="col-md-4">
  <input id="isbn_10" name="isbn_10" type="text" placeholder="ISBN 10" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="isbn_13">ISBN 13</label>  
  <div class="col-md-4">
  <input id="isbn_13" name="isbn_13" type="text" placeholder="ISBN 13" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="authors">Authors</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="authors" name="authors" placeholder="Authors"></textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="edition">Edition</label>  
  <div class="col-md-4">
  <input id="edition" name="edition" type="text" placeholder="Edition" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="yop">Year Of Publication</label>  
  <div class="col-md-4">
  <input id="yop" name="yop" type="text" placeholder="Year Of Publication" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="edition">Total Pages</label>  
  <div class="col-md-4">
  <input id="total_pages" name="total_pages" type="text" placeholder="Total Pages" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="purchase_date">Purchase Date</label> 
  <div class="col-md-4">
              <div class="input-group registration-date-time">
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                <input class="form-control" name="purchase_date" id="purchase_date" type="date">
              </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="purchase_date">Entry Date</label> 
  <div class="col-md-4">
              <div class="input-group registration-date-time">
                <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                <input class="form-control" name="purchase_date" id="purchase_date" type="date">
              </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="price">Price</label>  
  <div class="col-md-4">
  <input id="price" name="price" type="text" placeholder="Price" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button Drop Down -->
<div class="form-group">
  <label class="col-md-4 control-label" for="pub_code">Publisher Code</label> 
  <div class="col-md-4">
    <div class="input-group">
   <input id="pub_code" name="pub_code" type="text" placeholder="Publisher Code" class="form-control input-md" >
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
          Select
          <span class="caret"></span>
        </button>
        <ul id="aclist2" class="dropdown-menu pull-right">
                              <?php
$sql="SELECT * FROM publishers";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)) {      
              echo "<li><a >".$row['pub_name']."</a></li>";
            }?>
        </ul>
 <script type="text/javascript">
 $("#aclist2").parent().find("a").on('click', function() {
            var option= $(this).text();
     // $("#pub_code").val(option);
      var myurl = "http://localhost/gucslibrary/getPublisherDetails.php?pub_name='"+option+"'";
     // alert(myurl);    
      $.ajax({
      url: myurl,
          type: 'GET',   
      error: function() {
         alert("An error has occurred");
      },
      dataType: 'json',
      success: function(data) {
          $("#pub_code").val(data.pub_code);       
      }
   });
    });        
 </script>

      </div>
    </div>
  </div>

</div>


<!-- Button Drop Down -->
<div class="form-group">
  <label class="col-md-4 control-label" for="book_type">Book Type</label> 
  <div class="col-md-4">
    <div class="input-group">
   <input id="book_type" name="book_type" type="text" placeholder="Book Type" class="form-control input-md" >
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
          Select
          <span class="caret"></span>
        </button>
        <ul id="aclist4" class="dropdown-menu pull-right">
                              <?php
$sql="SELECT * FROM book_types";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)) {      
              echo "<li><a >".$row['book_type']."</a></li>";
            }?>
        </ul>
 <script type="text/javascript">
 $("#aclist4").parent().find("a").on('click', function() {
            var option= $(this).text();
      $("#book_type").val(option);
      var myurl = "http://localhost/gucslibrary/getBookTypes.php?book_type='"+option+"'";
     // alert(myurl);    
      $.ajax({
      url: myurl,
          type: 'GET',   
      error: function() {
         alert("An error has occurred");
      },
      dataType: 'json',
      success: function(data) {
          $("#book_type").val(data.book_type);       
      }
   });
    });        
 </script>

      </div>
    </div>
  </div>

</div>


<!-- Button Drop Down -->
<div class="form-group">
  <label class="col-md-4 control-label" for="book_status">Book Status</label> 
  <div class="col-md-4">
    <div class="input-group">
   <input id="book_status" name="book_status" type="text" placeholder="Book Status" class="form-control input-md" >
      <div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
          Select
          <span class="caret"></span>
        </button>
        <ul id="aclist3" class="dropdown-menu pull-right">
                              <?php
$sql="SELECT * FROM book_status";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)) {      
              echo "<li><a >".$row['book_status']."</a></li>";
            }?>
        </ul>
 <script type="text/javascript">
 $("#aclist3").parent().find("a").on('click', function() {
            var option= $(this).text();
      $("#book_status").val(option);
      var myurl = "http://localhost/gucslibrary/getBookStatusDetails.php?book_status='"+option+"'";
     // alert(myurl);    
      $.ajax({
      url: myurl,
          type: 'GET',   
      error: function() {
         alert("An error has occurred");
      },
      dataType: 'json',
      success: function(data) {
          $("#book_status").val(data.book_status);       
      }
   });
    });        
 </script>

      </div>
    </div>
  </div>

</div>


<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="attachments">Attachments</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="attachments" name="attachments" placeholder="Attachments"></textarea>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="entry_emp_id">Entry Employee ID</label>  
  <div class="col-md-4">
  <input id="entry_emp_id" name="entry_emp_id" type="text" placeholder="Entry Employee ID" class="form-control input-md" required="">
    
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
