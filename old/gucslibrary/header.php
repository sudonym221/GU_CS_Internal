<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php if(isset($title)){ echo $title; }?></title>
    <!--link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet"-->
    <link rel="stylesheet" href="style/main.css">
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/moment-with-locales.js"></script>
    <script type="text/javascript" src="js/moment-timezone-with-data.js"></script>
<script type="text/javascript" src="js/test.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">

  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">GUCS Library Systems</a>
    </div>
    <div>
      <ul class="nav navbar-nav navbar-right">
        <ul class="nav navbar-nav navbar-right">       
         <li class="active"><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="myexams.php"><span class="glyphicon glyphicon-pencil"></span> Books</a></li>

        <li><a href="myresults.php"><span class="glyphicon glyphicon-send"></span> Publishers</a></li>
 <li><a href="myresults.php"><span class="glyphicon glyphicon-send"></span> Members</a></li>

        <li><a href="myresults.php"><span class="glyphicon glyphicon-send"></span> Issue</a></li> 

        <li><a href="myresults.php"><span class="glyphicon glyphicon-send"></span> Return</a></li>

        <li><a href="myresults.php"><span class="glyphicon glyphicon-send"></span> Search</a></li>
       
        <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>