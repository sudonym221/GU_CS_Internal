<?php
include("config.php");
//$category=$_GET['category'];

$tmp = split("-", $_GET['almirah']);
$category = $tmp[0];
$almirah_no = $tmp[1];

$sql="SELECT * FROM almirahs WHERE category='$category' AND almirah_no='$almirah_no' order by shelf_no asc";
$result=mysql_query($sql);
$arr = array();
while($row=mysql_fetch_array($result)) {      

            $almirah_no = $row['almirah_no'];
            $shelf_no=$row['shelf_no'];
            $arr[] = array('almirah_no'=>$almirah_no, 'shelf_no'=>$shelf_no );
//$array_merge($arr, array( 'm' ) );
//$arr += $ar;
}
//$ar = array('id'=>$arr, 'category'=>$category, 'almirah_no'=>$almirah_no, 'shelf_no'=>$shelf_no );
/*$ar=$result;//mysql_fetch_array($result);
$arr ="mon";

//echo $arr ;echo"\n";
$arr = $arr . " das";
echo $arr;
*/
header('Content-Type: application/json');
echo json_encode($arr);
?>