<!DOCTYPE html>
<?php
include("../include/Functions.php");
session_start();
if (isLoggedIn() === FALSE) {
    header("location: user/login.php");
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
    <?php createNavbar(); ?>

    <!-- content -->
    <hr>
    <div class="row">
        <div class="col-xs-6">
            <h1><?php echo $user->getFirstName() . " " . $user->getLastName(); ?></h1>
        </div>

        <div class="col-xs-6">
            <img align="right" src="../images/115X115.gif" alt="...">
        </div>
    </div>
    <div class="row" style="margin-top:10px;">
        <div class="col-xs-12 col-md-12">
            <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85" aria-valuemin="0"
                     aria-valuemax="100" style="width: 85%"> Level Point (from data)
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-7">
            <div class="media">
                <div class="media-left"><a href="#"> </a></div>
                <div class="media-body">
                    <h2 class="media-heading">About Me</h2>
                    Editable content
                </div>
            </div>
        </div>

        <div class="col-xs-5 well">
            <div class="row">
                <div class="col-lg-6">
                    <h4><span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                        : <?php echo $user->getPhone(); ?></h4>
                </div>
                <div class="col-lg-6">
                    <h4><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                        : <?php echo $user->getEmail(); ?></h4>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-8 col-lg-7">
            <h2>History</h2>
            <hr>
            <div class="row">
                <div class="col-xs-6"><h4>JOB I</h4></div>
                <div class="col-xs-6">
                    <h4 class="text-right"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Jan
                        2002 - Dec 2006</h4>
                </div>
            </div>
            <h4><span class="label label-default">Bachelors</span></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, recusandae, corporis, tempore nam
                fugit
                deleniti sequi excepturi quod repellat laboriosam soluta laudantium amet dicta non ratione
                distinctio
                nihil dignissimos esse!</p>
            <div class="row">
                <div class="col-xs-6">
                    <h4>JOB II</h4>
                </div>
                <div class="col-xs-6">
                    <h4 class="text-right"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Jan
                        2006 - Dec 2008</h4>
                </div>
            </div>
            <h4><span class="label label-default">Masters</span></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, recusandae, corporis, tempore nam
                fugit
                deleniti sequi excepturi quod repellat laboriosam soluta laudantium amet dicta non ratione
                distinctio
                nihil dignissimos esse!</p>
        </div>
        <div class="col-sm-4 col-lg-5">
            <h2>Progress</h2>
            <hr>
            <!-- Green Progress Bar -->
            <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="85"
                     aria-valuemin="0"
                     aria-valuemax="100" style="width: 85%"> POSTER DESIGN
                </div>
            </div>
            <!-- Blue Progress Bar -->
            <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80"
                     aria-valuemin="0"
                     aria-valuemax="100" style="width: 80%"> LOGO AND ILLUSTRATION
                </div>
            </div>
            <!-- Yellow Progress Bar -->
            <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70"
                     aria-valuemin="0"
                     aria-valuemax="100" style="width: 70%"> PHOTO EDITING
                </div>
            </div>
            <!-- Red Progress Bar -->
            <div class="progress">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                     aria-valuemax="100" style="width: 60%"> VIDEO EDITING
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="55"
                     aria-valuemin="0"
                     aria-valuemax="100" style="width: 55%"> ANIMATION
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50"
                     aria-valuemin="0"
                     aria-valuemax="100" style="width: 50%"> WEB DESIGN
                </div>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50"
                     aria-valuemin="0"
                     aria-valuemax="100" style="width: 50%"> OVERALL
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>
<hr>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery-1.11.3.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../js/bootstrap.js"></script>
</body>
</html>
