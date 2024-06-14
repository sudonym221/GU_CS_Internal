<?php

include('../config.php');
session_start();
$user_check=$_SESSION['login_user'];
 
$ses_sql=mysql_query("select * from admins where username='$user_check' ");
 
$row=mysql_fetch_array($ses_sql);
 
$login_uid=$row['id'];
$login_session=$row['username'];
 
if(!isset($login_session))
{
header("Location: adminlogin.php");
}

?>