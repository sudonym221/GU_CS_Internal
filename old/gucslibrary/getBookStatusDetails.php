<?php
include("config.php");
$book_status=$_GET['book_status'];
$sql="SELECT * FROM book_status WHERE book_status=$book_status";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)) {      
              $id = $row['id'];
              $book_status=$row['book_status'];
}
$ar = array('id'=>$id, 'book_status'=>$book_status );
header('Content-Type: application/json');
echo json_encode($ar);
?>