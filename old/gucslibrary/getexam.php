<?php
 
include("config.php");

$title = 'Exam in Progress';

include('lock.php');
if(isset($login_session)){
require('logheader.php');
}else {
	require('header.php');
}

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
