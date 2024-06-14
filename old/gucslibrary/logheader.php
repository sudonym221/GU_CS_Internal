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
        <li class="active">
  <div class="dropdown dropdown-custom">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Home
    <span class="glyphicon glyphicon-home"></span> </button>
    <ul class="dropdown-menu">
      <li class="dropdown-header">Home</li>
      <li><a href="#">Home</a></li>
    </ul>
  </div>

        </li>
        <li>
  <div class="dropdown dropdown-custom">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Books
    <span class="glyphicon glyphicon-book"></span></button>
    <ul class="dropdown-menu">
      <li class="dropdown-header">Books Information</li>
      <li><a href="addbookinfo.php">Insert</a></li>
      <li><a href="updatebookinfo.php">Update</a></li>
      <li><a href="deletebookinfo.php">Delete</a></li>
      <li class="divider"></li>
      <li class="dropdown-header">Book Categories</li>
      <li><a href="addbookcategory.php">Insert</a></li>
      <li><a href="updatebookcategory.php">Update</a></li>
      <li><a href="deletebookcategory.php">Delete</a></li>

      <li class="dropdown-header">Courses</li>
      <li><a href="addcourses.php">Insert</a></li>
      <li><a href="updatecourse.php">Update</a></li>
      <li><a href="deletecourse.php">Delete</a></li>
    </ul>
  </div>   
        </li>

        <li>
  <div class="dropdown dropdown-custom">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Publishers
    <span class="glyphicon glyphicon-globe"></span> </button>
    <ul class="dropdown-menu">
      <li class="dropdown-header">Publishers</li>
      <li><a href="addpublisher.php">Insert</a></li>
      <li><a href="updatepublisher.php">Update</a></li>
      <li><a href="deletepublisher.php">Delete</a></li>
    </ul>
  </div>

        </li>
        <li>

  <div class="dropdown dropdown-custom">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Members
    <span class="glyphicon glyphicon-tag"></span> </button>
    <ul class="dropdown-menu">
          <li class="dropdown-header">Members Accounts</li>
      <li><a href="addmembers.php">Insert</a></li>
      <li><a href="#">Update</a></li>
      <li><a href="#">Delete</a></li>
      <li class="divider"></li>
      <li class="dropdown-header">Students Information</li>
      <li><a href="addstudent.php">Insert</a></li>
      <li><a href="#">Update</a></li>
      <li><a href="#">Delete</a></li>
      <li class="divider"></li>
      <li class="dropdown-header">Faculty Information</li>
      <li><a href="#">Insert</a></li>
      <li><a href="#">Update</a></li>
      <li><a href="#">Delete</a></li>
      <li class="dropdown-header">Employee Information</li>
      <li><a href="addemployee.php">Insert</a></li>
      <li><a href="#">Update</a></li>
      <li><a href="#">Delete</a></li>
    </ul>
  </div>
  </li>

        <li>
          <div class="dropdown dropdown-custom">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Issue/Return
    <span class="glyphicon glyphicon-send"></span> </button>
    <ul class="dropdown-menu">
      <li class="dropdown-header">Issue</li>
      <li><a href="bookcirculation.php">Book Issue</a></li>
      <li class="divider"></li>
      <li class="dropdown-header">Return</li>
      <li><a href="bookreturn.php">Book Return</a></li>
      <li class="dropdown-header">Renew</li>
      <li><a href="#">Book Renew</a></li>
    </ul>
  </div>
  </li>
        <li>  <div class="dropdown dropdown-custom">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Search
      <span class="glyphicon glyphicon-search"></span> </button>
    <ul class="dropdown-menu">
          <li class="dropdown-header">Search Books</li>
               <li><a href="#">Books Available</a></li>
                    <li><a href="#">Books Issued</a></li>
        <li class="divider"></li>
      <li class="dropdown-header">Search Members</li>
      <li><a href="#">Students</a></li>
      <li><a href="#">Faculty</a></li>
      <li><a href="#">Employee</a></li>
    

    </ul>
  </div>
  </li>

        <li>
 <div class="dropdown dropdown-custom">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"> <?php echo $login_session; ?>
      <span class="glyphicon glyphicon-user"></span> </button>
    <ul class="dropdown-menu">
      <li class="dropdown-header">Profile</li>
      <li><a href="#">About Me</a></li>
      <li class="dropdown-header">Account</li>
      <li><a href="#">Settings</a></li>
      <li><a href="logout.php">Logout</a></li>
      <li class="divider"></li>
    </ul>
  </div>

        </li>
      </ul>
    </div>
  </div>
</nav>