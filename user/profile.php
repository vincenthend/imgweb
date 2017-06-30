<!DOCTYPE html>
<?php
include("../include/Functions.php");

session_start();
if (isFreelancer() === FALSE) {
    header("location: ".rootURL."user/login.php");
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
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow=<?php echo ($user->getEXP()*100/$user->getNext()); ?>  aria-valuemin="0"
                     aria-valuemax="100" style="width: <?php echo ($user->getEXP()*100)/$user->getNext(); ?>%"> <?php echo 'Level '.$user->getLevel(); ?>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-7">
            <div class="media">
                <div class="media-left"><img align="right" src="../images/115X115.gif" alt="..."></div>
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
        <!-- History Column -->
        <div class="col-sm-12 col-lg-7">
            <h2>History</h2>
            <hr>
            <?php
            //Prints according to history
            $sql = 'SELECT * FROM job WHERE freelancer = "' . $user->username . '"';
            $result = getResultFromSql($sql);
            if ($result->num_rows == 0) {
                echo '<i style="color:#999">Belum ada job yang diambil</i>';
            } else {
                while ($resultArray = $result->fetch_assoc()) { ?>
                    <div class="row">
                        <div class="col-xs-6"><h4><?php echo $resultArray['job_name'] ?></h4></div>
                        <div class="col-xs-6">
                            <h4 class="text-right"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                Jan 2002 - Dec 2006</h4>
                        </div>
                    </div>
                    <span class="label label-default"><?php echo $resultArray['job_type'] ?></span>
                    <p><?php echo $resultArray['job_desc'] ?></p>
                    <?php
                }
            }
            ?>

        </div>
        <!-- Progress Column -->
        <div class="col-sm-12 col-lg-5">
            <h2>Progress</h2>
            <hr>
            <div class="col-sm-12">
                <div class="col-sm-2"><img src="../images/Icon-Poster.png" alt="" width="80" height="80"/></div>
                <div class="col-sm-10">
                    <div class="col-sm-12 job-category-bold">POSTER DESIGN</div>
                    <div class="col-sm-12">Rating: (data)</div>
                    <div class="col-sm-12">Completed: (data)</div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-2"><img src="../images/Icon-Logo and Illustration.png" alt="" width="80"
                                           height="80"/>
                </div>
                <div class="col-sm-10">
                    <div class="col-sm-12 job-category-bold">LOGO AND ILLUSTRATION</div>
                    <div class="col-sm-12">Rating: (data)</div>
                    <div class="col-sm-12">Completed: (data)</div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-2"><img src="../images/Icon-Photo Editing.png" alt="" width="80" height="80"/></div>
                <div class="col-sm-10">
                    <div class="col-sm-12 job-category-bold">PHOTO EDITING</div>
                    <div class="col-sm-12">Rating: (data)</div>
                    <div class="col-sm-12">Completed: (data)</div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-2"><img src="../images/Icon-VideoEditing.png" alt="" width="80" height="80"/></div>
                <div class="col-sm-10">
                    <div class="col-sm-12 job-category-bold">VIDEO EDITING</div>
                    <div class="col-sm-12">Rating: (data)</div>
                    <div class="col-sm-12">Completed: (data)</div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-2"><img src="../images/Icon-Animation.png" alt="" width="80" height="80"/></div>
                <div class="col-sm-10">
                    <div class="col-sm-12 job-category-bold">ANIMATION</div>
                    <div class="col-sm-12">Rating: (data)</div>
                    <div class="col-sm-12">Completed: (data)</div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-2"><img src="../images/Icon-WebDesign.png" alt="" width="80" height="80"/></div>
                <div class="col-sm-10">
                    <div class="col-sm-12 job-category-bold">WEB DESIGN</div>
                    <div class="col-sm-12">Rating: (data)</div>
                    <div class="col-sm-12">Completed: (data)</div>
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
