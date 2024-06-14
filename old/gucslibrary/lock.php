<?php

include('config.php');
session_start();
$user_check=$_SESSION['login_user'];
 
$ses_sql=mysql_query("select * from users where username='$user_check' ");
 
$row=mysql_fetch_array($ses_sql);
 
$login_uid=$row['uid'];
$login_session=$row['username'];
 
if(!isset($login_session))
{
header("Location: login.php");
}

?>