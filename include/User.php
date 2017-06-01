<?php
include("connect.php");

class User
{
    public $username;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $roles;

    public function __construct($args)
    {
        //Extract data
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $phone = $_POST["phone"];
    }

    public function isUserExist()
    {
        $db = connect();
        $sql = "SELECT username FROM user where '$this->username' = username";
        $db->query($sql);
    }

    public function add_user($args)
    {
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

}


function getUser($username){
    $db = connect();
    $sql = "SELECT * FROM user WHERE user = '$username'";

    $result = $db->query($sql);

    if($result->num_rows == 1){
        $data = $result->fetch_assoc();
        $user = new User($result[0]);
    }
    else{
        return null;
    }
}

public static function user_login($username, $password)
{
    $db = connect();
    session_start();
    $username = $db->real_escape_string($username);
    $password = $db->real_escape_string($password);

    $sql = "SELECT username FROM registered natural join user WHERE ((username = '$username' or email='$username') and password = PASSWORD('$password'))";
    $result = $db->query($sql);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($result->num_rows == 1) {
        session_register("username");
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

?>