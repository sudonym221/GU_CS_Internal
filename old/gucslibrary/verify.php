<?php require('config.php');

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = mysql_escape_string($_GET['email']); // Set email variable
    $hash = mysql_escape_string($_GET['hash']); // Set hash variable
    $id = '';
       
    $search = mysql_query("SELECT * FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
    $match  = mysql_num_rows($search);
   if($match > 0){
    	$row=mysql_fetch_array($search);
		$id = $row['uid'];			            
        // We have a match, activate the account
        mysql_query("UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
        echo 'Your account has been activated, you can now login';
        header('Location: changepassword.php?id='.$id);
    }else{
        // No match -> invalid url or account has already been activated.
        echo 'The url is either invalid or you already have activated your account.';
    }               
}else{
    // Invalid approach
    echo 'Invalid approach, please use the link that has been send to your email.';
}

?>