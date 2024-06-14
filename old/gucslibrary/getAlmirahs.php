<?php
include("config.php");
$category=$_GET['category'];
$sql="SELECT distinct almirah_no FROM almirahs WHERE category=$category ORDER BY almirah_no asc";
$result=mysql_query($sql);
$arr = array();
while($row=mysql_fetch_array($result)) {      
/*              $id = $row['id'];
              $category=$row['category'];*/
              $almirah_no = $row['almirah_no'];
            //  $shelf_no=$row['shelf_no'];
            $arr[] = array('almirah_no'=>$almirah_no );
//$arr[] = array('id'=>$id, 'category'=>$category, 'almirah_no'=>$almirah_no, 'shelf_no'=>$shelf_no );

//$array_merge($arr, array( 'm' ) );
//$arr += $ar;
}

header('Content-Type: application/json');
echo json_encode($arr);
?>