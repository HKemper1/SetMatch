<?php
class User

{   
    private $id;
    private $teamname;
    private $email;
    private $kennwort;

    public function __construct($id, $teamname, $email, $kennwort)
    {
        $this->id = $id;
        $this->email = $email;
        $this->teamname = $teamname;
        $this->kennwort = $kennwort;
    }

    public function getId() {
        return $this->id;
    }

    public function getTeamname() {
        return $this->teamname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getKennwort() {
        return $this->kennwort;
    }
}

?>