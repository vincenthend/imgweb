<?php
include("Session.php");
include("Constants.php");

function createNavbar() {
    echo '
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li><a href="'.rootURL.'">Home</a></li>';

    if (isClient()) {
        echo '<li><a href="#">Create Project</a></li>';
    }
    if (isFreelancer()) {
        echo '<li><a href="'.rootURL.'user/profile.php">Profile</a></li>';
        echo '<li><a href="#">Find Project</a></li>';
        echo '<li><a href="#">Manage Project</a></li>';
    }

    echo '</ul> <div class="nav navbar-right" style="margin-right:5px">';

    if (isLoggedIn() === FALSE) {
        echo '<button class="btn btn-info navbar-btn dropdown-toggle" type="button" data-toggle="dropdown">Log In
                    </button>
                    <div class="dropdown-menu" style = "padding:10px;" >
                    <form method = "post" action = "'.rootURL.'user/login.php" >
                        <div class="form-group" >
                            <label for="user" > Email / username
                                <input type = "text" name = "username" class="form-control" >
                            </label >
                        </div >
                        <div class="form-group" >
                            <label for="password" > Password
                                <input type = "password" name = "password" class="form-control" >
                            </label >
                        </div >
                        <input type = "submit" class="btn btn-primary" value = "Log in" >
                    </form>
                </div >';
    } else {
        echo 'Welcome, <a href="'.rootURL.'user/profile.php" style="color:black"><b>'.$_SESSION['username'].'</b></a>!  ';
        echo '<a href="'.rootURL.'user/logout.php"><button class="btn btn-danger navbar-btn" type="button"> Log Out </button ></a>';
    }
    echo '</div></div></nav>';
}

/**
 * Mengecek apabila user sudah login. Jika sudah maka akan diredirect
 * @param string $location
 */
function checkLoginAndRedirect($location) {
    session_start();
    if (isLoggedIn() === FALSE) {
        header("location: ".$location);
    } else {
        $user = getCurrentUser();
    }
}


?>