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

    /**
     * User constructor.
     * @param $args array data user
     */
    public function __construct($args) {
        $this->username = $args["username"];
        $this->email = $args["email"];
        $this->password = $args["password"];
        $this->first_name = $args["first_name"];
        $this->last_name = $args["last_name"];
        $this->phone = $args["phone"];
        $this->roles = $args["roles"];
    }

    /**
     * Mengembalikan nilai apakah user ada di database
     * @return bool apakah user ada di database
     */
    public function isUserExist() {
        $db = connect();
        $sql = "SELECT username FROM user where '$this->username' = username";
        $result = $db->query($sql);

        if ($result->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
}

?>