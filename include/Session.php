<?php
include("Freelancer.php");

/////////////////////
// USER MANAGEMENT //
/////////////////////
/**
 * Mengembalikan objek user berdasarkan username
 * @param $username User username yang dicari
 * @return User|Freelancer user jika user ditemukan, null jika tidak
 */
function getUser($username) {
    $db = connect();
    $sql = "SELECT * FROM registered NATURAL JOIN user NATURAL JOIN freelancer WHERE username = '$username'";
    $data = $db->query($sql);

    //is freelancer
    if($data->num_rows == 1){
        $data = $data->fetch_assoc();
        $user = new Freelancer($data);
    }
    else{
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $data = $db->query($sql);

        if($data->num_rows == 1){
            $data = $data->fetch_assoc();
            $user = new User($data);
        }
        else{
            $user = null;
        }
    }
    $db->close();
    return $user;
}

/**
 * User yang sedang log in.
 * @return User|Freelancer user yang sedang log in
 */
function getCurrentUser() {
    return getUser($_SESSION["username"]);
}

/**
 * Mengembalikan nilai apakah client sedang log-in.
 * @return bool apakah client sedang log in.
 */
function isLoggedIn() {
    if (isset($_SESSION["username"])) {
        if (getUser($_SESSION["username"]) != null) {
            return true;
        }
    }
    return false;
}

/**
 * Melakukan login.
 * @param $username String username yang akan login
 * @param $password String password dari user
 * @return bool apakah login berhasil
 */
function userLogin($username, $password) {
    $db = connect();
    $username = $db->real_escape_string($username);
    $password = $db->real_escape_string($password);
    $sql = "SELECT username FROM registered natural join user WHERE ((username = '$username' or email='$username') and password = PASSWORD('$password'))";
    $result = $db->query($sql);

    if ($result->num_rows == 1) {
        //Write session data
        $_SESSION['username'] = $result->fetch_assoc()["username"];

        //Find role
        $sql = "SELECT username FROM user NATURAL JOIN freelancer WHERE username ='" . $_SESSION['username']."'";
        $result = $db->query($sql);
        if ($result->num_rows == 1) {
            $_SESSION['role'] = "freelance";
        } else {
            $_SESSION['role'] = "client";
        }
        header("location: ../index.php");

        $logged_in = true;
    } else {
        $logged_in = false;
    }
    $db->close();
    return $logged_in;
}

/**
 * Melakukan logout.
 */
function userLogout() {
    session_start();

    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(), '', 0, '/');

    session_regenerate_id(true);
    header("location: ../index.php");
}

/**
 * Menghasilkan true jika user yang sedang log in adalah client.
 * @return bool true jika user adalah client.
 */
function isClient() {
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "client") {
            return true;
        }
    }
    return false;
}

/**
 * Menghasilkan true jika user yang sedang log in adalah freelancer.
 * @return bool true jika user adalah freelancer.
 */
function isFreelancer() {
    if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == "freelance") {
            return true;
        }
    }
    return false;
}

////////////////////
// JOB MANAGEMENT //
////////////////////

?>