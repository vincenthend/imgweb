<?php
include("include/Functions.php");
session_start();
if (isLoggedIn()) {
    $user = getCurrentUser();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="images/igfavicon.png"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>.IMG - Creative Media</title>
    <!-- Bootstrap -->
    <!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
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
    <div class="page-header" style="margin-top:0"><img src="images/Imago Gratia.png" width="350" alt=""/></div>

    <!-- navbar -->
    <?php createNavbar(); ?>
    <!-- carousel -->
    <div class="row">
        <div class="col-lg-12">
            <div id="carousel1" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel1" data-slide-to="0" class="active"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active"><a href="aboutus.html"><img src="images/Carousel1-01.png"
                                                                         alt="First slide image"
                                                                         class="center-block"></a>
                        <div class="carousel-caption"></div>
                    </div>
                    <div class="item"><a href="user/clientregister.php"><img src="images/Carousel2-01.png"
                                                                             alt="Second slide image"
                                                                             class="center-block"></a>
                        <div class="carousel-caption"></div>
                    </div>
                    <div class="item"><a href="showcase.html"><img src="images/Carousel3-01.png" alt="Third slide image"
                                                                   class="center-block"></a>
                        <div class="carousel-caption"></div>
                    </div>
                    <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel1" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- button -->
    <?php

    if (isLoggedIn() === FALSE) {
        echo '
            <div class="row" style="margin-top:10px;">
                <div class="col-lg-6 col-sm-12">
                    <a href="user/clientregister.php">
                        <img src="images/Button-01.png" alt="" width="100%" class="btn-reg">
                    </a>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <a href="user/flregister.php">
                        <img src="images/Button-02.png" alt="" width="100%" class="btn-reg">
                    </a>
                </div>
            </div>';
    }
    ?>

    <!-- info -->
    <div class="row">
        <div class="col-lg-12">
            <h3>Realize your IMG-nation</h3>
            <p>Imago Gratia provides the opportunity for you to realize your ideas and imagination with just some simple
                steps</p>
            <img src="images/HowItWorks-08.png" width="100%" alt=""/></div>
    </div>
    <div class="row info">
        <div class="row">
            <div class="col-lg-4 col-sm-12 text-center">
                <div class="row"><img src="images/Menus-05.png" width="25%" alt=""/>
                    <h4 style="color: #F1F2F2;">ABOUT US</h4>
                    <ul class="no-bullet">
                        <li><a href="aboutus.html">About Us</a></li>
                        <li><a href="team.html">Team</a></li>
                        <li><a href="howitworks.html">How it Works</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 text-center">
                <div class="row"><img src="images/Menus-06.png" width="25%" alt=""/>
                    <h4 style="color: #F1F2F2;">PROJECTS</h4>
                    <ul class="no-bullet">
                        <li><a href="showcase.html">Showcase</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 text-center">
                <div class="row"><img src="images/Menus-07.png" width="25%" alt=""/>
                    <h4 style="color: #F1F2F2;">SERVICES</h4>
                    <ul class="no-bullet">
                        <li><a href="customerservices.html">Customer Services</a></li>
                        <li><a href="termsnconds.html">Terms and Conditions</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <hr style="color:#F1F2F2; height:3px; margin-bottom:40px">
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap-3.3.5.js" type="text/javascript"></script>
</div>
</body>
</html>