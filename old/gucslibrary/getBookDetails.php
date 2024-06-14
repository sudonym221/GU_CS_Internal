<?php
include("config.php");
$accession_no=$_GET['accession_no'];
$sql="SELECT * FROM books_info WHERE accession_no='$accession_no'";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)) {      
              $book_id = $row['book_id'];
              $accession_no=$row['accession_no'];
              $title=$row['title'];
               $book_cat_id=$row['book_cat_id'];
 			$isbn_10=$row['isbn_10'];
 			$isbn_13=$row['isbn_13'];
 			$authors=$row['authors'];
 $edition=$row['edition'];
 $yopub=$row['yopub'];
 $total_pages=$row['total_pages'];
 $purchase_date=$row['purchase_date'];
 $entry_date=$row['entry_date'];
 $price=$row['price'];
 $pub_code=$row['pub_code'];
 $shelf_no=$row['shelf_no'];
 $attachments=$row['attachments'];
 $entry_emp_id=$row['entry_emp_id'];
 $book_status=$row['book_status'];
 $book_type=$row['book_type'];

}
$ar = array('book_id'=>$book_id, 'accession_no'=>$accession_no ,'title'=>$title,  'book_cat_id'=>$book_cat_id, 'isbn_10'=>$isbn_10, 'isbn_13'=>$isbn_13, 'authors'=>$authors, 'edition'=>$edition, 'yopub'=>$yopub, 'total_pages'=>$total_pages,'purchase_date'=>$purchase_date, 'entry_date'=>$entry_date, 'price'=>$price, 'pub_code'=>$pub_code, 'shelf_no'=>$shelf_no, 'attachments'=>$attachments, 'entry_emp_id'=>$entry_emp_id, 'book_status'=>$book_status, 'book_type'=>$book_type );//'pub_code'=>$pub_code, 'pub_name'=>$pub_name, 'pub_address'=>$pub_address );
header('Content-Type: application/json');
echo json_encode($ar);
?>