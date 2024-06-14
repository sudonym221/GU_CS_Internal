<?php

include("config.php");

$book_cat_name=$_GET['book_cat_name'];
$sql="SELECT * FROM book_categories WHERE book_cat_name=$book_cat_name";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)) {      
              $book_cat_id = $row['book_cat_id'];
              $book_cat_name=$row['book_cat_name'];
            
}
$ar = array('book_cat_id'=>$book_cat_id, 'book_cat_name'=>$book_cat_name );
 
header('Content-Type: application/json');
echo json_encode($ar);
?>
