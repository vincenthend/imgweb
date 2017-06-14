<?php
include("User.php");

/**
 * Mengembalikan objek user berdasarkan username
 * @param $username User username yang dicari
 * @return Object user jika user ditemukan, null jika tidak
 */
function getUser($username) {
    $db = connect();
    $sql = "SELECT * FROM user WHERE username = '$username'";

    $result = $db->query($sql);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();

        //Find role
        $sql = "SELECT username FROM registered NATURAL JOIN freelancer";
        $result = $db->query($sql);

        $user = new User($data);

        $db->close();
        return $user;
    } else {

        $db->close();
        return null;
    }
}

/**
 * Mengembalikan nilai apakah client sedang log-in.
 * @return bool apakah client sedang log in.
 */
function is_logged_in() {
    if (isset($_SESSION["username"]) != null) {
        return true;
    } else {
        return false;
    }
}

/**
 * @param $username String username yang akan login
 * @param $password String password dari user
 * @return bool apakah login berhasil
 */
function user_login($username, $password) {
    $db = connect();
    session_start();
    $username = $db->real_escape_string($username);
    $password = $db->real_escape_string($password);

    $sql = "SELECT username FROM registered natural join user WHERE ((username = '$username' or email='$username') and password = PASSWORD('$password'))";
    $result = $db->query($sql);

    if ($result->num_rows == 1) {
        //Write session data
        $_SESSION['username'] = $result->fetch_assoc()["username"];

        //Find role
        $sql = "SELECT username FROM registered NATURAL JOIN freelancer";
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
function user_logout() {
    session_start();

    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(), '', 0, '/');

    session_regenerate_id(true);
    header("location: ../index.php");
}

?>