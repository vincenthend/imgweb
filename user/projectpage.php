<!DOCTYPE html>
<?php
include("../include/Session.php");
session_start();
if (isLoggedIn() === FALSE) {
    header("location: login.php");
} else {
    $user = getCurrentUser();
}

?>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="../images/igfavicon.png"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link href="../css/styles.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <!-- header -->
    <div class="page-header" style="margin-top:0"><img src="../images/Imago Gratia.png" width="350" alt=""/></div>

    <!-- navbar -->
<nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="../index.php">Home</a></li>
                <?php
                if (isLoggedIn()) {
                    echo '<li><a href="profile.php">Profile</a></li>';
                }
                if (isClient()) {
                    echo '<li><a href="#">Create Project</a></li>';
                }
                if (isFreelancer()) {
                    echo '<li><a href="#">Find Project</a></li>';
                    echo '<li><a href="#">Manage Project</a></li>';
                }
                ?>
            </ul>
            <div class="nav navbar-right" style="margin-right:5px">

                <?php
                $logout = '"user//logout.php"';
                echo('Welcome, <a href="user/profile.php" style="color:black"><b>' . $_SESSION['username'] . '</b></a>!  ');
                echo('<a href="user/logout.php"><button class="btn btn-danger navbar-btn" type="button"> Log Out </button ></a>');
                ?>
            </div>
        </div>
    </nav>


    <!-- content -->
<nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="defaultNavbar1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Poster Design<span class="sr-only">(current)</span></a></li>
            <li><a href="#">Logo Illust.</a></li>
            <li><a href="#">Photo Edit.</a></li>
            <li><a href="#">Video Edit.</a></li>
            <li><a href="#">Animation</a></li>
            <li><a href="#">Web Design</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
</nav>
<div class="row">
  <div class="col-md-4">
    <div class="thumbnail"><img src="../images/Thumbnail_Placeholder.png" alt="Thumbnail Image 1">
      <div align="center" class="caption">
        <h4>Project Name</h4>
        <p>Project Description (some words)</p>
        <p>Budget</p>
        <p>Deadline</p>
      </div>
    </div>
  </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery-1.11.3.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.js"></script>
</body>
</html>
