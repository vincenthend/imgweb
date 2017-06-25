<?php
include("../include/Functions.php");
session_start();
if (isLoggedIn() === TRUE) {
    header("location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $logged = userLogin($_POST["username"], $_POST["password"]);
} else {
    $logged = true;
}
?>

<!doctype html>
<html>
<head>
    <link rel="shortcut icon" type="image/x-icon" href="../images/igfavicon.png"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../css/styles.css" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container">
    <header class="text-center"><a href="../index.php"><img src="../images/Imago%20Gratia.png" width="350" alt=""/></a>
    </header>
    <div class="row">
        <div class="col-lg-12 text-center"><h1>Log In</h1></div>
    </div>
    <?php
    if (!$logged) {
        echo '<div class="row">';
        echo '	<div class="col-lg-3"></div>';
        echo '	<div class="alert alert-danger col-lg-6">';
        echo '	<b>Login Failed!</b> Username or Password is Invalid';
        echo '	</div>';
        echo '	<div class="col-lg-3"></div>';
        echo '</div>';
    }
    ?>

    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <form method="post" action="login.php">
                <div class="form-group">
                    <label for="username">Username / Email:</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Log In</button>
                </div>
            </form>
        </div>
        <div class="col-lg-4"></div>
    </div>
    <div class="row" style="margin-top:20px;"><p class="text-center">Doesn't have an account yet? SIGN UP</p></div>
    <div class="row"><p class="text-center">About Us | News | Customer Service</p></div>
    <br>
</div>
</body>
</html>
