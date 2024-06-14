<?php
include("config.php");
$book_type=$_GET['book_type'];
$sql="SELECT * FROM book_types WHERE book_type=$book_type";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)) {      
              $id = $row['id'];
              $book_type=$row['book_type'];
}
$ar = array('id'=>$id, 'book_type'=>$book_type );
header('Content-Type: application/json');
echo json_encode($ar);
?>