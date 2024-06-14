<?php
include("config.php");
$pub_name=$_GET['pub_name'];
$sql="SELECT * FROM publishers WHERE pub_name=$pub_name";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)) {      
              $id = $row['id'];
              $pub_code=$row['pub_code'];
              $pub_name = $row['pub_name'];
              $pub_address=$row['pub_address'];
}
$ar = array('id'=>$id, 'pub_code'=>$pub_code, 'pub_name'=>$pub_name, 'pub_address'=>$pub_address );
header('Content-Type: application/json');
echo json_encode($ar);
?>