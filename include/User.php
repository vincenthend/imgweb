<?php
include("connect.php");

class User
{
    public $username;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;

    /**
     * User constructor.
     * @param $args array data user
     */
    public function __construct($args) {
        $this->username = $args["username"];
        $this->email = $args["email"];
        $this->password = isset($args["password"])?$args["password"]:"hidden";
        $this->first_name = $args["first_name"];
        $this->last_name = $args["last_name"];
        $this->phone = $args["phone"];
    }

    /**
     * Mengembalikan nilai apakah user ada di database.
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

    /**
     * Menambahkan user ke database
     */
    public function addUser() {
        $db = connect();

        //Add user to db
        $sql = "INSERT INTO registered (email, password) VALUES ('$this->email',PASSWORD('".$this->password."'))";
        $res = $db->query($sql);
        if($res !== TRUE){
            echo($db->error);
        }

        $sql = "INSERT INTO user (username, first_name, last_name, email, phone) VALUES ('$this->username','$this->first_name','$this->last_name','$this->email',$this->phone)";
        $res = $db->query($sql);
        if($res !== TRUE){
            echo($db->error);
        }

        $db->close();
    }

    /**
     * @return mixed
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getFirstName() {
        return $this->first_name;
    }

    /**
     * @return mixed
     */
    public function getLastName() {
        return $this->last_name;
    }

    /**
     * @return mixed
     */
    public function getPhone() {
        return $this->phone;
    }
}

?>