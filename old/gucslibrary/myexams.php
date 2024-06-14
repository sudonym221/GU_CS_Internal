<?php
 
include("config.php");

$title = 'My Exams';

include('lock.php');
if(isset($login_session)){
require('logheader.php');
}else {
	require('header.php');
}
/*
//if form has been submitted process it
if(isset($_POST['btnSave'])){

 if(isset($_POST['tid'])) {
 	$tid=addslashes($_POST['tid']);
 }else {
 $sql="SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'personal_accounting_package' AND TABLE_NAME = 'transactions' ";
 $result=mysql_query($sql);$row=mysql_fetch_array($result); $tid=$row['AUTO_INCREMENT'];
}
 
 $acno=addslashes($_POST['acno']);
 $credit_debit=addslashes($_POST['credit_debit']);
 $t_amount=addslashes($_POST['t_amount']);
$description=addslashes($_POST['description']);
$t_date_time=addslashes($_POST['']);
 
  if(!isset($error)){

    try {

      //insert into database with a prepared statement
      $sql="INSERT INTO transactions (tid,uid,acno,credit_debit,t_amount,description, t_date) VALUES (
        $tid, $login_uid, $acno, '$credit_debit', $t_amount, '$description', '$t_date_time')";
      
      if (mysql_query($sql, $conn)) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $sql . "<br>" . mysql_error($conn);
      }

     if("Credit" == $credit_debit){
     	$sql = "UPDATE `personal_accounting_package`.`accounts` SET `current_bal` = `current_bal`+$t_amount WHERE `accounts`.`acno` = $acno;";
	}else{
		$sql = "UPDATE `personal_accounting_package`.`accounts` SET `current_bal` = `current_bal`-$t_amount WHERE `accounts`.`acno` = $acno;";
	}
 if (mysql_query($sql, $conn)) {
          echo "New record created successfully";
      } else {
          echo "Error: " . $sql . "<br>" . mysql_error($conn);
      }
      header('Location: transactions.php');
      exit;

    } catch(PDOException $e) {
        $error[] = $e->getMessage();
    }

  }

}
*/

?>

<div class="container">
<div class="row">


<!-- Form Name -->
<legend>Online Exams </legend>

</div>


	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-9 col-sm-offset-2 col-md-offset-1">
<div class="table-responsive">
    <table class="table table-fixedheader table-bordered table-striped table-hover  ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Total Marks</th>
                <th>Pass Marks</th>
                <th>Duration</th>
                <th>Test Date</th>
  				      <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                    <?php
                    
$sql="SELECT * FROM tests"; // WHERE uid='$login_uid' ";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)) {
              echo "<tr><td>".$row['tid']."</td>";
              echo "<td>".$row['tname']."</td>";
              echo "<td>".$row['total_marks']."</td>";
              echo "<td>".$row['pass_marks']."</td>";
              echo "<td>".$row['test_duration']."</td>";
      			  echo "<td>".$row['test_date']."</td>";
              echo "<td>".$row['description']."</td>";
              echo '<td><form role="form" method="GET" action="getexam.php" autocomplete="off"><button type="submit" name="id" value="'.$row['tid'].'" class="btn btn-success">Take Exam</button></form></td></tr>';
            } ?>  
        </tbody>
    </table>
</div>

		</div>
	</div>
</div>
