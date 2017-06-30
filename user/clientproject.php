<?php
include("../include/Functions.php");

session_start();
if (!isClient()) {
    header("location: ".rootURL."index.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Validation

    //Send data
    $_POST["client"] = $_SESSION["username"];
    $_POST["budget"] = Job::getHarga($_POST["job_type"], $_POST["level"]);

    $job = new Job($_POST);
    $job->addJob();

    //Show notification & redirect
    header("location:" . rootURL . "index.php");
}
?>

<!doctype html>
<html>
<head>
    <link rel="shortcut icon" type="image/x-icon" href="../images/igfavicon.png"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project</title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../css/styles.css" rel="stylesheet" type="text/css">
    <script src="../js/angular.min.js"></script>
    <script src="../js/jquery-1.11.3.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div align="center" class="container">
    <header><a href="../index.php"><img src="../images/Imago%20Gratia.png" width="350" alt=""/></a></header>
    <div class="row">
        <div class="col-lg-12">
            <h2>Create Project</h2>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-2"><h4>What's your project?</h4></div>
        <br>
        <div class="col-lg-8" ng-app="form-validate">
            <form class="form-horizontal" name="registForm" method="post" action="clientproject.php">
                <div class="form-group">
                    <label class="control-label col-sm-2">Name</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="text" ng-model="job_name" name="job_name"
                               placeholder="Project Name" required maxlength="45">
                    </div>

                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Type</label>
                    <div class="col-sm-10 checkbox">
                        <div class="row">
                            <div align="left" class="col-lg-6">
                                <ul class="no-bullet">
                                    <li><label><input type="radio" name="job_type" value="graphic_design"
                                                      class="job_type radio_check" checked>
                                            <img class="pic_check" src="../images/Icon-Poster.png" width="75" alt=""/>
                                            Poster Design</label></li>
                                    <li><label><input type="radio" name="job_type" value="illustrator"
                                                      class="job_type radio_check">
                                            <img class="pic_check" src="../images/Icon-Logo%20and%20Illustration.png"
                                                 width="75" alt=""/> Logo and Illustration</label></li>
                                    <li><label><input type="radio" name="job_type" value="photo_editing"
                                                      class="job_type radio_check">
                                            <img class="pic_check" src="../images/Icon-Photo%20Editing.png" width="75"
                                                 alt=""/> Photo Editing</label></li>
                                </ul>
                            </div>
                            <div align="left" class="col-lg-6">
                                <ul class="no-bullet">
                                    <li><label><input type="radio" name="job_type" value="video_editing"
                                                      class="job_type radio_check">
                                            <img class="pic_check" src="../images/Icon-VideoEditing.png" width="75"
                                                 alt=""/> Video Editing</label></li>
                                    <li><label><input type="radio" name="job_type" value="animation"
                                                      class="job_type radio_check">
                                            <img class="pic_check" src="../images/Icon-Animation.png" width="75"
                                                 alt=""/> Animation</label></li>
                                    <li><label><input type="radio" name="job_type" value="web_design"
                                                      class="job_type radio_check">
                                            <img class="pic_check" src="../images/Icon-WebDesign.png" width="75"
                                                 alt=""/> Web Design</label></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="job_desc" ng-model="job_desc"
                                  placeholder="Descibe your project here!"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Budget</label>
                    <div class="col-sm-1">
                        <select name="level" id="level">
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">Deadline</label>
                    <div class="col-sm-2">
                        <input type="date" name="deadline" ng-model="deadline" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-offset-1 col-sm-11"><input type="checkbox" required> I agree to the Terms and
                        Conditions agreements <br></label>
                </div>
                <div class="form-group">
                    <button type="submit" ng-disabled="registForm.$invalid" class="btn btn-primary col-sm-12 btn-lg">
                        Register
                    </button>
                </div>

            </form>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
<div class="panel-footer" style="padding-bottom:100px"></div>
<script src="../js/validation.js"></script>
<script src="../js/getPrice.js"></script>
</body>
</html>
