<?php
include("User.php");

class Freelancer extends User
{
    private $preference;
    private $mastery;

    public function __construct($args) {
        parent::__construct($args);

        $this->preference['graphic_design'] = isset($args['graphic_design']) ? true : false;
        $this->preference['illustrator'] = isset($args['illustrator']) ? true : false;
        $this->preference['photo_editing'] = isset($args['photo_editing']) ? true : false;
        $this->preference['video_editing'] = isset($args['video_editing']) ? true : false;
        $this->preference['animation'] = isset($args['animation']) ? true : false;
        $this->preference['web_design'] = isset($args['web_design']) ? true : false;
        $this->mastery = $args['mastery'];
    }

    /**
     *
     * @return mixed preference
     */
    public function getPreference() {
        return $this->preference;
    }

    public function addUser() {
        parent::addUser();
        $db = connect();

        //Freelance add
        $sql = "INSERT INTO freelancer (username, software_mastery) VALUES ('$this->username','$this->mastery')";
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
}