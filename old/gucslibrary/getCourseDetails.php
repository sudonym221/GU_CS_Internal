<?php
include("config.php");
$ccode=$_GET['ccode'];
$sql="SELECT * FROM courses WHERE ccode=$ccode";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)) {      
              $id = $row['id'];
              $ccode=$row['ccode'];
              $cname=$row['cname'];
              $cduration=$row['cduration'];
              $cintake=$row['cintake'];
}
$ar = array('id'=>$id, 'ccode'=>$ccode, 'cname'=>$cname, 'cduration'=>$cduration, 'cintake'=>$cintake);
header('Content-Type: application/json');
echo json_encode($ar);
?>