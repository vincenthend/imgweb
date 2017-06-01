<?php
include("connect.php");

class User
{
    public $username;
    public $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public static function find_user($username)
    {

    }

    public function user_login()
    {
        $db = connect();
        session_start();
        $this->username = $db->real_escape_string($this->username);
        $this->password = $db->real_escape_string($this->password);

        $sql = "SELECT username FROM registered natural join user WHERE ((username = '$this->username' or email='$this->username') and password = '$this->password')";
        $result = $db->query($sql);

        // If result matched $myusername and $mypassword, table row must be 1 row
        if ($result->num_rows == 1) {
            session_register("username");
            $sql = "SELECT username FROM registered NATURAL JOIN freelancer";
            $result = $db->query($sql);

            //Write session data
            $_SESSION['username'] = $this->username;
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


?>