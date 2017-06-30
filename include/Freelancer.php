<?php
include("User.php");

class Freelancer extends User
{
    private $preference;
    private $mastery;
    private $level;
    private $next;
    private $exp;

    public function __construct($args) {
        parent::__construct($args);

        $this->preference['graphic_design'] = isset($args['graphic_design']) ? true : false;
        $this->preference['illustrator'] = isset($args['illustrator']) ? true : false;
        $this->preference['photo_editing'] = isset($args['photo_editing']) ? true : false;
        $this->preference['video_editing'] = isset($args['video_editing']) ? true : false;
        $this->preference['animation'] = isset($args['animation']) ? true : false;
        $this->preference['web_design'] = isset($args['web_design']) ? true : false;
        $this->mastery = isset($args['mastery'])?$args['mastery']:null;

        //isi nilai level default
        $this->level = isset($args["level"])?$args["level"]:1;
        $this->exp = isset($args["exp"])?$args["exp"]:0;
        $this->next = isset($args["next"])?$args["next"]:100;
    }

    /**
     * Getter preference.
     * @return mixed preference
     */
    public function getPreference() {
        return $this->preference;
    }

    /**
     * Menambahkan User.
     */
    public function addUser() {
        parent::addUser();
        $db = connect();

        //Freelance add
        $sql = "INSERT INTO freelancer (username, software_mastery, level, exp, next) VALUES ('$this->username','$this->mastery')";
        $res = $db->query($sql);
        if ($res !== TRUE) {
            echo($db->error);
        }

        foreach ($this->preference as $key => $preference) {
            if ($preference) {
                $sql = "INSERT INTO preference (username, pref) VALUES ('$this->username','$key')";
                $res = $db->query($sql);
                if ($res !== TRUE) {
                    echo($db->error);
                }
            }
        }

        $db->close();
    }

    /**
     * @return int
     */
    public function getExp() {
        return $this->exp;
    }

    /**
     * @return int
     */
    public function getLevel() {
        return $this->level;
    }

    /**
     * @return int
     */
    public function getNext() {
        return $this->next;
    }

    /**
     * Level up user.
     */
    public function levelUp(){
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
}