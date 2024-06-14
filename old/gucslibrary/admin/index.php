<?php require('../config.php');

//if form has been submitted process it
if(isset($_POST['submit'])){

$myusername=addslashes($_POST['username']);
//$mypassword=addslashes($_POST['password']);
$mypassword =addslashes(rand(1000,5000));
$myemail=addslashes($_POST['email']);
$hash = md5( rand(0,1000) );
	//very basic validation
	if(strlen($_POST['username']) < 3){
		$error[] = 'Username is too short.';
	} else {
		$sql="SELECT id FROM admin WHERE username='$myusername' and password='$mypassword'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);

		if(!empty($row['username'])){
			$error[] = 'Username provided is already in use.';
		}

	}
/*
	if(strlen($_POST['password']) < 3){
		$error[] = 'Password is too short.';
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = 'Confirm password is too short.';
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = 'Passwords do not match.';
	}
*/
	//email validation
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = 'Please enter a valid email address';
	} else {
		$sql="SELECT id FROM admin WHERE email='$myemail' ";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);

		if(!empty($row['email'])){
			$error[] = 'Email provided is already in use.';
		}

	}


	//if no errors have been created carry on
	if(!isset($error)){

		//hash the password
		//$hashedpassword = $user->password_hash($_POST['password'], PASSWORD_BCRYPT);

		//create the activasion code
		//$activasion = md5(uniqid(rand(),true));

		try {

			//insert into database with a prepared statement
			$sql="INSERT INTO admins (username,password,email,hash) VALUES ('$myusername', '$mypassword', '$myemail', '$hash')";
			
			if (mysql_query($sql, $conn)) {
    			echo "New record created successfully";
			} else {
    			echo "Error: " . $sql . "<br>" . mysql_error($conn);
			}
			//$row=mysql_fetch_array($result);
			$adminemail='noreply@infigenie.com';
			include 'sendmail.php';
			smtpmailer($myemail, $adminemail, 'Monjyoti Das', $subject, $message);
			//redirect to index page
			header('Location: index.php?action=joined');
			exit;

		//else catch the exception and show the error.
		} catch(PDOException $e) {
		    $error[] = $e->getMessage();
		}

	}

}

//define page title
$title = 'Online Examination System';

//include header template
require('../landing.php');
?>

<div class="container">

	<div class="row">
  <img class="col-md-6" src="home_image.png">

	    <div class="col-xs-12 col-sm-8 col-md-6 ">
	  
			<form role="form" method="post" action="" autocomplete="off">
				<h2>Please Sign Up</h2>
				<p>Already a member? <a href='adminlogin.php'>Login</a></p>
				<hr>

				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}

				//if action is joined show sucess
				if(isset($_GET['action']) && $_GET['action'] == 'joined'){
					echo "<h2 class='bg-success'>Registration successful, please check your email to activate your account.</h2>";
				}
				?>

				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
				</div>
				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2">
				</div>
				<!--div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="4">
						</div>
					</div>
				</div-->

				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Register" class="btn btn-danger btn-block btn-lg" tabindex="5"></div>
				</div>
			</form>
		</div>
	</div>

</div>