<?php

class Job
{
    private $id;
    private $name;
    private $budget;
    private $deadline;
    private $type;
    private $description;
    private $completion;
    private $client;
    private $freelancer;

    function __construct($args) {
        $this->id = isset($args['job_id']) ? isset($args['job_id']) : null;
        $this->name = $args['job_name'];
        $this->budget = $args['budget'];
        $this->deadline = $args['deadline'];
        $this->type = $args['job_type'];
        $this->description = $args['job_desc'];
        $this->completion = isset($args['freelancer']) ? isset($args['freelancer']) : false;
        $this->client = $args['client'];
        $this->freelancer = isset($args['freelancer']) ? isset($args['freelancer']) : null;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getBudget() {
        return $this->budget;
    }

    /**
     * @return int
     */
    public function getDeadline() {
        return $this->deadline;
    }

    /**
     * @return string
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @return boolean
     */
    public function getCompletion() {
        return $this->completion;
    }

    /**
     * @return mixed
     */
    public function getClient() {
        return $this->client;
    }

    /**
     * @return string|null
     */
    public function getFreelancer() {
        return $this->freelancer;
    }


    public function addJob() {
        $db = connect();
        $sql = "INSERT INTO job (job_name, budget, deadline, job_type, completion, client, freelancer) VALUES ('$this->name', '$this->budget', '$this->deadline', '$this->type', FALSE, '$this->client', NULL)";
        $res = $db->query($sql);
        if ($res !== TRUE) {
            echo($db->error);
        }
    }

    public static function getHarga($kode, $level) {
        $sql = 'SELECT * FROM pricelist WHERE level =' . $level . ' AND kode= "' . $kode . '"';
        $result = getResultFromSql($sql);
        if ($result->num_rows == 1) {
            $resultArray = $result->fetch_assoc();
            return $resultArray["harga"];
        } else {
            return null;
        }
    }
}