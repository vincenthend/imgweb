<?php
include("User.php");

/**
 * Mengembalikan objek user berdasarkan username
 * @param $username User username yang dicari
 * @return Object user jika user ditemukan, null jika tidak
 */
function getUser($username) {
    $db = connect();
    $sql = "SELECT * FROM user WHERE user = '$username'";

    $result = $db->query($sql);

    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();

        //Find role
        $sql = "SELECT username FROM registered NATURAL JOIN freelancer";
        $result = $db->query($sql);
        if ($result->num_rows == 1) {
            $data['role'] = "freelance";
        } else {
            $data['role'] = "client";
        }

        $user = new User($data);
        return user;
    } else {
        return null;
    }
}

/**
 * Mengembalikan object user yang sedang login
 * @return Object user yang sedang login
 */
function get_current_user() {
    return getUser($_SESSION["username"]);
}

/**
 * Mengembalikan nilai apakah client sedang log-in.
 * @return bool apakah client sedang log in.
 */
function is_logged_in() {
    if (getUser($_SESSION["username"]) != null) {
        return true;
    } else {
        return false;
    }
}

/**
 * Menambahkan user
 * @param $args array data user
 */
function add_user($args) {
    //Connect to database
    $db = connect();

    //Extract data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $phone = $_POST["phone"];

    //Insert to registered
    $sql = "INSERT into registered VALUES ('$email',PASSWORD('$password'))";
    $db->query($sql);

    //Insert to user
    $sql = "INSERT into user VALUES ('$username','$first_name','$last_name','$email','$phone')";
    $db->query($sql);
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
        header("location: index.php");

        $logged_in = true;
    } else {
        $logged_in = false;
    }
    return $logged_in;
}

/**
 * Melakukan logout.
 */
function user_logout() {
    session_destroy();
}

?>